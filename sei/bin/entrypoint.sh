#!/bin/bash
#
# Script ...: entrypoint.sh
# Descrição : Ajusta e iniciar o SEI/SIP
# Autor ....: Eugenio Oliveira
#
set -e

echo "======================================================"
echo " SEI 5 com UBI9 - Script de inicializacao"
echo "======================================================"
echo "CRON_ENABLED=$CRON_ENABLED"
echo "GEARMAND_ENABLED=$GEARMAND_ENABLED"
echo "SUPERVISOR_ENABLED=$SUPERVISOR_ENABLED"
echo "HTTPD_ENABLED=$HTTPD_ENABLED"
echo "======================================================"

start_cron() {
    echo "[INFO] Iniciando CRON..."
    cp /opt/tmp/cron.conf /var/spool/cron/root
    crond
}

start_gearmand() {
    echo "[INFO] Iniciando Gearmand..."
    gearmand --log-file=/var/log/gearmand.log --verbose INFO &
}

start_supervisor() {
    echo "[INFO] Iniciando Supervisor..."
    /usr/bin/supervisord -c /etc/supervisord.conf &
}

start_httpd() {
    echo "[INFO] Iniciando Apache (httpd) e php-fpm..."
    rm -f /run/httpd/httpd.pid ; /bin/sh -c /usr/sbin/php-fpm 
    exec /usr/sbin/httpd -DFOREGROUND
}

# ----------------------------------------------------------------------
# Iniciar serviços conforme variáveis do ConfigMap
# ----------------------------------------------------------------------

[ "$CRON_ENABLED" = "true" ] && start_cron
[ "$GEARMAND_ENABLED" = "true" ] && start_gearmand
[ "$SUPERVISOR_ENABLED" = "true" ] && start_supervisor

# Importante: httpd deve ser o processo PID 1 (foreground)
if [ "$HTTPD_ENABLED" = "true" ]; then
    start_httpd
else
    echo "[INFO] HTTPD desabilitado. Aguardando container..."
    tail -f /dev/null
fi


