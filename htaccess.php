RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^([^/]+)/$ $1.php
RewriteRule ^([^/]+)/([^/]+)/$ /$1/$2.php
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} !(\.[a-zA-Z0-9]{1,5}|/)$
RewriteRule (.*)$ /$1/ [R=301,L]




<!-- URL -->
https://alexcican.com/post/how-to-remove-php-html-htm-extensions-with-htaccess/

