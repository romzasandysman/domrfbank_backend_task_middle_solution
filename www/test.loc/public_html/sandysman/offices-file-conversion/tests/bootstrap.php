<?php

$autoloaderPath = __DIR__ . '/../../../vendor/autoload.php';
$composer       = file_exists($autoloaderPath);

if (!$composer){
    print 'No test fixture autoloader was registered, exiting.' . PHP_EOL;
    exit(1);
}

require_once $autoloaderPath;