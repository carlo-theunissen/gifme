#!/usr/bin/env bash

#install apache with php
sudo yum install -y httpd24 php70 php70-mbstring

#install npm
curl --silent --location https://rpm.nodesource.com/setup_6.x | bash -
yum -y install nodejs

#install grunt
npm install grunt-cli -g

#install composer
sudo curl -sS https://getcomposer.org/installer | sudo php
sudo mv composer.phar /usr/local/bin/composer
sudo ln -s /usr/local/bin/composer /usr/bin/composer

#set ENVIORMENT to testing
export ENVIORMENT=uat

#set git
sudo yum install git

#ssh-keygen TODO
#ssh-agent /bin/bash
#ssh-add ~/.ssh/id_rsa

git clone ....
mv ..../* .
mv ..../.git .
mv ..../.gitignore .
rm -rf ....
#allowrewite set
