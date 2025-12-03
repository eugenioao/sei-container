#!/bin/bash
#
# Script ...: entrepoint.sh
# Descricao : Faz o start do memcached com os valores definidos no cm
# Autor ....: Eugenio Oliveira

set -e

# Usa o valor vindo de ConfigMap / variável de ambiente
PARAMS=${PARAMETROS:-"-m 256 -p 11211 -c 1024 -t 4"}

exec memcached $PARAMS
