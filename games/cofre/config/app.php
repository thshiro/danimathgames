<?php
# Starting session

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

# Seting locale
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

# Seting timezone
date_default_timezone_set('America/Fortaleza');

# Showing PHP Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

# Requiring variables file
require_once(__DIR__ . '/env.php');

# Composer autoload
require_once(ROOT_FOLDER . '/vendor/autoload.php');
