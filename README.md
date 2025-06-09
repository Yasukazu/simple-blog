# Simple-PHP-Blog
Simple blog system for personal development using procedural PHP and MYSQL.

For educational purposes only.

# Setup

Insert variables of `connect.php` file just before `$dbcon`-starting line with your database credentials like:
```PHP
$dbuser        = "your_name";
$dbpass        = "your_password";
$dbname        = "simpleblog";
$charset       = "utf8mb4";
```

Execute the content of `database.sql` file in MySQL/MariaDB. Then execute 'insert-to-admin-table' SQL:
```SQL
INSERT INTO `admin` (`id`, `username`, `password`, `email`, `date`) VALUES
(1, 'Admin', '<<admin-password-hash>>', '<<user-email>>', '<<yyyy-mm-dd hh:mm:ss>>');
```

If installed on a sub-folder, edit the `config.php` and replace the empty constant with the folder's name.  

The pagination results per page can be set on the `config.php` file.  
```PHP
define('SITE_ROOT', 'blog'); // If installed on a sub-folder, replace the empty constant with the folder's name
```

### URL Rewrite
The latest update introduces 'slugs', also known as 'SEO URLs'.   
After you update to the latest version, click on the "Generate slugs (SEO URLs)" button on the admin dashboard then a slug will be generated for every existing post.   

The blog posts' URL structure is like this: `http://localhost/p/4/apple-reveals-apple-watch-series-7`   

If you use Apache, enable the Apache rewrite module for the .htaccess rewrite rule to work.

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
$hashed = password_hash('<<# Simple-PHP-Blog
Simple blog system for personal development using procedural PHP and MYSQL.

For educational purposes only.

# Setup

Update the `connect.php` file with your database credentials.  
Import the `database.sql` file.  

If installed on a sub-folder, edit the `config.php` and replace the empty constant with the folder's name.  

The pagination results per page can be set on the `config.php` file.  

### URL Rewrite
The latest update introduces 'slugs', also known as 'SEO URLs'.   
After you update to the latest version, click on the "Generate slugs (SEO URLs)" button on the admin dashboard then a slug will be generated for every existing post.   

The blog posts' URL structure is like this: `http://localhost/p/4/apple-reveals-apple-watch-series-7`   

If you use Apache, enable the Apache rewrite module for the .htaccess rewrite rule to work.

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
$hashed = password_hash('<<new-password>>', PASSWORD_DEFAULT);
var_dump($hashed);
?>
```

After you get the new password for user 'admin', you can update the database record column for 'admin' table like this:
```SQL
UPDATE `admin`
SET `password` = '<<newly generated password hash>>'
WHERE `id` = 1;
```
Notice: password hash length must be 255 or less.

# Screenshots

![screenshot_01](https://user-images.githubusercontent.com/16838612/66112823-78d32e00-e5c3-11e9-9b38-93ba488071e0.jpg)
![screenshot_02](https://user-images.githubusercontent.com/16838612/66112874-8d172b00-e5c3-11e9-97e4-590da5675100.jpg)
new-password>>', PASSWORD_DEFAULT);
var_dump($hashed);
?>
```

After you get the new password for user 'admin', you can update the database record column for 'admin' table like this:
```SQL
UPDATE `admin`
SET `password` = '<<newly generated password hash>>'
WHERE `id` = 1;
```
Notice: password hash length must be 255 or less.

# Screenshots

![screenshot_01](https://user-images.githubusercontent.com/16838612/66112823-78d32e00-e5c3-11e9-9b38-93ba488071e0.jpg)
![screenshot_02](https://user-images.githubusercontent.com/16838612/66112874-8d172b00-e5c3-11e9-97e4-590da5675100.jpg)
