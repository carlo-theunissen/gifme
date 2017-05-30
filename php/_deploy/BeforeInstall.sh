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
service httpd sto

#remove old content, except "vendor"
mv /var/www/vendor /var/temp
rm -rf /var/www
mkdir /var/www
mv /var/temp /var/www/vendor

#remove old httpd.conf
rm -f /etc/httpd/conf/httpd.conf
exit 0