#!/bin/bash

wget -O ./code/.htaccess https://gist.githubusercontent.com/KentVejrupMadsen/2cb31bff8f0bd3758a028f7236b41a6f/raw/e7da673b474b52193b20379dce4bbadbf3df591f/laravel.htaccess
wget -O ./code/public/.htaccess https://gist.githubusercontent.com/KentVejrupMadsen/2cb31bff8f0bd3758a028f7236b41a6f/raw/e7da673b474b52193b20379dce4bbadbf3df591f/laravel.htaccess

wget -O ./code/composer.json https://gist.githubusercontent.com/KentVejrupMadsen/21420f54e741b2958e87320c3e28e631/raw/461b2503edf5c74c9ee40a27044aa5eaeb348141/laravel.composer.json
wget -O ./code/package.json https://gist.githubusercontent.com/KentVejrupMadsen/a09367cbb6f21bcda0cfc1614528fbcb/raw/181679c778451dd319e41debf4c473bae22e5a76/laravel.package.json

cd code
npm install
composer require