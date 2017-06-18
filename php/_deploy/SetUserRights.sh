#!/usr/bin/env bash

#set rights in /var/www folder
chown -R codedeploy:webservices /var/www
chown -R apache:webservices /var/www/var
chmod 2755 -R /var/www #give user full rights, and others read and execute
chmod 0775 -R /var/www/var #give the whole group right for writing, reading and executing, othes read and execute
find /var/www -type f -exec chmod 0744 -- {} +

#set ffprobe rights
chown apache:webservices /usr/local/share/ffprobe
chmod 2550 /usr/local/share/ffprobe