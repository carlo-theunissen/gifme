#!/usr/bin/env bash

#rename the index file
aws s3 cp ./frontend/dist/index.html s3://gifcreatoruat-hosting/index.html --region us-east-1
