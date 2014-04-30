<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utils
 *
 * @author JUrbano
 */
class Utils {
    //put your code here
    private $token = '445d3780bd11a2274de96b7065962581';
    private $domainname = 'http://localhost/moodle';
    private $functionname = array("add_user"=>'core_user_create_users',
                                                     "get_user_bid"=>'core_user_get_users_by_id',
                                                     "get_user_bfd"=>'core_user_get_users_by_field');
    private $serverurl;
    private $client;
    private $params;
    private $auxparams;
    /**
     * Datos usuario
     */
    private $user;
    private $username;
    private $password;
    private $firstname;
    private $lastname;
    private $email;
    private $auth = 'manual';
    private $idnumber;
    private $lang = 'es';
    private $theme = 'standard';
    private $timezone;
    private $mailformat = 0;
    private $description;
    private $city;
    private $country = 'VE';
    
    public function __construct($p=NULL) {
        /// SOAP CALL
        $this->serverurl = $this->domainname . '/webservice/soap/server.php'. '?wsdl=1&wstoken=' . $this->token;
        $this->user = new stdClass();
        $this->auxparams = array();
        if (!is_null($p)){
            $this->user->city = $p['city'];
            $this->user->lang = $p['lang'];
            $this->user->email = $p['email'];
            $this->user->theme = $p['theme'];
            $this->user->country = $p['country'];
            $this->user->timezone = $p['timezone'];
            $this->user->lastname = $p['lastname'];
            $this->user->firstname = $p['firstname'];
            $this->user->password = $p['password'];
            $this->user->username = $p['username'];
            $this->user->mailformat = $p['mailformat'];
            $this->user->description = $p['description'];
        }
        $this->client = new SoapClient($this->serverurl);
    }
    public function __destruct() {}
    
    public function setDataUser($p=NULL){
        if (!is_null($p)){
            $this->user->city = $p['city'];
            $this->user->lang = $p['lang'];
            $this->user->email = $p['email'];
            $this->user->theme = $p['theme'];
            $this->user->country = $p['country'];
            $this->user->timezone = $p['timezone'];
            $this->user->lastname = $p['lastname'];
            $this->user->firstname = $p['firstname'];
            $this->user->password = $p['password'];
            $this->user->username = $p['username'];
            $this->user->mailformat = $p['mailformat'];
            $this->user->description = $p['description'];
            /* Agregar usuario como parametro */
            array_push($this->auxparams, $this->user);
        }
    }
    
    public function prepareParamUser(){
        $this->params = array($this->auxparams);
    }
    
    public function setParamByF($p=NULL){
        if (!is_null($p)){
            $this->auxparams = array();
            switch ($p['funcion']) {
                case 'get_user_bid': 
                    array_push($this->auxparams, $p['id']);
                    $this->params = array($this->auxparams); 
                    break;
                case 'get_user_bfd': $this->params = array("field"=>"username","values"=>array($p['username'])); break;
                default:break;
            }
        }
    }
    
    public function funcionCall($p=NULL){
        $response = FALSE;
        if (!is_null($p)){
            try {
                $response = $this->client->__soapCall($this->functionname[$p], $this->params);
            } catch (Exception $e) { print_r($e); }
            if (isset($response)) 
                return $response;
        }
        return $response;
    }
    
    
}

?>
