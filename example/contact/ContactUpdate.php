<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\BasicUser;
use Domainrobot\Model\ContactTypeConstants;
use Domainrobot\Model\Contact;
use Domainrobot\Model\ContactExtensions;
use Domainrobot\Model\ContactItExtensions;
use Domainrobot\Model\ObjectJob;

class SDKController
{
    /**
     * Update a contact
     *
     * @return ObjectJob
     */
    public function contactUpdate()
    {
        $domainrobot = new Domainrobot([
            'url' => 'https://api.autodns.com/v1',
            'auth' => new DomainrobotAuth([
                'user' => 'username',
                'password' => 'password',
                'context' => 4
            ])
        ]);

        try {
            $contact = new Contact();
            $contact->setId(234234234);

            $contact->setCity('city');
            $contact->setCountry('country');
            $contact->setState('state');
            $contact->setAddress([
                'street and number',
                'additional address information if needed'
            ]);
            $contact->setPcode('12345');
            $contact->setFname('First name');
            $contact->setLname('Last name');
            $contact->setEmail('email@example.com');
            $contact->setPhone('+49-0-0');
            $contact->setFax('+49-0-0');

            $contact->setComment('some comment');

            $contact->setExtensions(new ContactExtensions([
                'it' => new ContactItExtensions([
                    'entityType' => 1 // Italian and foreign natural persons
                ])
            ]));
            
            $objectJob = $domainrobot->contact->update($contact);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $objectJob;
    }
}
