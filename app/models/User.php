<?php

namespace Application\Models;

use Application\Models\ModelBase;
use PDO;

/**
 * User Model
 *
 * @author Deka
 */
class User extends ModelBase {

    const TABLE_NAME = 'user';

    /**
     * singleton
     * @var User 
     */
    public static $instance;

    /**
     * 
     * @return User
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @override
     */
    public function initialize() {
        
    }

    /**
     * @override
     */
    public function getSource() {
        return self::TABLE_NAME;
    }
   
}
