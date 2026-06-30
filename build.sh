#!/usr/bin/env sh
set -eu

SCRIPT_DIR=$(CDPATH= cd -- "$(dirname -- "$0")" && pwd)
CODEGEN_JAR="$SCRIPT_DIR/swagger-codegen-cli.jar"
SWAGGER_CONF="$SCRIPT_DIR/swagger.conf"
DOMAINROBOT_SPEC="$SCRIPT_DIR/vendor/internetx/internetx-swagger-files/src/domainrobot.json"
PCDOMAINS_SPEC="$SCRIPT_DIR/vendor/internetx/internetx-swagger-files/src/pcdomains.json"
MODEL_DIR="$SCRIPT_DIR/src/Model"

if [ ! -f "$CODEGEN_JAR" ]; then
    echo "swagger-codegen jar not found: $CODEGEN_JAR" >&2
    exit 1
fi

# domainrobot.json contains a definition for a class named Void.
# In PHP, Void is a reserved word which cannot be used as a class name.
# Fix that definition before generation.
sed 's/ "Void" : {/ "VoidResponse" : {/' "$DOMAINROBOT_SPEC" > "$SCRIPT_DIR/vendor/internetx/internetx-swagger-files/src/tmp_domainrobot.json"
mv "$SCRIPT_DIR/vendor/internetx/internetx-swagger-files/src/tmp_domainrobot.json" "$DOMAINROBOT_SPEC"
sed 's/"#\/definitions\/Void"/"#\/definitions\/VoidResponse"/' "$DOMAINROBOT_SPEC" > "$SCRIPT_DIR/vendor/internetx/internetx-swagger-files/src/tmp_domainrobot.json"
mv "$SCRIPT_DIR/vendor/internetx/internetx-swagger-files/src/tmp_domainrobot.json" "$DOMAINROBOT_SPEC"

generate_models() {
    spec_file="$1"
    output_dir="$2"

    java \
        -Dmodels \
        -DsupportingFiles \
        -DmodelDocs=false \
        -DmodelTests=false \
        -cp "$CODEGEN_JAR" \
        io.swagger.codegen.Codegen \
        -l php \
        -i "$spec_file" \
        -c "$SWAGGER_CONF" \
        -o "$output_dir"
}

TMP_OUT_DOMAINROBOT=$(mktemp -d)
TMP_OUT_PCDOMAINS=$(mktemp -d)

cleanup() {
    rm -rf "$TMP_OUT_DOMAINROBOT" "$TMP_OUT_PCDOMAINS"
}
trap cleanup EXIT INT TERM

generate_models "$DOMAINROBOT_SPEC" "$TMP_OUT_DOMAINROBOT"
generate_models "$PCDOMAINS_SPEC" "$TMP_OUT_PCDOMAINS"

if [ -d "$TMP_OUT_DOMAINROBOT/lib/Model" ]; then
    mv "$TMP_OUT_DOMAINROBOT"/lib/Model/*.php "$MODEL_DIR"/
fi

if [ -d "$TMP_OUT_PCDOMAINS/lib/Model" ]; then
    mv "$TMP_OUT_PCDOMAINS"/lib/Model/*.php "$MODEL_DIR"/
fi
