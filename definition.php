<?php
//Define App Environment: get from config that we has set in Webserver(Apache, Nginx). Please see tutorial in github.
//Note: "live" evironment is default, so that, don't need to set any config in the live-environment
$APP_ENV = getenv('APP_ENV');
($APP_ENV && in_array($APP_ENV, array('local', 'lab', 'live')))
        ? define('APP_ENV', $APP_ENV) 
        : define('APP_ENV', 'live'); //cases: local, lab, live

//Define folder-path of this site-folder
define('ROOT_PATH', realpath('..'));