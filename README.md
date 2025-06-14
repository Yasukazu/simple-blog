# Simple-PHP-Blog
Simple blog system for personal development using procedural PHP and MYSQL.

For educational purposes only.

# Setup
 - `config.php`
```PHP
<?php
define('SITE_ROOT', 'sub-folder');
define('PAGINATION', 10);
```
 - `db_config.php`
```PHP
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'dbuser');
define('DB_PASS', 'dbpass');
define('DB_NAME', 'dbname');
define('CHARSET', 'utf8mb4');
```

Execute the content of `database.sql` file in MySQL/MariaDB.

Then execute `insert_to-admin_table.php`(yyyy_mm_dd_hh_mm_ss's format is '0000-00-00 00:00:00'):

```SQL
INSERT INTO `admin` (`id`, `username`, `password`, `email`, `date`) VALUES
(1, 'Admin', '{$admin_password_hash}', '{$user_email}', '{$yyyy_mm_dd_hh_mm_ss}');
```

If installed on a sub-folder, edit the `config.php` and replace the empty constant with the folder's name.  

The pagination results per page can be set on the `config.php` file.  

```PHP
define('SITE_ROOT', 'subfolder_name');
```

### URL Rewrite
The latest update introduces 'slugs', also known as 'SEO URLs'.   
After you update to the latest version, click on the "Generate slugs (SEO URLs)" button on the admin dashboard then a slug will be generated for every existing post.   

The blog posts' URL structure is like: `https://localhost/p/3/hyphen-joined-word-list`   

If you use *Apache*, enable its rewrite rule by setting `.htaccess` file:
```.htaccess
RewriteEngine On
RewriteRule ^p/(.*)$ view.php?id=$1 [QSA,L]
```

If you use NGINX, you can insert something similar to the code below in your NGINX configuration block.      
```
location / {
    rewrite ^p/(.*) view.php?id=$1;
}
```

# Default Admin Login
Username: admin  
Password: 12345   

There is no way to update the admin password through the _dashboard_ yet.  
But there is a temporary countermeasure:
  To change your password, hash your password using PHP's `password_hash()` function. Then update the database record with the new password hash.   
Following PHP script is to print a password hash. Save as `pw_hash.php` and install php like `sudo apt install php`(although installing `php` command also installs http server `apache` and rewrites the system start-up job to run http server in background from next reboot; probably `/var/www/html/` might become the localhost's website root directory) then run `php pw_hash.php`:
```php
<?php
$hashed = password_hash($password, PASSWORD_DEFAULT);
echo $hashed;
```

# Setup

Update the `connect.php` file with your database credentials.  
Import the `database.sql` file.  

If installed on a sub-folder, edit the `config.php` and replace the empty constant with the folder's name.  
PASSWORD_DEFAULT 
The pagination results per page can be set on the `config.php` file.  

### URL Rewrite
The latest update introduces 'slugs', also known as 'SEO URLs'.   
After you update to the latest version, click on the "Generate slugs (SEO URLs)" button on the admin dashboard then a slug will be generated for every existing post.   
After you update to the latest version, click on the "Generate slugs (SEO URLs)" button on the admin dashboard, then a slug will be generated for every existing post.   

The blog posts' URL structure is like this: `http://localhost/p/4/apple-reveals-apple-watch-s

If you use Apache, enable the Apache rewrite module for the .htaccess rewrite rule to work.

If you use NGINX, you can insert something similar to the code below in your NGINX configuration block.      
```
location / {
    rewrite ^p/(.*) view.php?id=$1;
}
```

# Default Admin Login
Username: Admin  
Password: 12345   


There is no way to update every admin user's password through the _dashboard_ yet.  
But there is a temporary countermeasure:
  To change your password, hash your password using PHP's `password_hash()` function. Then update the database record with the new password hash.   
The following PHP script is to print a password hash. Save as `pw_hash.php` and install php like `sudo apt install php`(although installing `php` comman
Password: 12345   t directory; you check with command `telnet localhostt 80` returns `HEAD / HTTP/1.0` after just enter twice returns `HTTP/1.1 200 Ok` or command `sudo systemctl status apache2` returns `Active: active (running)`) then run `php pw_hash.php`:

```PHP
<?php
$hashed = password_hash('{{new_password}}', PASSWORD_DEFAULT);
var_dump($hashed);
?>
```

After you get the new password for the user 'Admin', you can update the database record column for the `admin` table like this:
```SQL
UPDATE `admin`
SET `password` = '{{newly_generated_password_hash}}'
WHERE `id` = 1;
```


Notice: password hash length must be 255 or less, per the database table.

# Screenshots

![screenshot_01](https://user-images.githubusercontent.com/16838612/66112823-78d32e00-e5c3-11e9-9b38-93ba488071e0.jpg)
![screenshot_02](https://user-images.githubusercontent.com/16838612/66112874-8d172b00-e5c3-11e9-97e4-590da5675100.jpg)
