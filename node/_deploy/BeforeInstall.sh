#!/usr/bin/env bash

#update
yum update -y

#install npm
curl --silent --location https://rpm.nodesource.com/setup_6.x | bash -
yum install -y nodejs

#install grunt
npm install forever -g

#set ENVIORMENT to testing
export ENVIORMENT=uat

#stop the nodeserver
forever stopall

#delete nodejs
rm -rf /var/nodejs
mkdir /var/nodejs
exit 0