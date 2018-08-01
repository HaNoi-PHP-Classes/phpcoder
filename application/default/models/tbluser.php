<?php
class Default_Models_tblUser extends Libs_Model{
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
    public $create;
    public $modified;

    public function __construct(){
        parent::__construct();
    }

    
}