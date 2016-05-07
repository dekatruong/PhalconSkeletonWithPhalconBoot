<?php

return [
    'database'      => [
        'adapter'   => 'Mysql',
        'host'      => 'localhost',
        'username'  => 'liveuser',
        'password'  => '^%Livepassword%$',
        'dbname'    => 'livedb',
        'charset'   => 'utf8',
    ],
    'application'   => [
        'controllersDir'=> ROOT_PATH.'/app/controllers/',
        'modelsDir'     => ROOT_PATH.'/app/models/',
        'viewsDir'      => ROOT_PATH.'/app/views/',
        
        'sourceDir'     => ROOT_PATH.'/app/source/',
        
        'baseUri'       => '/', //for live env
    ],
];
