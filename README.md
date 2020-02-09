# Docker Compse setup for PHP-FPM 7.2, MySql 5.6, and Nginx (latest)
PHP is built with extensions: mysqli, pdo, pdo_mysql and xdebug.

MySql data is stored in a volume to maintain persistance: mysql-data

To use, clone this repo, and:
1. Create new top level directory: mysql-data
2. Run `docker-compose up --build`
3. Open browser: http://127.0.0.1:3050/
4. Check your db connection: http://127.0.0.1:3050/db-test.php

Note nginx is setup to use index.php as a front controller - see the nginx conf file for other options. 

Change other configs as needed to suit your situation 🍻
