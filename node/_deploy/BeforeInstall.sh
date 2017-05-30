#!/usr/bin/env bash

#install npm
curl --silent --location https://rpm.nodesource.com/setup_6.x | bash -
yum install -y nodejs

#install grunt
npm install forever -g

#set ENVIORMENT to testing
export ENVIORMENT=uat

#stop the nodeserver
forever stopall

#remove old content, except "node_modules"
mv /var/nodejs/node_modules /var/temp_modules
rm -rf /var/nodejs
mkdir /var/nodejs
mv /var/temp_modules /var/var/node_modules

exit 0