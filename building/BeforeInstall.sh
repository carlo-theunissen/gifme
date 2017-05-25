#!/usr/bin/env bash

#install apache with php
yum install -y httpd24 php70 php70-mbstring php70-pdo php70-mysqli

#install composer
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
ln -s /usr/local/bin/composer /usr/bin/composer

#set ENVIORMENT to testing
export ENVIORMENT=uat

#stop the server
service httpd stop

#remove old content, except "vendor"
find /var/www/* ! -name 'vendor' -type d -exec rm -fr {} +