<?php

require_once 'database.php';

class Item{
    private $id;
    private $name;
    private $quantity;
    private $price; 
    private $category;

    protected $db ;

    function __construct(){
        $this->db = new Database();
    }

    function show(){
        $sql = "SELECT * FROM items;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
    function selectId($id){
        $sql = "SELECT * FROM items WHERE $id = category;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function selectCategoryColor($id){
        $sql = "SELECT name FROM categories WHERE id = $id;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function selectCategoryName($id){
        $sql = "SELECT name FROM categories WHERE id = $id;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }
}

?>