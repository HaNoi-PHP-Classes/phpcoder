<?php
class Default_Models_tblCustomer extends Libs_Model{
    //object properties
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $contact_number;
    public $address;
    public $password;
    public $access_level;
    public $access_code;
    public $status;
    public $created;
    public $modified;

    public function __construct(){
        parent::__construct();
    }

    public function checkEmail(){

    }

}
