<?php

if (file_exists(__DIR__ . "/../.env")) {
    $lines = file(__DIR__ . "/../.env");
    foreach ($lines as $line) {
        $line = trim($line);
        if (!empty($line)) {
            putenv($line);
        }
    }
}

if (getenv('CONF_DISPLAY_ERROS') === 'true') {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}
