# DateTimeDiffService Deployment

DateTimeDiffService provides an API to get the difference between two Date Times. The project deployment on CentOS7 steps are below:

- Install LAMP, Git and Composer
- Clone Project
- Import Database
- Composer Install
- Configure Environment Parameter
- Test

## Install LAMP, Git and Composer

### Update Package Repository Cache

Before you start building the stack, be sure to update the packages on your CentOS 7 server using the command

>`sudo yum update`

### Install the Apache Web Server

Install Apache on Centos with

>`sudo yum install httpd`

Finally, set up Apache to start at boot

>`sudo systemctl enable httpd.service`

### Install MySQL (MariaDB)

Install MariaDB with the command

>`sudo yum install mariadb-server mariadb`

Now start MariaDB using the command, and set the password of MySQL

>`sudo systemctl start mariadb`

### Run MySQL Security Script

Begin by typing the command

>`sudo mysql_secure_installation`

Lastly, enable MariaDB to start up when you boot the system

>`sudo systemctl enable mariadb.service`

### Install PHP 7

Install the MySQL extension along with PHP, again using the yum package installer, with the command

>`sudo yum install epel-release yum-utils`<br>
>`sudo yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm`<br>
>`sudo yum-config-manager --enable remi-php73`<br>
>`sudo yum install php php-common php-opcache php-mcrypt php-cli php-gd php-curl php-mysqlnd`<br>
>`yum install php-mbstring`<br>
>`yum install php-dom`

To have your Apache webserver start co-working with PHP, restart the server

>`sudo systemctl restart httpd.service`

### Install Git

>`yum install git`

### Install Composer

>`sudo yum install php-cli php-zip wget unzip`<br>
>`php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"`<br>
>`HASH="$(wget -q -O - https://composer.github.io/installer.sig)"`<br>
>`php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"`<br>
>`sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer`<br>

## Clone Project

Enter into Apache folder /var/www/html, git clone the project DateTimeDiffService

>`cd /var/www/html`<br>
>`git clone https://github.com/fk827728/DateTimeDiffService.git`

## Import Database

Enter MySQL, source datetimediff.sql in documents folder of project folder<br>
This is the database used to Authentication

>`mysql -uroot -p`<br>
>`source /var/www/html/DateTimeDiffService/documents/datetimediff.sql;`<br>
>`exit;`

## Composer Install

Enter into the folder /var/www/html/DateTimeDiffService, composer install

>`cd /var/www/html/DateTimeDiffService`<br>
>`composer install`

## Configure Environment Parameter

Set proper permissions on files.

>`chown -R apache:apache /var/www/html/DateTimeDiffService`<br>
>`chown -R 755 /var/www/html/DateTimeDiffService`<br>
>`chmod -R 755 /var/www/html/DateTimeDiffService/storage`

SELinux enabled systems also run the below command to allow write on storage directory.

>`chcon -R -t httpd_sys_rw_content_t /var/www/html/DateTimeDiffService/storage`

Copy .env.example to .env and edit and modify DB_USERNAME and DB_PASSWORD

>`cp .env.example .env`<br>
>`vi .env`<br>

Make your own key

>`php artisan key:generate`

Copy the APP_KEY in .env and modify config/app.php

>`vi .env`<br>

Ctrl+C copy the APP_KEY

>`vi config/app.php`<br>

Modify "'key' => env('APP_KEY')," to "'key' => env('APP_KEY', your_generated_key)," `, then restart Apache

>`systemctl restart httpd`

## Test

The installation is finished and Chrome Browser or Postman can be used to test the url below

Authenticate URL

>`http://server_ip/DateTimeDiffService/public/api/v1/datetimediff/2020-01-01/2020-01-02`

Public URL

>`http://server_ip/DateTimeDiffService/public/api/v1/public/datetimediff/2020-01-01/2020-01-02`