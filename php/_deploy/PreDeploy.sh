#!/usr/bin/env bash
# this script is executed on the deploy server, sysops
# ==============

cd php

#store the timestamp
TIMESTAMP=$(date +%s)

#These files are zipped and sent to the servers for deployment
#zip the files:
zip -r $TIMESTAMP.zip \
    ./app/* \
    ./_deploy/AfterInstall.sh \
    ./_deploy/ApplicationStart.sh \
    ./_deploy/BeforeInstall.sh \
    ./_deploy/user.ini \
    ./_deploy/httpd.conf \
    ./html/* \
    ./html/.htaccess \
    ./src/* \
    ./var/jwt/* \
    ./composer.json \
    ./composer.lock \
    ./appspec.yml \
    ./bin/*

#send to s3
aws s3 cp $TIMESTAMP.zip s3://gifcreatoruat/deploy/$TIMESTAMP.zip --region eu-central-1

#delete previous made zip
rm -f $TIMESTAMP.zip

#instruct codedeploy to start
aws deploy create-deployment \
 --application-name gifcreator_uat \
 --deployment-group-name php \
 --s3-location bucket=gifcreatoruat,bundleType=zip,key=deploy/$TIMESTAMP.zip --region us-east-1

 cd ..