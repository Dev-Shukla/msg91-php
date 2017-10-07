<?php
namespace Sender;

use Propaganistas\LaravelPhone\PhoneNumber;

/**
 * This Class for splite mobile number given string
 *
 * @package    Sender\MobileNumber
 * @author     VenkatS <venkatsamuthiram5@gmail.com>
 * @link       https://github.com/venkatsamuthiram/deliver
 * @license
 */

class MobileNumber
{
    /**
     * This function provide valid mobile number array
     *
     * @param string $mobileNumber
     *
     * @return array|boolean Mobile numbers
     */
    public static function isValidNumber($mobileNumber)
    {
        if (isset($mobileNumber) && is_string($mobileNumber)) {
            $data    = [];
            $mobiles = explode(",", $mobileNumber);
            $len     = sizeof($mobiles);
            for ($i = 0; $i < $len; $i++) {
                $lenva = strlen($mobiles[$i]);                
                if (is_numeric($mobiles[$i]) && $lenva >= 8 && $lenva < 15) {
                    if ($i == $len-1) {
                        $data += ["value" => true];
                        $data += ["mobile" => $mobiles];
                    }
                } else {
                    $data += ["value" => false];
                    $data += ["mobile" => $mobiles[$i]];
                }
            }
            return $data;
        } else {
            return false;
        }
    }
}
