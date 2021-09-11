<?php
  // DB Params
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '123456');
  define('DB_NAME', 'gallery');

  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  define('PUBLIC_DIR', dirname(__FILE__, 3) . '\public\\');
  // URL Root
  define('URLROOT', 'http://localhost/30_PHP_gallery');
  // Site Name
  define('SITENAME', 'Gallery');

  //App version
  define('APPVERSION', '1.0.0');
  define('APPDESCRIPTION', 'App to share images and commenting');

  //App variables
  define('MIN_USER_PASS_LENGTH', 6);
  define('MAX_FILE_SIZE', 1000000);
  define('ALLOWED_FILE_TYPES', ['image/jpeg', 'image/png', 'image/gif', 'image/svg']);
  define('UPLOAD_DIR', '\\public\\img\\');
  define('ROOT_DIR', dirname(__FILE__, 3));