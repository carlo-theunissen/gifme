#!/usr/bin/env bash
# this script is executed on the deploy server, sysops
# ==============

cd node

npm install

#store the timestamp
TIMESTAMP_NODE=$(date +%s)

#These files are zipped and sent to the servers for deployment
#zip the files:
zip -r $TIMESTAMP_NODE.zip \
    ./app/* \
    ./_deploy/AfterInstall.sh \
    ./_deploy/ApplicationStart.sh \
    ./_deploy/BeforeInstall.sh \
    ./config.json \
    ./appspec.yml \
    ./node_modules/* \
    ./Server.js \
    ./package.json

#send to s3
aws s3 cp $TIMESTAMP_NODE.zip s3://gifcreatoruat/deploy/nodejs/$TIMESTAMP_NODE.zip --region eu-central-1

#delete previous made zip
rm -f $TIMESTAMP_NODE.zip

#instruct codedeploy to start
aws deploy create-deployment \
 --application-name gifcreator_uat \
 --deployment-group-name nodejs \
 --s3-location bucket=gifcreatoruat,bundleType=zip,key=deploy/nodejs/$TIMESTAMP_NODE.zip --region us-east-1

 cd ..