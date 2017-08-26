<?php
namespace Sender;

use Propaganistas\LaravelPhone\PhoneNumber;

/**
* This function for using Mobilenumber Validation
*/

class MobileNumber
{
    // public function __construct($mobileNumber) {
    // 	$this->mobileNumber = $mobileNumber;
    // }
    public function isValid($phone)
    {
        if (is_int($phone)) {
            return  true;
        }
        return false;
    }
    public function getLength($phone)
    {
        $length = strlen($phone);
        if ($length > 1 && $length < 14) {
            return true;
        } else {
            return false;
        }
    }
    public static function isValidNumber($mobileNumber)
    {
        if (isset($mobileNumber) && is_string($mobileNumber)) {
            $result  = '';
            $fail    = '';
            $data    = [];
            $mobiles = explode(",", $mobileNumber);
            $len     = sizeof($mobiles);
            for ($i = 0; $i < $len; $i++) {
                $lenva = strlen($mobiles[$i]);
                if ($lenva >9  && $lenva < 15) {
                    if ($i == $len-1) {
                        $data += ["value" => true];
                        $data += ["Mobiles" => $mobiles];
                    }
                } else {
                    $data += ["value" => false];
                    $data += ["mobile" => $mobiles[$i]];
                }
            }
            return $data;
        }
    }
}