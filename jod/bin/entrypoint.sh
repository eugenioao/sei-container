#!/bin/bash
#
# Script ...: entrypoint.sh
# Descricao : Executa o jod converter para converter os documentos do SEI
# Autor ....: Eugenio Oliveira

cd /opt/app
/bin/java -jar /opt/app/jodconverter-4.4.8.jar
