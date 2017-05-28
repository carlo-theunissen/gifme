#!/usr/bin/env bash

#store a timestamp
TIMESTAMP=$(date +%s)

#build the frontend
cd frontend
npm install
node build/build.js $TIMESTAMP

#upload only the "static" folder to the s3 bucket
aws s3 cp dist/$TIMESTAMP s3://gifcreatoruat-hosting/$TIMESTAMP --region us-east-1  --recursive

cd ..
