# Projeto SEI 5 

Configuração basica para criação de ambiente do SEI 5 em container ussando imagem ubi9, httpd 2.4 e php 8.2.

Será necessário baixar alguns arquivos e disponibilizá-los no diretório de cada aplicação.

Diretório: sei/pacotes
```
wget https://rpms.remirepo.net/enterprise/remi-release-9.rpm 
wget https://dl.fedoraproject.org/pub/epel/epel-release-latest-9.noarch.rpm
wget https://ftp.postgresql.org/pub/repos/yum/reporpms/EL-9-x86_64/pgdg-redhat-repo-latest.noarch.rpm
wget https://downloadarchive.documentfoundation.org/libreoffice/old/7.4.7.2/rpm/x86_64/LibreOffice_7.4.7.2_Linux_x86-64_rpm.tar.gz
```

Pesquisar uma fonte segura ou usar um equivalente.
msttcore-fonts-2.0-3.noarch.rpm

Diretorio: jod/pacotes
```
wget https://dl.fedoraproject.org/pub/epel/epel-release-latest-9.noarch.rpm
wget https://ftp.unicamp.br/pub/rocky/9.7/AppStream/x86_64/os/Packages/x/xorg-x11-fonts-75dpi-7.5-33.el9.noarch.rpm
```

Este pacote esta dentro do sei-Fontes-5.0.0.zip
sei/bin/jodconverter-server-4.4.8.jar


