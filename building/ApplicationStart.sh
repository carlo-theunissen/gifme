#!/usr/bin/env bash

#set rights to apache
sudo chown -R apache:apache /var/www
sudo chmod 2775 /var/www
sudo find /var/www -type d -exec sudo chmod 2775 {} \;
sudo find /var/www -type f -exec sudo chmod 0664 {} \;

#start the server
sudo service httpd stop