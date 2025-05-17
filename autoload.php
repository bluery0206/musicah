<?php

spl_autoload_register(function ($className) {
    $directories = [
        __DIR__ . '/app/controllers/',
        __DIR__ . '/app/models/',
        __DIR__ . '/app/views/',
    ];

    foreach ($directories as $directory) {
        $file = $directory . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    }

    return false;
});