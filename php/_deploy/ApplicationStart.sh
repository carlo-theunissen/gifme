#!/usr/bin/env bash

#set rights to apache
chgrp apache /var/www
chmod g+w /var/www


#start the server
service httpd start

#and restart it once again
service httpd restart