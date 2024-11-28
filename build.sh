#!/usr/bin/env sh

# domainrobot.json contains a definition for a class named Void
# in php Void is a reserved word which cannot be used as a class name
# we will fix that definition with sed

sed 's/ "Void" : {/ "VoidResponse" : {/' vendor/internetx/internetx-swagger-files/src/domainrobot.json  > vendor/internetx/internetx-swagger-files/src/tmp_domainrobot.json
mv vendor/internetx/internetx-swagger-files/src/tmp_domainrobot.json vendor/internetx/internetx-swagger-files/src/domainrobot.json
sed 's/"#\/definitions\/Void"/"#\/definitions\/VoidResponse"/' vendor/internetx/internetx-swagger-files/src/domainrobot.json > vendor/internetx/internetx-swagger-files/src/tmp_domainrobot.json
mv vendor/internetx/internetx-swagger-files/src/tmp_domainrobot.json vendor/internetx/internetx-swagger-files/src/domainrobot.json

cd src/Model
java -jar -Dmodels -DsupportingFiles -DmodelDocs=false -DmodelTests=false ../../swagger-codegen-cli.jar generate  -l php -i ../../vendor/internetx/internetx-swagger-files/src/domainrobot.json -c ../../swagger.conf
java -jar -Dmodels -DsupportingFiles -DmodelDocs=false -DmodelTests=false ../../swagger-codegen-cli.jar generate  -l php -i ../../pc_domains.yaml -c ../../swagger.conf
mv lib/Model/*.php .
rm -rf lib
cd ../..