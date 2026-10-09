<?php

require_once __DIR__ . '/vendor.autoload.php';

use app\Services\UserService;

$service = new UserService();

$user = $service->createUser(
    'Budi',
    'budi@example.com'
);

echo $service->displayUser($user);