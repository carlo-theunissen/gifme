#!/usr/bin/env bash

npm run build

zip -r deploy.zip \
    ffmpeg \
    gifsicle \
    index.js
