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

>`sudo systemctl enable httpd`
>`sudo systemctl restart httpd`

If you can not access the Apache on the client, execute the following command

>`iptables -I INPUT -p TCP --dport 80 -j ACCEPT`

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
>`sudo yum install php-mbstring`<br>
>`sudo yum install php-dom`

To have your Apache webserver start co-working with PHP, restart the server

>`sudo systemctl restart httpd`

### Install Git

>`sudo yum install git`

### Install Composer

>`sudo yum install php-cli php-zip wget unzip`<br>
>`php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"`<br>
>`HASH="$(wget -q -O - https://composer.github.io/installer.sig)"`<br>
>`php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"`<br>
>`sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer`

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

Set proper permissions on files

>`sudo chown -R apache:apache /var/www/html/DateTimeDiffService`

SELinux enabled systems also run the below command to allow write on storage directory.

>`sudo chcon -R -t httpd_sys_rw_content_t /var/www/html/DateTimeDiffService/storage`

Copy .env.example to .env and edit and modify DB_USERNAME and DB_PASSWORD

>`sudo cp .env.example .env`<br>
>`sudo vi .env`<br>

Make your own key

>`php artisan key:generate`

Copy the APP_KEY in .env and modify config/app.php

>`sudo vi .env`<br>

Ctrl+C copy the APP_KEY

>`sudo vi config/app.php`<br>

Modify "'key' => env('APP_KEY')," to "'key' => env('APP_KEY', your_generated_key)," `

```
'key' => env('APP_KEY', your_generated_key),
```


Make Apache support rewrite

>`sudo vi /etc/httpd/conf/httpd.conf`

Add the code 

```
LoadModule rewrite_module modules/mod_rewrite.so

<Directory "/var/www/html/DateTimeDiffService/public">
    AllowOverride All
    Require all granted
</Directory>
```

Close selinux temporalily to make MySQL query permission right

>`setenforce 0`

Restart Apache

>`sudo systemctl restart httpd`

## Test

The installation is finished and Chrome Browser or Postman can be used to test the url below

Authenticate URL

>`http://server_ip/DateTimeDiffService/public/api/v1/datetimediff/2020-01-01/2020-01-02`

Public URL  

>`http://server_ip/DateTimeDiffService/public/api/v1/public/datetimediff/2020-01-01/2020-01-02`

You can use PostMan to query the url and get the result

The API Token is below

```
eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjM0MGRmMGIyNGE2ZTU0ZmRkYmFlOTk4MTJkOGQ3YjMyNzkyOGNiOGRjNTM0ZWJkNTZiNWE2Yjg5Nzk2ZTMyMThmYjQ4OGM2YTIyY2ZiM2NhIn0.eyJhdWQiOiIxIiwianRpIjoiMzQwZGYwYjI0YTZlNTRmZGRiYWU5OTgxMmQ4ZDdiMzI3OTI4Y2I4ZGM1MzRlYmQ1NmI1YTZiODk3OTZlMzIxOGZiNDg4YzZhMjJjZmIzY2EiLCJpYXQiOjE1OTQzOTcyMDQsIm5iZiI6MTU5NDM5NzIwNCwiZXhwIjoxNjI1OTMzMjA0LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.YHPJwxtP9t2y8Vlqsk4khsv6X2w9ut1c6llGITwoLByo6uT3rpoCxCH_cJTPPbMcpQkwVJvykUnApOITYWYSV2HwkYaEp-YyMYKhNcl0MiGd0lh9hvwgBJX9VASq8Gc4XNr-mZTZC9_Zkt32V_979xgWsObdswCkb7kx-soh4twPSDPDLRKgJrCOvhgciH25cvTo5l44Aye8puRrKzHMbpyhHNWAeeHFPI5W3Zi2WpSIfLC3O_5WZkp3RhKTECYgHWiamPOIZlyIY68KjeRqsW9eVdFKiKFb29YWt8uw8mflgyuis0Tv3FpA_KO-dKi0L0HhX9UtpZjZd0NGw_IfH7Ei-fpGubOQwEybcEly6l8gAFkvLFfNjIpMOjnnVJTX2R5oliuXzL9IezOL6KUlxwLCmoI_0P1FXBf09QkpM6Yh6Yp8-sLEX2FdzS_qZepoBZCGr3VLmGSNye223rSOX2CDwB_cRzSD-PvRcigQ5wXg1xO51vqf6XOwtwoIVht3z-_sekla5uJs3xb8t6C0sjEsiBlrnIKV2Cn7QKXdSoucBcSOa26x5PzcSqDlgu2J8KGh-KgAskMDMKQhAfQ4blvyP10rcva7KXn9Zb_eNEd9gtUr0G73fdd7OA8zPQKWYUwpqnNRy_-vrJTnJiKZ0eiba9PRZM4PySWi-GAdZec
```