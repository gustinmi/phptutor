# Phptutor for LAMP stack

Walk through modern  PHP language. Covers :

1. CLI command line php
2. HTTP and webpages with PHP
3. MySqli library extensions.

## Installation of the LAMP stack 

### Installatzion of Apache webserver

    sudo apt-get install apache2

### Installation of mySql    

    sudo apt-get install mysql-server mysql-client 
    sudo apt-get install libapache2-mod-auth-mysql php5-mysql
    
### installation of PHP5

    sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt

### installation of additional tools

    sudo apt-get install mc lynx vim wget curl less 

## Checking php runtime configuration info

    php -m   #show compiled modules
    php --info  #show php info
    php -v #version of php

## Testing PHP code    
    
### Testing php webpages without apache    
    
    cd ~/public_html
    php -S localhost:8000
    lynx http://localhost:8000
    
### Testing standalone scripts

Execute a php by intepreter. Beware tha CLI contenxt is different then web context. 

    php myscript.php  
    
### Testing via commandline

Bash oneliner for testing purposes

    echo '<?php require 'appconfig.php'; ?>' - | php    



    
    
    
