<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;

class SDKController
{
    // create statement for the table poll_messages which we use in this example
    //
    // CREATE TABLE `poll_messages` (
    //   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    //   `poll_id` bigint(20) DEFAULT NULL,
    //   `poll_message_type` enum('job','notify') NOT NULL,
    //   `poll_message` json NOT NULL,
    //   `object_name` varchar(255) NOT NULL,
    //   `object_type` varchar(255) NOT NULL,
    //   `confirmed` timestamp NULL DEFAULT NULL,
    //   `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    //   `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    //   PRIMARY KEY (`id`)
    // ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


    public function confirmPollMessage() {

        // create a pdo instance
        $dbh = new \PDO(
            'mysql:dbname=testdb;host=127.0.0.1;port=3306', 
            'dbuser', 
            'dbpass'
        );

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
            // pollmessage either refers to an job or an notification
            $pollMessage = $domainrobot->poll->info();
        } catch (DomainrobotException $exception) {
            return $exception->getError();
        }

        // if the request wasn't successfull or we got no pollmessage back -> stop here
        if (
            !Domainrobot::getLastDomainrobotResult()->isSuccess() || 
            empty($pollMessage->getId())
        ) {
            return Domainrobot::getLastDomainrobotResult();
        }

        // insert poll message into the database
        $query = sprintf(
            "INSERT INTO poll_messages (`poll_id`, `poll_message_type`, `object_name`, `object_type`, `poll_message`)
            VALUES ('%d', '%s', '%s', '%s', '%s')",
            (int) $pollMessage->getId(),
            ( $pollMessage->getJob() === null ) ? 'notify' : 'job', // pollmessage either refers to an job or an notification
            $pollMessage->getObject()['value'],
            $pollMessage->getObject()['type'],
            \json_encode($pollMessage->toArray()),
        );

        // execute the query
        $dbh->query($query);

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
                date('Y-m-d H:i:s'),
                (int) $pollMessage->getId()
            );
            
            $dbh->query($query);
        }

        // if you neeed/want to you can return the status and result of the confirmation
        return Domainrobot::getLastDomainrobotResult();
    }
}