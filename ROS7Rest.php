<?php

class ROS7Rest
{

    public $secure = false;
    public $path;
    public $requestData;
    private $secrets;

    public function __construct($secrets)
    {
        $this->secrets = $secrets;
        /***[
            "username" => "",
            "password" => "",
            "url" => ""
        ];******/
    }

    //get->to get records
    function ros7GET()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->secrets["url"] . $this->path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $this->secure);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->secure);
        curl_setopt($ch, CURLOPT_USERPWD, $this->secrets["username"] . ":" . $this->secrets["password"]);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $return = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        print_r($return);
    }

    //post->universal methos to all console commands
    function ros7POST()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->secrets["url"] . $this->path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $this->secure);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->secure);
        curl_setopt($ch, CURLOPT_POST, true);
        if (isset($this->requestData)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->requestData);
        }
        curl_setopt($ch, CURLOPT_USERPWD, $this->secrets["username"] . ":" . $this->secrets["password"]);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $return = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        print_r($return);
    }

    //put->create a new record
    function ros7PUT()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->secrets["url"] . $this->path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $this->secure);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->secure);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        if (isset($this->requestData)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->requestData);
        }
        curl_setopt($ch, CURLOPT_USERPWD, $this->secrets["username"] . ":" . $this->secrets["password"]);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $return = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        print_r($return);
    }

    //delete->delete a signle record
    function ros7DELETE()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->secrets["url"] . $this->path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $this->secure);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->secure);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_USERPWD, $this->secrets["username"] . ":" . $this->secrets["password"]);

        $return = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        print_r($return);
    }

    //patch->update single record
    function ros7PATCH()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->secrets["url"] . $this->path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $this->secure);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->secure);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        if (isset($this->requestData)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->requestData);
        }
        curl_setopt($ch, CURLOPT_USERPWD, $this->secrets["username"] . ":" . $this->secrets["password"]);

        $return = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        print_r($return);
    }

    public function __destruct()
    {
    }
}
