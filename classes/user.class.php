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

    function add_user(){
        $sql = "INSERT INTO user (firstname, lastname, username, password, type, email) VALUE 
        (:firstname, :lastname, :username, :password, :type, :email);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':email', $this->email);

        if($query->execute()){
            return true;
        }else{
            false;
        }
    }

    function get_user_count(){
        $sql = "SELECT COUNT(id) as user_count FROM user WHERE isDelete = false;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function get_latest_user(){
        $sql = "SELECT DATE(MAX(updated_at)) as latest_update FROM user WHERE isDelete = false;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }


    function edit_user($id){
        $sql = "UPDATE user SET firstname = :firstname, lastname = :lastname, username = :username, password = :username, type = :type, email = :email WHERE id = '$id';";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':email', $this->email);

        if($query->execute()){
            return true;
        }else{
            false;
        }
    }

    function delete($id){
        $sql = "UPDATE user SET isDelete = true WHERE id = '$id';";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function search_by_name($name){
        $sql = "SELECT id, type, firstname, lastname, username, password, email, DATE(created_at) as created_at, DATE(updated_at) as updated_at FROM user 
        WHERE firstname = '$name' AND isDelete = false;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function search_by_id($id){
        $sql = "SELECT id, type, firstname, lastname, username, password, email, DATE(created_at) as created_at, DATE(updated_at) as updated_at FROM user 
        WHERE id = '$id' AND isDelete = false;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function show(){
        $sql = "SELECT id, type, firstname, lastname, username, password, email, DATE(created_at) as created_at, DATE(updated_at) as updated_at FROM user 
        WHERE isDelete = false;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>