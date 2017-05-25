#!/usr/bin/env bash

#set rights to apache
chown -R apache:apache /var/www
chmod 2775 /var/www
find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;

#start the server
sudo service httpd stop