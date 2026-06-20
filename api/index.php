<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Override Laravel's storage paths to use the writable /tmp directory in Vercel
$storage = '/tmp/storage';
if (!is_dir($storage)) {
    mkdir($storage, 0777, true);
    mkdir($storage . '/app', 0777, true);
    mkdir($storage . '/framework', 0777, true);
    mkdir($storage . '/framework/cache', 0777, true);
    mkdir($storage . '/framework/sessions', 0777, true);
    mkdir($storage . '/framework/views', 0777, true);
    mkdir($storage . '/logs', 0777, true);
}

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->useStoragePath($storage);

$app->handleRequest(Request::capture());
