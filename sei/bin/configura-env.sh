#!/bin/bash
#
# Script ...: configura-env.sh
# Descricao : Faz a configuração filesystem do SEI/SIP
# Autor ....: Eugenio Oliveira
 
set -e
 
mkdir -p /mnt/sei/arquivos /run/php-fpm 
chown -R apache:apache /mnt/sei/arquivos /run/php-fpm
chmod 2775 /mnt/sei/arquivos 

mv /tmp/ff* /usr/local/bin/ 
chmod +x /usr/local/bin/ffmpeg \
         /usr/local/bin/ffprobe \
         /opt/scripts/entrypoint.sh 

# SEI
if [ ! -d /opt/sei/temp ]; then mkdir -p /opt/sei/temp ; fi
chown -R root.apache /opt/sei 
find /opt/sei -type d -exec chmod 2750 {} \; 
find /opt/sei -type f -exec chmod 0640 {} \;
find /opt/sei/temp -type d -exec chmod 2570 {} \;

# SIP
if [ ! -d /opt/sip/temp ]; then mkdir -p /opt/sip/temp ; fi
chown -R root.apache /opt/sip 
find /opt/sip -type d -exec chmod 2750 {} \; 
find /opt/sip -type f -exec chmod 0640 {} \;
find /opt/sip/temp -type d -exec chmod 2570 {} \; 

# Infra
if [ ! -d /opt/infra ]; then mkdir -p /opt/infra ; fi
chown -R root.apache /opt/infra 
find /opt/infra -type d -exec chmod 2750 {} \; 
find /opt/infra -type f -exec chmod 0640 {} \;

# Limpa o temporario
rm -rf /tmp/* 
