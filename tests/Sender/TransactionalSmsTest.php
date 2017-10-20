<?php
namespace Sender;

use PHPUnit\Framework\TestCase;
use Sender\TransactionalSms;
use Sender\ExceptionClass\ParameterException;

/**
* This test class for testing TransactionSms class
*/

class TransactionalSmsTest extends TestCase
{
    public $TransactionSms;
    public function setUp()
    {
        $this->TransactionSms = new TransactionalSms("170867ARdROqjKklk599a87a1");
    }
    public function tearDown()
    {
        $this->TransactionSms = null;
    }
    //-----------------------Send TransactionSms------------------------
    //------Test mandatory fields with integer type mobile numbers------
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsMandatoryFieldsMissingMessageIntegerMobile()
    {
        $sendArray = [
           'sender'   => 'UTOOWE',
        ];
        $verifyResponse   = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsMandatoryFieldsMissingSenderIntegerMobile()
    {
        $sendArray = [
           'message'  => 'WELCOME TO TESARK',
        ];
        $verifyResponse   = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsMandatoryFieldsMissingIntegerMobile()
    {
        $sendArray = [];
        $verifyResponse   = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    //------------------------Send TransactionSms---------------------------
    //----------Test mandatory fields with String type mobile numbers-------
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsMandatoryFieldsMissingMessageStringMobile()
    {
        $sendArray = [
           'sender'   => 'UTOOWE',
        ];
        $verifyResponse   = $this->TransactionSms->sendTransactional("919514028541,919791466728", $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsMandatoryFieldsMissingSenderStringMobile()
    {
        $sendArray = [
           'message'  => 'WELCOME TO TESARK',
        ];
        $verifyResponse   = $this->TransactionSms->sendTransactional("919514028541,919791466728", $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsMandatoryFieldsMissingStringMobile()
    {
        $sendArray = [];
        $verifyResponse   = $this->TransactionSms->sendTransactional("919514028541,919791466728", $sendArray);
    }
    //--------------------- Correct format No Error---------------------
    //-----------------------------Country Code-------------------------
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsWithCountryCodeInteger()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => 'UTOOWE',
           'country'   => 91,
        ];
        $result = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
        $this->assertEquals(24, strlen($result));
    }
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsWithOutCountryCodeInteger()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => 'UTOOWE',
        ];
        $result = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
        $this->assertEquals(24, strlen($result));
    }
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsWithCountryCodeNumericString()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => 'UTOOWE',
           'country'   => "91",
        ];
        $result = $this->TransactionSms->sendTransactional("9514028541,9791466728", $sendArray);
        $this->assertEquals(24, strlen($result));
    }
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsWithCountryCodeStringMobile()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => 'UTOOWE',
           'country'   => 91,
        ];
        $result = $this->TransactionSms->sendTransactional("9514028541,9791466728", $sendArray);
        $this->assertEquals(24, strlen($result));
    }
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsWithOutCountryCodeString()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => 'UTOOWE',
        ];
        $result = $this->TransactionSms->sendTransactional("919514028541,919791466728", $sendArray);
        $this->assertEquals(24, strlen($result));
    }
    //------------------------------Flash only -----------------
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsFlash()
    {
        $sendArray = [
           'message' => 'WELCOME TO TESARK',
           'sender' => 'UTOOWE',
           'flash' => 1,
        ];
        $result   = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
        $this->assertEquals(24, strlen($result));
    }
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsFlashZero()
    {
        $sendArray = [
           'message' => 'WELCOME TO TESARK',
           'sender' => 'UTOOWE',
           'flash' => 0,
        ];
        $result   = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
        $this->assertEquals(24, strlen($result));
    }
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsFlashCountryCode()
    {
        $sendArray = [
           'message' => 'WELCOME TO TESARK',
           'sender' => 'UTOOWE',
           'flash' => 1,
           'country' => 91,
        ];
        $result = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
        $this->assertEquals(24, strlen($result));
    }
    //----------------------- Unicode ------------------------
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsUnicode()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'unicode'      => 1,
        ];
        $result = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
        $this->assertEquals(24, strlen($result));
    }
    //---------------------- Schtime -------------------------
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsSchtimedashFormat()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => "2020-01-01 10:10:00",
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
        $this->assertEquals(24, strlen($result));
    }
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsSchtimeFrontslashFormat()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => "2020/01/01 10:10:00",
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
        $this->assertEquals(24, strlen($result));
    }
    //----------------------- Response-----------------------
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsResponseJson()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'response'     => "json",
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
        $array = json_decode($result);
        $this->assertObjectHasAttribute("type", $array);
    }
    //------------------------ Afterminutes-----------------
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsWithoutCountryCode()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'country'      => 91,
           'afterminutes' => 10
        ];
        $result  = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
        $this->assertEquals(24, strlen($result));
    }
    //----------------------- Campaign ---------------------
    /**
     * @requires function deleteOldFiles
     */
    public function testTransactionalSmsCampaign()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'campaign'     => "venkat"
        ];
        $result  = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
        $this->assertEquals(24, strlen($result));
    }
    //--------------- Wrong format with Error Exception -------
    //-------------------------Message-------------------------
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsMessageInteger()
    {
        $sendArray = [
           'message'   => 452124555555,
           'sender'    => 'UTOOWE',
           'country'   => 91,
        ];
        $result = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsMessageArray()
    {
        $sendArray = [
           'message'   => [4521.24555555],
           'sender'    => 'UTOOWE',
           'country'   => 91,
        ];
        $result = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsMessageDouble()
    {
        $sendArray = [
           'message'   => 4521.24555555,
           'sender'    => 'UTOOWE',
           'country'   => 91,
        ];
        $result = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsMessageNull()
    {
        $sendArray = [
           'message'   => null,
           'sender'    => 'UTOOWE',
           'country'   => 91,
        ];
        $result = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsMessageBoolean()
    {
        $sendArray = [
           'message'   => true,
           'sender'    => 'UTOOWE',
           'country'   => 91,
        ];
        $result = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsMessageMax()
    {
        $sendArray = [
           'message'   => "WELCOME TO TESARK fgsdhjfsgdjhgfjsdghsffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffj",
           'sender'    => 'UTOOWE',
           'country'   => 91,
        ];
        $result = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    //---------------------- Sender ---------------------------
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSenderMin()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => 'UTOO',
        ];
        $result = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSenderMax()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => 'UTOOWESSSS',
        ];
        $result = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSenderInteger()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => 564654,
        ];
        $result = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSenderDouble()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => 56.4654,
        ];
        $result = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSenderBoolean()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => true,
        ];
        $result = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSenderNull()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => null,
        ];
        $result = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSenderArray()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => ['true'],
        ];
        $result = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    //------------------------ Country Code ----------------------
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsWithCountryCodeBoolean()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => 'UTOOWE',
           'country'   => true,
        ];
        $result = $this->TransactionSms->sendTransactional("9514028541,9791466728", $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsWithCountryCodeString()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => 'UTOOWE',
           'country'   => "IND",
        ];
        $result = $this->TransactionSms->sendTransactional("9514028541,9791466728", $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsWithCountryCodeArray()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => 'UTOOWE',
           'country'   => ["IND"],
        ];
        $result = $this->TransactionSms->sendTransactional("9514028541,9791466728", $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsWithCountryCodeNull()
    {
        $sendArray = [
           'message'   => 'WELCOME TO TESARK',
           'sender'    => 'UTOOWE',
           'country'   => null,
        ];
        $result = $this->TransactionSms->sendTransactional("9514028541,9791466728", $sendArray);
    }
    //-------------------------Flash only ------------------------
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsFlashNull()
    {
        $sendArray = [
           'message' => 'WELCOME TO TESARK',
           'sender' => 'UTOOWE',
           'flash' => null,
        ];
        $result   = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsFlashDefaultNull()
    {
        $sendArray = [
           'message' => 'WELCOME TO TESARK',
           'sender' => 'UTOOWE',
           'flash' => 7,
        ];
        $result   = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsFlashArray()
    {
        $sendArray = [
           'message' => 'WELCOME TO TESARK',
           'sender' => 'UTOOWE',
           'flash' => ['7'],
        ];
        $result   = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    //----------------------- Unicode -------------------------
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsUnicodeNull()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'unicode'      => null,
        ];
        $result = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsUnicodeDefaultNull()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'unicode'      => 7,
        ];
        $result = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsUnicodeArray()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'unicode'      => ['7'],
        ];
        $result = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsUnicodeOneMessageLimit()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss',
           'sender'       => 'UTOOWE',
           'unicode'      => 1,
        ];
        $result = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    //---------------------- Schtime --------------------------
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSchtimeFormatWrongOne()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => "2020-01/01 10:10:00",
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSchtimeFormatWrongTwo()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => "2020-01/01",
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSchtimeFormatWrongThree()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => "2020-01/01 10-10-00",
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSchtimeFormatWrongFour()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => "10:10:00",
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSchtimeFormatWrongFive()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => "2020/01/01 10-10-00",
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSchtimeFormatWrongSix()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => "10-10-00",
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSchtimeFormatWrongSeven()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => 30,
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSchtimeFormatWrongEight()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => "1Days",
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSchtimeFormatWrongNine()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => true,
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSchtimeFormatWrongTen()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => 7845.637,
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSchtimeFormatNull()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => null,
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsSchtimeFormatArray()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'schtime'      => ['7845.637'],
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    //----------------------- Response-------------------------
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsResponseBoolean()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'response'     => true,
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsResponseNull()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'response'     => null,
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsResponseInteger()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'response'     => 4545,
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsResponseArray()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'response'     => ['4545'],
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsResponseDouble()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'response'     => 43.435434,
        ];
        $result  = $this->TransactionSms->sendTransactional(919514028541, $sendArray);
    }
    //------------------------ Afterminutes--------------------
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsAfterminutesMin()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'country'      => 91,
           'afterminutes' => 9
        ];
        $result  = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsAfterminutesMax()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'country'      => 91,
           'afterminutes' => 20001
        ];
        $result  = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsAfterminuteBoolean()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'country'      => 91,
           'afterminutes' => true
        ];
        $result  = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsAfterminutesString()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'country'      => 91,
           'afterminutes' => "20001"
        ];
        $result  = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsAfterminutesArray()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'country'      => 91,
           'afterminutes' => ["20001"]
        ];
        $result  = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    //----------------------- Campaign ----------------------------
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsCampaignBoolean()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'campaign'     =>  true
        ];
        $result  = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsCampaignInteger()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'campaign'     =>  4334
        ];
        $result  = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsCampaignArray()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'campaign'     =>  [4334]
        ];
        $result  = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
    /**
     * @expectedException Sender\ExceptionClass\ParameterException
     */
    public function testTransactionalSmsCampaignDouble()
    {
        $sendArray = [
           'message'      => 'WELCOME TO TESARK',
           'sender'       => 'UTOOWE',
           'campaign'     =>  43.88834
        ];
        $result  = $this->TransactionSms->sendTransactional(9514028541, $sendArray);
    }
}
