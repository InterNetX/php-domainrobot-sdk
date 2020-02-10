cd src/Model
java -jar -Dmodels -DsupportingFiles -DmodelDocs=false -DmodelTests=false ../../swagger-codegen-cli.jar generate  -l php -i ../Lib/specs.json -c ../../swagger.conf
mv lib/Model/*.php .
rm -rf lib
cd ../..