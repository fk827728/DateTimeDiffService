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

>`yum install epel-release`<br>
>`yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm`<br>
>`yum install -y php73-php-fpm php73-php-cli php73-php-bcmath php73-php-gd php73-php-json php73-php-mbstring php73-php-mcrypt php73-php-mysqlnd php73-php-opcache php73-php-pdo php73-php-pecl-crypto php73-php-pecl-mcrypt php73-php-pecl-geoip php73-php-recode php73-php-snmp php73-php-soap php73-php-xmll`<br>
>`systemctl enable php73-php-fpm`<br>
>`systemctl start php73-php-fpm`<br>
>`yum-config-manager --enable remi-php73`<br>
>`yum -y install php php-opcache`<br>
>`yum install php-mbstring`<br>
>`yum install php-dom`

To have your Apache webserver start co-working with PHP, restart the server

>`sudo systemctl restart httpd.service`

### Install Git

>`yum install git`

### Install Composer

>`cd /tmp`<br>
>`sudo curl -sS https://getcomposer.org/installer | php`<br>
>`mv composer.phar /usr/local/bin/composer`

## Clone Project

Enter into Apache folder /var/www/html, git clone the project DateTimeDiffService

>`git clone https://github.com/fk827728/DateTimeDiffService.git`

## Import Database

Enter MySQL, source datetimediff.sql in documents folder of project folder<br>
This is the database used to Authentication

>`mysql -uroot -p`<br>
>`>> source /var/www/html/DateTimeDiffService/documents/datetimediff.sql;`

## Composer Install

Enter into the folder /var/www/html/DateTimeDiffService, composer install

>`composer install`

## Configure Environment Parameter

Copy .env.example to .env and edit and save DB_USERNAME and DB_PASSWORD

>`cp .env.example .env`<br>
>`vi .env`

Make the fold storage permission

>`chmod -R 777 storage`

Make your own key

>`php artisan key:generate`

## Test

The installation is finished and Chrome Browser or Postman can be used to test the url below

Authenticate URL

>`http://server_ip/DateTimeDiffService/public/api/v1/datetimediff/2020-01-01/2020-01-02`

Public URL

>`http://server_ip/DateTimeDiffService/public/api/v1/public/datetimediff/2020-01-01/2020-01-02`