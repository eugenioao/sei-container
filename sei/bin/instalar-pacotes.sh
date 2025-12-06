#!/bin/bash
#
# Script ...: entrypoint.sh
# Descricao : Faz a instalação e configuração de pacotes PHP para o SEI
# Autor ....: 
# Atualizado: Eugenio Oliveira
 
set -e
 
# Definindo prioridade máxima no repositório RPM ubi.repo
sed -i '/^\[.*\]/a priority = 1' "/etc/yum.repos.d/ubi.repo"
 
# Atualizando DNF
rpm -ivh /tmp/epel-release-latest-9.noarch.rpm
dnf -y update
dnf -y --allowerasing install glibc-locale-source
localedef -c -i pt_BR -f ISO-8859-1 pt_BR.ISO-8859-1
 
# Instalação de pacotes básicos e de desenvolvimento.
dnf -y install \
    httpd \
    openssl \
    wget \
    zip \
    unzip \
    java-1.8.0-openjdk \
    libxml2 \
    fontconfig \
    mod_ssl \
    libaio \
    yum-utils \
    systemtap-sdt-devel \
    dnf-plugins-core \
    gearmand \
    supervisor \
    libgearman \
    which \
    less \
    procps-ng 

rpm -ivh /tmp/xorg-x11-fonts-75dpi-7.5-33.el9.noarch.rpm
 
# Instalação do PHP e suas extensões a partir do repositório UBI.
dnf -y module reset php
dnf -y module enable php:$PHP_VERSION
 
dnf -y install \
    php \
    php-common \
    php-cli \
    php-pear \
    php-bcmath \
    php-gd \
    php-gmp \
    php-intl \
    php-ldap \
    php-mbstring \
    php-odbc \
    php-pdo \
    php-pecl-apcu \
    php-snmp \
    php-soap \
    php-xml \
    php-devel \
    php-pecl-apcu-devel \
    php-pecl-zip
 
# Instalação de extensões PHP adicionais do repositório REMI.
dnf -y module reset php
rpm -ivh /tmp/remi-release-9.rpm
dnf -y module enable php:remi-$PHP_VERSION
 
dnf -y install \
    php-mcrypt \
    php-memcache \
    php-sodium 
 
# Retornando módulo do PHP para versão inicial
dnf -y module reset php
dnf -y module enable php:$PHP_VERSION
 
# Instalação do Microsoft's Core Fonts.
rpm -ivh /tmp/msttcore-fonts-*.rpm
 
# Instalação do wkhtmltox
rpm -ivh /tmp/wkhtmltox-*.rpm
 
# Instalando a extensão
#pecl channel-update pecl.php.net
 
# Configurando saídas de logs do httpd
ln -sf /dev/stdout /var/log/httpd/access_log
ln -s /dev/stderr /var/log/httpd/error_log
 
# Limpando caches do DNF
dnf clean all
rm -rf /var/cache/dnf/*
