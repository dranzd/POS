<?php

require_once 'db.local.php';

return [
    'host'     => defined('DB_HOST') ? DB_HOST : 'localhost',
    'username' => defined('DB_USERNAME') ? DB_USERNAME : 'username',
    'password' => defined('DB_PASSWORD') ? DB_PASSWORD : 'password',
    'database' => defined('DB_NAME') ? DB_NAME : 'database',
    'port'     => defined('DB_PORT') ? DB_PORT : 'port',
];
