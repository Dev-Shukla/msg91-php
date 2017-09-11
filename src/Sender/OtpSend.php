<?php
namespace Sender;

use Sender\Deliver;
use Sender\Config\MyConfig;
use Sender\Exception\ParameterException;

/**
* This Class provide OTP APIs
*
* @package    Msg91 SMS&OTP package
* @author     VenkatS <venkatsamuthiram5@gmail.com>
* @link       https://github.com/venkatsamuthiram/deliver
* @license
*/

class OtpSend
{
    /**
    *  Send OTP using MSG91 Service, you want to send OTP using this "sendOtp method"
    *
    * @param  $mobileNumber Numeric
    * @param  $dataArray    Array
    *
    * @return array(Json format)
    *
    * @throws error missing parameters or return empty
    */
    //Method for send OTP
    public static function sendOtp($mobileNumber, $dataArray)
    {
        $data = [];
        // Get Envirionment variable and config file values
        $config          = new MyConfig();
        $container       = $config->getDefaults();
        $data['authkey'] = $container['common']['otpAuthKey'];
        $data['mobile']  = $mobileNumber;
        $otp             = new OtpClass();
        $response        = $otp->sendOtp($dataArray, $data);
        return $response;
    }
    /**
    *  Verify OTP using MSG91 Service, you want to Verify OTP using this "verifyOtp method"
    *
    * @param  $mobileNumber int
    * @param  $dataArray    int
    *
    * @return array(Json format)
    *
    * @throws error missing parameters or return empty
    */
    public static function verifyOtp($mobileNumber, $oneTimePass)
    {
        $data = [];
        // Get Envirionment variable and config file values
        $config        = new MyConfig();
        $container     = $config->getDefaults();
        $data         += ['authkey' => $container['common']['otpAuthKey']];
        $data         += ['mobile' => $mobileNumber];
        $otp           = new OtpClass();
        $response      = $otp->verifyOtp($oneTimePass, $data);
        return $response;
    }
    /**
    *  Resend OTP using MSG91 Service, you want to Resend OTP using this "verifyOtp method"
    *
    * @param  $mobileNumber int
    * @param  $retrytype    String
    *
    * @return array(Json format)
    *
    * @throws error missing parameters or return empty
    */
    public static function resendOtp($mobileNumber, $retrytype = null)
    {
        $data = [];
        // Get Envirionment variable and config file values
        $config          = new MyConfig();
        $container       = $config->getDefaults();
        $data['authkey'] = $container['common']['otpAuthKey'];
        $data['mobile']  = $mobileNumber;
        $otp             = new OtpClass();
        $response        = $otp->retryOtp($retrytype, $data);
        return $response;
    }
}
