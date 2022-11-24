<?php

require_once 'database.php';

class Category{
    private $id;
    private $name;
    private $icon;
    private $quantity;
    private $color;

    protected $db ;

    function __construct(){
        $this->db = new Database();
    }

    function test(){
        $sql = "SELECT * FROM categories; ";
        $query =  $this->db->connect()->prepare($sql);
        print_r($query->execute());
    }


    function show(){
        $sql = "SELECT * FROM categories;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>