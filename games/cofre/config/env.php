<?php

/* ================ PLEASE CONFIGURE THIS ================ */

# Url for your root project
define('DOMAIN_URL', $_SERVER['HTTP_HOST']);

# Database configuration
define('DB_SERVER','localhost');
define('DB_NAME','');
define('DB_USER','');
define('DB_PASSWORD','');

/* ================ PLEASE CONFIGURE THIS ================ */

# Theme folder
define('THEME', 'pre-alpha');

# Constants folders
define('ROOT_FOLDER', dirname(__DIR__));
define('CONTROLLER_FOLDER', ROOT_FOLDER . '/app/controller');
define('MODEL_FOLDER', ROOT_FOLDER . '/app/model');
define('VIEW_FOLDER', ROOT_FOLDER . '/app/view');
define('THEME_FOLDER', VIEW_FOLDER .'/' . THEME);
define('STORAGE_FOLDER', ROOT_FOLDER . '/storage/');

# URL protocol
if(
    ( !empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https' )
    || ( !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' )
    || ( !empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' )
) {
    define('URL_PROTOCOL', 'https');
} else {
    define('URL_PROTOCOL', 'http');
}

# URL constants
define('ROOT_URL', URL_PROTOCOL . '://' . DOMAIN_URL . '/games/cofre');
define('THEME_URL', ROOT_URL . '/app/view/' . THEME . '/');
define('STORAGE_URL', ROOT_URL . '/storage');
