#!/usr/bin/env bash
# this script is executed on the deploy server, sysops
# ==============

#reset to head
git checkout -- .

git pull

#store the timestamp
TIMESTAMP=$(date +%s)

#These files are zipped and sent to the servers for deployment
#zip the files:
zip -r $TIMESTAMP.zip \
    ./php/app/* \
    ./php/_deploy/AfterInstall.sh \
    ./php/_deploy/ApplicationStart.sh \
    ./php/_deploy/BeforeInstall.sh \
    ./php/_deploy/user.ini \
    ./php/_deploy/httpd.conf \
    ./php/html/* \
    ./php/html/.htaccess \
    ./php/src/* \
    ./php/composer.json \
    ./php/composer.lock \
    ./php/appspec.yml

#send to s3
aws s3 cp $TIMESTAMP.zip s3://gifcreatoruat/deploy/$TIMESTAMP.zip --region eu-central-1

#delete previous made zip
rm -f $TIMESTAMP.zip

#instruct codedeploy to start
aws deploy create-deployment \
 --application-name gifcreator_uat \
 --deployment-group-name php \
 --s3-location bucket=gifcreatoruat,bundleType=zip,key=deploy/$TIMESTAMP.zip --region us-east-1