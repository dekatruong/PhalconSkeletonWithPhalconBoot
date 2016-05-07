<?php

namespace Application\BUS;

use YW\SMSGateWayService\iNet\Notification;
use YW\SMSGateWayService\iNet\NotificationReponse;
use YW\SMSGateWayService\iNet\SMSToCustomer;
use Application\Models\User;
use Application\SMSGateWayService\iNet\SmsContentValidationAndParser as Parser;
use YW\Utils\Filter\GlobalPhoneFormatFilter;

/**
 * Description of SmsGatewayBO
 *
 * @author Deka
 */
class UserLoginBO extends BaseBO {
        
    protected static $MAP_RESULTCODE_TO_MESSAGE = [
        -2=> 'Wrong parameter', //Miss parameter(s), wrong format,...
        -1=> 'Not authenticated request', //wrong token, signature,...
        0 => 'Failed',
        1 => 'Success',
        2 => 'Wrong-format param(s)',               
    ];
    
    protected function declareResultCodeToMessageMap() {
        return self::$MAP_RESULTCODE_TO_MESSAGE;
    }    
    
    /**
     * 
     * @param mixed $params
     * @return array
     */
    public function business($params) {   

        //Default
        $result_code = 0;
        
        //Bussiness
        //...
        
        //Result
        $result['result_code']  = $result_code;       
        $result['message']      = $this->getMessageFromResultCode($result_code);  
        
        return $result;
    }
        
}
