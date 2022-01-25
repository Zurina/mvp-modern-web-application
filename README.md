# The International Map

The application displays a map of the world showing students' origin.

This application is built with Laravel. 

----------

## Website

https://mathias.harbourspace.site
    
Go to the website

    Register by clicking on the icon next to 'Guest'
    
You should now be able to see your user on the map.

## Server monitoring

https://mathias.harbourspace.site/health

## Expectations 

    - It is expected that your have Docker installed locally and ready to use from the terminal. 

----------

## Error route

    https://mathias.harbourspace.site/test

## Getting started

### Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Clone the repository

    https: git clone https://github.com/Zurina/mvp-modern-web-application.git
    ssh: git clone git@github.com:Zurina/mvp-modern-web-application.git

Switch to the repo folder

    cd mvp-modern-web-application
    
Add sail as an alias

    Linux: alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

Install dependencies through Docker if you don't have php or composer installed locally:

    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs

Copy the example env file and set application name, application url and database parameters.

    cp .env.example .env

Set the application key

    sail artisan key:generate

Run the application
    
    Attached mode: sail up
    Detached mode: sail up -d
    
Seed data

    sail artisan migrate:fresh --seed
