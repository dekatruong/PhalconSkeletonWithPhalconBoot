<?php

//Define
require_once '../definition.php';

//Register Composer Autoload
require ROOT_PATH . '/vendor/autoload.php';

//Setting
include_once ROOT_PATH.'/setting/'.APP_ENV.'/setting.php';

try {
    //Include Bootstrap class. Note: not need if install composer correctly
    require_once ROOT_PATH.'/app/Bootstrap.php';
    
    $bootstrap = new \Application\Bootstrap(APP_ENV); //To do: can use builder parttern
    
    $bootstrap->run();
    
} catch (Phalcon\Exception $e) {
    echo $e->getMessage();
} catch (PDOException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}