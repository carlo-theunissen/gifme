#!/usr/bin/env bash
# this script is executed on the deploy server, sysops
# ==============

#reset to head
git checkout -- .

git pull

#store the timestamp
TIMESTAMP=$(date +%s)

#These files are zipped and sent to the servers for deployment
# - app
# - building/AfterInstall.sh
# - building/ApplicationStart.sh
# - building/BeforeInstall.sh
# - building/user.ini
# - html
# - src
# - composer.json
# - composer.lock
# - appspec.yml

#zip the files:
zip -r $TIMESTAMP.zip \
    ./app/* \
    ./building/AfterInstall.sh \
    ./building/ApplicationStart.sh \
    ./building/BeforeInstall.sh \
    ./building/user.ini \
    ./html/* \
    ./src/* \
    ./composer.json \
    ./composer.lock \
    ./appspec.yml

#send to s3
aws s3 cp $TIMESTAMP.zip s3://gifcreatoruat/deploy/$TIMESTAMP.zip --region eu-central-1

#delete made zip
rm -f $TIMESTAMP.zip

#instruct codedeploy to start
aws deploy create-deployment \
 --application-name gifcreator_uat \
 --deployment-group-name php \
 --s3-location bucket=gifcreatoruat,bundleType=zip,key=deploy/1495743007.zip --region us-east-1