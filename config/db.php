<?php

require_once 'db.local.php';

return [
    'host'     => DB_HOST ?? 'localhost',
    'username' => DB_USERNAME ?? 'username',
    'password' => DB_PASSWORD ?? 'password',
    'database' => DB_NAME ?? 'database',
    'port'     => DB_PORT ?? 'port',
];
