<?php

namespace Application\BUS;

/**
 * Description of BaseBO
 *
 * @author Deka
 */
abstract class BaseBO implements \Phalcon\Di\InjectionAwareInterface {
    
    protected $_dependencyInjector; //Dependency Injector

    public function getDI() {
        return $this->_dependencyInjector;
    }

    public function setDI(\Phalcon\DiInterface $dependencyInjector) {
        $this->_dependencyInjector = $dependencyInjector;
        return $this;
    }
     
    abstract protected function declareResultCodeToMessageMap();

    abstract public function business($params);
    
    /**
     * 
     * @param type $result_code
     * @return string
     */
    protected function getMessageFromResultCode($result_code) {
        if(isset($this->declareResultCodeToMessageMap()[$result_code])){
            return $this->declareResultCodeToMessageMap()[$result_code];
        } else {
            return 'Unknown Error';
        }
    }
}
