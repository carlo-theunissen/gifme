#!/bin/sh
cd /var/www

git pull

php composer.phar selfupdate
php composer.phar install --prefer-source

bash building/build.sh

#store the timestamp
TIMESTAMP=$(date +%s)

mv html/version html/v_$TIMESTAMP

#remove all the folders except the first 2
ls -dt html/v_*/ | tail -n +3 | xargs rm -rf

#stop the server
sudo service httpd stop

#set user ini
rm -f /etc/php-7.0.d/user.ini
mv user.ini /etc/php-7.0.d/user.ini

#set version
rm version.txt -f
echo v_$TIMESTAMP > version.txt

#start the server
sudo service httpd start
