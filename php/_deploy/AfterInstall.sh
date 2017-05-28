#!/usr/bin/env bash

#install everything with composer
composer install -d  /var/www/

#instal ffmpeg
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