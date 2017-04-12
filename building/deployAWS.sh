#!/bin/sh
cd /var/www

#reset to head
git checkout -- .

git pull

#set permissions so apache can execute it
chown -R apache:apache /var/www
sudo chmod 2775 /var/www
find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;

#composer
composer selfupdate
composer install --prefer-source

#execute the build script
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
