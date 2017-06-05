#!/usr/bin/env bash
#this file is executed on the sysops server
#========

git pull

#first deploy the front-end
#the front-end is always backwards compatible with the previous build
#meaning that both the old version and the new version can be run simultaneously (or at least the assets that the old version is using is still available)
#this is necessary because old files can still be cached at the client's computers
#or at cloudfront
# ----
#This is not a big problem if you use the vue asset-loader
bash frontend/_deploy/PreDeploy.sh

#second deploy the back-end, the backend is also backward compatible with the previous front-end
bash php/_deploy/PreDeploy.sh

#thirth deploy the nodeserver
bash node/_deploy/PreDeploy.sh

#postdeploys (in reverse order):
bash node/_deploy/PostDeploy.sh
bash php/_deploy/PostDeploy.sh
bash frontend/_deploy/PostDeploy.sh

