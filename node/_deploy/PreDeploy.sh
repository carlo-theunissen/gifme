#!/usr/bin/env bash
# this script is executed on the deploy server, sysops
# ==============

cd node

#store the timestamp
TIMESTAMP=$(date +%s)

#These files are zipped and sent to the servers for deployment
#zip the files:
zip -r $TIMESTAMP_nodejs.zip \
    ./app/* \
    ./_deploy/AfterInstall.sh \
    ./_deploy/ApplicationStart.sh \
    ./_deploy/BeforeInstall.sh \
    ./config.json \
    ./Server.json \
    ./package.json

#send to s3
aws s3 cp $TIMESTAMP_nodejs.zip s3://gifcreatoruat/deploy/$TIMESTAMP_nodejs.zip --region eu-central-1

#delete previous made zip
rm -f $TIMESTAMP_nodejs.zip

#instruct codedeploy to start
aws deploy create-deployment \
 --application-name gifcreator_uat \
 --deployment-group-name nodejs \
 --s3-location bucket=gifcreatoruat,bundleType=zip,key=deploy/$TIMESTAMP_nodejs.zip --region us-east-1

 cd ..