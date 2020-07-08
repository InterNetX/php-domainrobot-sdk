<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;

class SDKController
{

    public function confirmPollMessage(){
        // get a new domainrobot instance
        $domainrobot = new Domainrobot([
            'url' => 'https://api.autodns.com/v1',
            'auth' => new DomainrobotAuth([
                'user' => 'username',
                'password' => 'password',
                'context' => 4
            ])
        ]);

        // inquire latest open poll message
        try {
            $pollMessage = $domainrobot->poll->info();
        } catch (DomainrobotException $exception) {
            return $exception->getError();
        }

        // if the request wasn't successfull or we got no pollmessage back -> stop here
        if (!Domainrobot::getLastDomainrobotResult()->isSuccess()
        || empty($pollMessage->getId())) {
            return Domainrobot::getLastDomainrobotResult();
        }

        // insert poll message into the database
        $query = sprintf(
            "INSERT INTO poll_messages (`poll_id`, `job_id`, `status`, `message`,`created_at`,`updated_at`)
            VALUES ('%d', '%d', '%s', '%s', '%s', '%s')",
            (int) $pollMessage->getId(),
            (int) $pollMessage->getJob()['id'],
            $pollMessage->getJob()['status'],
            \json_encode($pollMessage->toArray()),
            //https://carbon.nesbot.com/docs/
            Carbon::now(),
            Carbon::now()
        );
        // example database query called with https://laravel.com/docs/7.x/queries
        DB::statement($query);

        // confirm that you have read the pollmessage
        try {
            $domainrobot->poll->confirm($pollMessage->getId());
        } catch (DomainrobotException $exception) {
            return $exception->getError();
        }

        // update the database entry of the pollmessage with the confirmation date
        // if the pollmessage confirm request was successfull
        if (Domainrobot::getLastDomainrobotResult()->isSuccess()) {
            $query = sprintf(
                "UPDATE poll_messages SET `confirmed`='%s' WHERE poll_id='%d'",
                Carbon::now(),
                (int) $pollMessage->getId()
            );
            DB::statement($query);
        }

        // if you neeed/want to you can return the status and result of the confirmation
        return Domainrobot::getLastDomainrobotResult();
    }

}