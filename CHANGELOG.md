# Changelog

## [0.8.4] - 2021-02-15

* Fixed error in property parameter of Model::createData() Method

## [0.8.3] - 2021-02-09

* Changing Version Number in composer.json

## [0.8.2] - 2021-09-21

* DEV-3508
* Fixed Bug in Model::createData() Method

## [0.8.1] - 2020-12-11

* PUI-710

## [0.8.0] - 2020-08-25

* fixed a bug in models which caused wrong handling of certain objects
* added bulk service for domains

## [0.7.4] - 2020-09-03

* bugfixes

## [0.7.3] - 2020-09-02

## [0.7.2] - 2020-09-02

* fix attributes

## [0.7.1] - 2020-09-02

* Fix models

## [0.7.0] - 2020-08-25

* added pc.domains Service from InterNetX GmbH for Domain price checks
    ** for more information visit pc.domains
* added more examples and fixed broken examples
* rebuilt src/Model Structure to allow unlimited depth and stacking of models
* reworked Model constructors
* added Models for all pc.domains routes

## [0.6.2] - 2020-07-29

* Added new PriceService class

## [0.6.1] - 2020-07-13

* Added new RestoreService class (#11)
* Added new JobService class (#10)
* Improved functionality and documentation of the TransferOut->answer() method. (#12)

## [0.6.0] - 2020-06-23

* added possibility to gain direct access to response and request through callback methods
* added User info and list tasks
* added examples for some basic tasks
    ** more examples (hopefully for all tasks) will be added in future versions
* fixed some tasks that did not give correct access to the DomainrobotResult
* improved documentation and readme

## [0.5.2] - 2020-06-16

* Fixed printing null or empty values (#8)
* Fixed warnings found by code analysis (PR #8)
* Improve code documentation (PR #6)

## [0.3.7] - 2020-03-19

* Rename all DomainRobot string to Domainrobot

## [0.3.6] - 2020-03-19

* Rename namespace from IXDomainRobot to Domainrobot

## [0.3.5] - 2020-03-11

* Add automatic sdk version resolution

## [0.3.4] - 2020-03-02

* Fix DomainStudio->search() missing body

## [0.3.3] - 2020-03-02

* Fix imports

## [0.3.2] - 2020-03-02

* Fix imports

## [0.3.1] - 2020-03-02

* Add new services to DomainRobot class

## [0.3.0] - 2020-03-02

* Added all important routes from the domainrobot open api documentation
* Updated README.md
* Fix return value of the DomainStudio->search() method

## [0.2.0] - 2020-02-11

* Added DomainStudio calls
* Added possiblity to use asynchronous as well as synchronous tasks
* Improved documentation

## [0.1.0] - 2020-02-10

* Initial release
