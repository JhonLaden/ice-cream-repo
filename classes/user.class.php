<?php

require_once 'database.php';

class User{
    public $id;
    public $type;
    public $firstname;
    public $lastname;
    public $username;
    public $password;
    public $email;

    protected $db ;

    function __construct(){
        $this->db = new Database();
    }

    function show(){
        $sql = "SELECT id, type, firstname, lastname, username, password, email, DATE(created_at) as created_at, DATE(updated_at) as updated_at FROM user;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>