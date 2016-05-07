<?php

namespace Application;

use Phalcon\Di;
use Phalcon\Loader;

/**
 * Put this class anywhere you like
 *
 * @author Someone
 */
class Bootstrap extends \PhalconBoot\AbstractPhalconBoot {

    /**
     * 
     * @param Di $di refer to $this->di
     * @param Loader $loader refer to $this->loader
     * @return Loader
     */
    protected function registerAutoloaders(Di $di, Loader &$loader) {
        //Load config       
        $config = $di->getShared('config');
        

        /**
         * Register a set of directories taken from the configuration file
         */
        $loader->registerNamespaces([
            'Application\Controllers'   => $config->application->controllersDir,
            'Application\Models'        => $config->application->modelsDir,
        ])->register();
        
        //Register library place, source place (from the configuration file)
        $loader->registerDirs([
            ROOT_PATH . '/library/',
            $config->application->sourceDir.'/',
        ])->register();
        
        return $loader;
    }

    /**
     * register Services to DI Container
     * @param Di $di refer to $this->di
     * @return Di
     */
    protected function registerServices(Di &$di) {
        //Load config       
        $config = $di->getShared('config');

        /**
         * The URL component is used to generate all kind of urls in the application
         */
        $di->set('url', function() use ($config) {
            $url = new \Phalcon\Mvc\Url();
            $url->setBaseUri($config->application->baseUri);
            return $url;
        }, true);

        /**
         * Setting up the view component
         */
        $di->set('view', function() use ($config) {
            $view = new \Phalcon\Mvc\View();
            $view->setViewsDir($config->application->viewsDir);
            $view->registerEngines(array(
                '.php' => 'Phalcon\Mvc\View\Engine\Php',
                '.html' => 'Phalcon\Mvc\View\Engine\Php',
                '.phtml' => 'Phalcon\Mvc\View\Engine\Php',
            ));
            return $view;
        }, true);

        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di->set('db', function() use ($config) {
            return new \Phalcon\Db\Adapter\Pdo\Mysql($config->database->toArray());
        }, true);

        /**
         * Start the session the first time some component request the session service
         */
        // use normally file-session
        $di->set('session', function() {
        $session = new \Phalcon\Session\Adapter\Files();
        $session->start();
        return $session;
        }, true);

        //Set up the flash service
        $di->setShared('flash', function() {
            $flash = new FlashSession(array(
                'error' => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice' => 'alert alert-info',
                'warning' => 'alert alert-warning'
            ));
            return $flash;
        });
        
        //Setup cache
//        $di->set('cache', function () {
//            $frontCache = new Phalcon\Cache\Frontend\Data(array(
//                "lifetime" => 3600
//            ));
//            $cache = new Phalcon\Cache\Backend\Memcache($frontCache, array(
//                "servers" => array(
//                    array(
//                        "host" => "localhost",
//                        "port" => "11211",
//                        "weight" => "1"
//                    )
//                )
//            ));
//            return $cache;
//        });                
        
        //Setup dispatcher
        $di->set('dispatcher', function() {
            $dispatcher = new \Phalcon\Mvc\Dispatcher();
            $dispatcher->setDefaultNamespace('Application\Controllers\\');
            return $dispatcher;
        }, true);

        ////////////////////////////////////////////////////////////////////////
        //Router Setting
        $router = $di->getShared('router');
        
        $router->setDefaults(array(
            'controller' => 'index',
            'action' => 'index'
         ));
                
        ////////////////////////////////////////////////////////////////////////

        
        return $di;
    }

    //Implement is not required, Default: <ROOT_PATH>/app/config
    protected function declareConfigDir() {
        return ROOT_PATH . '/app/config'; //require declaring ROOT_PATH
    }
   
    //Implement is not required, Default: 1-live, 2-lab, 3-local
    protected function declareAppEnv() {
        return [
            1 => 'live',
            2 => 'lab',
            3 => 'local',
        ];
    }
}
