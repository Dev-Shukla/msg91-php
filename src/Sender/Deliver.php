<?php
namespace Sender;

use Sender\Log\Log;
use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\ClientException;

/**
 * This Class for send data using GET and POST method
 *
 * @package    Sender\Deliver
 * @author     VenkatS <venkatsamuthiram5@gmail.com>
 * @link       https://github.com/venkatsamuthiram/deliver
 * @license
 */

class Deliver
{
    protected $client;
    protected $logger;
    public function __construct()
    {
        $this->logger = new Log("Req & Res");
    }
    /**
     * Send POST method
     * @param string $uri MSG91 URI string
     * @param string $xml String of XML data
     *
     * @throws ClientException missing parameters or return empty
     * @return string MSG91 response
     */
    public function sendSmsPost($uri, $xml)
    {
        try {
            $this->logger->info(["Request:"], [$xml], [$uri]);
            $headers = ['Content-Type' => 'text/xml; charset=UTF8'];
            $client  = new Client();
            $request = new Request('POST', 'http://api.msg91.com/api/'.$uri, $headers, $xml);
            $response = $client->send($request);
            return $response->getBody()->getContents();
        } catch (ClientException $e) {
            $this->throwLog($e);
        } finally {
            $this->logger->deleteOldFiles();
        }
    }
    /**
     * Send GET method
     * @param string $uri
     * @param array  $query
     *
     * @throws ParameterException missing parameters or return empty
     * @return string MSG91 response
     */
    public function sendOtpGet($uri, $query)
    {
        try {
            $paramStr = $this->buildQueryString($query);
            $this->logger->info(["Request:"], [$query], [$uri]);
            $headers = ['Content-Type' => 'application/json; charset=UTF8'];
            $client  = new Client();
            $request = new Request('GET', 'http://api.msg91.com/api/'.$uri.$paramStr, $headers);
            $response = $client->send($request);
            // $this->addLogFile("response", $ResponseData); //issue unable to log Response
            return $response->getBody()->getContents();
        } catch (ClientException $e) {
            $this->throwLog($e);
        } finally {
            $this->logger->deleteOldFiles();
        }
    }
    /**
     * This function for Build the query string
     * @param array $query
     *
     * @return string
     */
    protected function buildQueryString($query)
    {
        $paramStr = "";
        $flag = 1;
        foreach ($query as $key => $value) {
            if ($flag) {
                $paramStr .= '?'.$key.'='.urlencode(trim($value));
                $flag = 0;
            } else {
                $paramStr .= "&".$key.'='.urlencode(trim($value));
            }
        }
        return $paramStr;
    }
    /**
     * This function for get the network Guzzle Error
     *
     */
    protected function throwLog($e)
    {
        $request  = Psr7\str($e->getRequest());
        $response = Psr7\str($e->getResponse());
        $this->logger->error(["Exception:"], [$request], [$response]);
    }
}
