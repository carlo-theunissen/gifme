#!/usr/bin/env bash

#set rights to apache
chown -R apache:apache /var/nodejs
chmod 2775 /var/nodejs
find /var/nodejs -type d -exec chmod 2775 {} \;
find /var/nodejs -type f -exec chmod 0664 {} \;

forever start /var/nodejs/Server.js