<?php

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

$app = require_once __DIR__.'/../bootstrap/app.php';
$app->useStoragePath($storage);

require __DIR__ . '/../public/index.php';
