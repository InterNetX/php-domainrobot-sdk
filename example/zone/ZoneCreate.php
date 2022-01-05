<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;

use Domainrobot\Model\Zone;
use Domainrobot\Model\Soa;
use Domainrobot\Model\NameServer;
use Domainrobot\Model\NameserverActionConstants;
use Domainrobot\Model\ResourceRecord;


class ZoneController {

      public function create(){
        $domainrobot = new Domainrobot([
            "url" => "https://api.autodns.com/v1",
            "auth" => new DomainrobotAuth([
                "user" => "username",
                "password" => "password",
                "context" => 4
            ])
        ]);


        $zone = new Zone();
        $zone->setOrigin('example.com');
        $zone->setSoa(new Soa([
            "refresh" => 43200,
            "retry" => 7200,
            "expire" => 1209600,
            "email" => "someone@example.com"
        ]));

        $zone->setAction(NameserverActionConstants::COMPLETE);
        $zone->setNameServers([
            new NameServer([
                "name" => "a.ns14.net"
            ]),
            new NameServer([
                "name" => "b.ns14.net"
            ]),
            new NameServer([
                "name" => "c.ns14.net"
            ]),
            new NameServer([
                "name" => "d.ns14.net"
            ])
        ]);

        $zone->setResourceRecords([
            new ResourceRecord([
                "name" => "subdomain",
                "type" => "A",
                "value" => "198.51.100.1",
                //"pref" => 1 // optional
            ]),
             new ResourceRecord([
                "name" => "mail",
                "type" => "A",
                "value" => "198.51.100.1",
                //"pref" => 1 // optional
            ]),
             new ResourceRecord([
                "name" => "",
                "type" => "MX",
                "value" => "198.51.100.1",
                "pref" => 10
            ])
        ]);

        try {
            $zone = $domainrobot->zone->create($zone);
        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $zone;
    }

}