<?php

spl_autoload_register(function ($class) {
    $prefix = "App\\";
    $base_dir = __DIR__ . "/src/";
    if (strncmp($prefix, $class, strlen($prefix)) !==0 ){
        return;
    }

    $namespace = substr($class, strlen($prefix));
    $namespace_file = str_replace('\\', DIRECTORY_SEPARATOR, $namespace);

    $file = $base_dir . $namespace_file . '.php';

    if (file_exists($file)) {
        require $file;
    }
});