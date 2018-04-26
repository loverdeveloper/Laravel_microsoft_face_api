<?php
/**
 * Created by PhpStorm.
 * User: ikosar
 * Date: 19/04/2018
 * Time: 04:32 PM
 */

namespace ikosar\LMFA;



use HTTP_Request2;
use HttpException;

class CheckFace
{
    // This Var must add to config file.


    public function getApiKey()
    {
        $this->api_key = config('lmfa.api_key');
        return $this->api_key;
    }

    public function setUrl(array $url)
    {
        $this->url = $url;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function setMethod($method = 'post')
    {
        $this->method = $method;
    }

    public function setBody($body = true, $is_simple_request = true)
    {
        $this->body = $body;
        $this->request_type = $is_simple_request;
    }

    public function check()
    {
        if (isset($this->url) AND isset($this->headers) AND isset($this->parameters) AND isset($this->method) AND isset($this->body)) {
            $this->check = true;
            return true;
        }

        $this->check = false;
        return false;
    }

    public function send()
    {
        if ($this->check) {
            if ($this->request_type == true)
            {
                $request = new Http_Request2('https://westcentralus.api.cognitive.microsoft.com/face/v1.0/detect');
            }
            else
            {
                $request = new Http_Request2($this->url);
            }
            $url = $request->getUrl();
            $headers = $this->headers;
            $request->setHeader($headers);
            $parameters = $this->parameters;
            $url->setQueryVariables($parameters);
            switch ($this->method) {
                case "post":
                    $mtd = HTTP_Request2::METHOD_POST;
                    break;
                case "get":
                    $mtd = HTTP_Request2::METHOD_GET;
                    break;
                case "delete":
                    $mtd = HTTP_Request2::METHOD_DELETE;
                    break;
                case "put":
                    $mtd = HTTP_Request2::METHOD_PUT;
                    break;
                default:
                    return "ERROR METHOD GIVEN WAS NOT VALID,ONLY LOWERCASE letter must used. ";
                    break;
            };
            $request->setMethod($mtd);
            if ($this->request_type == true) {
                $simple = json_encode($this->url);
                $request->setBody($simple);
            } else {
                $request->setBody($this->body);
            }

            try {
                $response = $request->send();
                return $response->getBody();
            } catch (HttpException $ex) {
                echo $ex;
            }

        }
            return null;
    }

}