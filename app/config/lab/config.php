<?php

return [
    'database' => [
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => 'labuser',
        'password' => '*!Labpassword%$',
        'dbname' => 'labdb',
        'charset' => 'utf8',
    ],
    'application' => [
        'baseUri' => '/' . basename(ROOT_PATH) . '/', //for lab and local env
    ],
];
