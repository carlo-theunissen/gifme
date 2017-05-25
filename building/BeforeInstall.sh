#!/usr/bin/env bash

#install apache with php
sudo yum install -y httpd24 php70 php70-mbstring php70-pdo php70-mysqli

#install composer
sudo curl -sS https://getcomposer.org/installer | sudo php
sudo mv composer.phar /usr/local/bin/composer
sudo ln -s /usr/local/bin/composer /usr/bin/composer

#set ENVIORMENT to testing
export ENVIORMENT=uat

#stop the server
sudo service httpd stop

#remove old content, except "vendor"
sudo find /var/www/* ! -name 'vendor' -type d -exec rm -fr {} +