#!/usr/bin/env sh

cd src/Model
java -jar -Dmodels -DsupportingFiles -DmodelDocs=false -DmodelTests=false ../../swagger-codegen-cli.jar generate  -l php -i ../../vendor/internetx/internetx-swagger-files/src/domainrobot.json -c ../../swagger.conf
java -jar -Dmodels -DsupportingFiles -DmodelDocs=false -DmodelTests=false ../../swagger-codegen-cli.jar generate  -l php -i ../../pc_domains.yaml -c ../../swagger.conf
mv lib/Model/*.php .
rm -rf lib
cd ../..