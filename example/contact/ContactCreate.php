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
use Domainrobot\Model\ContactReference;
use Domainrobot\Model\NicMember;
use Domainrobot\Model\ObjectJob;

class SDKController
{
    /**
     * Create a contact
     *
     * @return ObjectJob
     */
    public function contactCreate()
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
            $contact->setType(ContactTypeConstants::PERSON);

            // mandatory if type = ContactTypeConstants::ORG
            //$contact->setOrganization('Organization Name');

            $contact->setOwner(new BasicUser([
                'user' => 'username',
                'context' => 4 //context number of user
            ]));
            $contact->setAlias('contact_alias');

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

            // set nic references if desired
            $contact->setNicRef([
                new ContactReference([
                    'nic' => new NicMember([
                        'label' => 'tld' // e.g. de,com,cloud etc.
                    ])
                ])
            ]);

            $contact->setExtensions(new ContactExtensions([
                'it' => new ContactItExtensions([
                    'entityType' => 1 // Italian and foreign natural persons
                ])
            ]));
            
            $objectJob = $domainrobot->contact->create($contact);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $objectJob;
    }
}
