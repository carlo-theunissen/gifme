#!/bin/sh

#make folders
mkdir dependencies
mkdir dependencies/download

cd dependencies/download

#make sure that the current folder is empty
rm -rf *

#download latest ffmpeg and subtract it
wget http://johnvansickle.com/ffmpeg/releases/ffmpeg-release-64bit-static.tar.xz
mv ffmpeg-release-64bit-static.tar.xz.1 ffmpeg-release-64bit-static.tar.xz
tar -xvJf ffmpeg-release-64bit-static.tar.xz -C .. --strip-components=1

#clean it again
rm -rf *

cd ../

#link the files so we can set this in code
sudo mv ffprobe /usr/local/share/ffprobe
sudo ln -s /usr/local/share/ffprobe /usr/local/bin/ffprobe


#reset directory
cd ../

#print ffprobe version
/usr/local/bin/ffprobe -version

#go inside the php folder
cd php

composer install --dev --prefer-source

##TESTS##

#check if ffprobe is installed
type /usr/local/bin/ffprobe >/dev/null 2>&1 || { echo >&2 "I require /usr/local/bin/ffprobe but it's not installed.  Aborting."; exit 1; }

#start unit tests for PHP
vendor/bin/phpunit --group $ENVIORMENT

#reset directory
cd ../