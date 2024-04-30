#!/usr/bin/env sh

cd src/Model
java -jar -Dmodels -DsupportingFiles -DmodelDocs=false -DmodelTests=false ../../openapi-generator-cli.jar generate  -g php -i ../../vendor/internetx/internetx-swagger-files/src/domainrobot.json -c ../../swagger.conf --skip-validate-spec
#java -jar -Dmodels -DsupportingFiles -DmodelDocs=false -DmodelTests=false ../../openapi-generator-cli.jar generate  -g php -i ../../pc_domains.yaml -c ../../swagger.conf --skip-validate-spec
java -jar -Dmodels -DsupportingFiles -DmodelDocs=false -DmodelTests=false ../../openapi-generator-cli.jar generate  -g php -i ../../vendor/internetx/internetx-swagger-files/src/pcdomains.json -c ../../swagger.conf --skip-validate-spec
for p in lib/Model/*php; do
    if [ "$p" = 'lib/Model/ModelInterface.php' ]; then
        continue
    fi
    sed -i 's/^}//g' $p
    sed -i 's/\$fields\[\$variableName\] ?? \$defaultValue/isset(\$fields\[\$variableName\]) ? \$this->createData(\$variableName, \$fields\[\$variableName\]) : \$defaultValue/g' $p
    cat >> $p << EOF
    private function createData(string \$variableName, mixed \$data): mixed
    {
        \$type = self::\$openAPITypes[\$variableName];
        preg_match("/([\\\\\\\\\\w\d]+)(\[\])?/", \$type, \$matches);
        // handle object types
        if (count(\$matches) > 0 && count(\$matches) < 3) {
            try {
                if (!is_array(\$data)) {
                    return \$data;
                }

                return (new \ReflectionClass(str_replace('[]', '', \$type)))->newInstance(\$data);
            } catch (\Exception \$e) {
                return \$data;
            }
        } else if (count(\$matches) >= 3) {
            // Object[]
            // arrays of objects have to be handled differently
            \$reflectionInstances = [];
            foreach (\$data as \$d) {
                try {
                    if (!is_array(\$d)) {
                        \$reflectionInstances[] = \$d;
                        continue;
                    }
                    \$reflectionInstances[] = (new \ReflectionClass(str_replace('[]', '', \$type)))->newInstance(\$d);
                } catch (\Exception \$e) {
                    return \$d;
                }
            }
            return \$reflectionInstances;
        }

        return \$data;
    }
}
EOF
done
mv lib/Model/*.php .
rm -rf lib
cd ../..
