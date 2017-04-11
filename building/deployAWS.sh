#!/bin/sh

cd /var/www/html

git reset HEAD --hard
git pull

bash building/build.sh