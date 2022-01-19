# The International Map

The application displays a map of the world showing students' origin.

This application is built with Laravel. 

----------

## Website

https://mathias.harbourspace.site
    
Go to the website

    Register by clicking on the icon next to 'Guest'
    
You should now be able to see your user on the map.

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

Install all the dependencies using composer

    With alias: sail composer install
    Without alias: ./vendor/bin/sail composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the application
    
    Attached mode: sail up
    Detached mode: sail up -d
    
Seed data

    sail artisan migrate:fresh --seed
