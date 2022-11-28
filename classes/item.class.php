<?php

require_once 'database.php';

class Item{
    public $id;
    public $name;
    public $quantity;
    public $price; 
    public $category;

    protected $db ;

    function __construct(){
        $this->db = new Database();
    }

    function add_item(){
        $sql = "INSERT INTO items (name, price, category) VALUE 
        (:name, :price, :category);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':name', $this->firstname);
        $query->bindParam(':price', $this->lastname);
        $query->bindParam(':category', $this->email);

        if($query->execute()){
            return true;
        }else{
            false;
        }
    }

    function show(){
        $sql = "SELECT * FROM items ORDER BY name;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
    function show_with_category(){
        $sql = "SELECT items.name, items.price, categories.name as category,date(items.created_at) as created_at, date(items.updated_at) as updated_at FROM items JOIN categories ON items.category = categories.id ORDER BY items.name;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
    function show_selected_name($name){
        $sql = "SELECT items.name, items.price, categories.name as category,date(items.created_at) as created_at, date(items.updated_at) as updated_at FROM items JOIN categories ON items.category = categories.id WHERE items.name = '$name' ORDER BY items.name;";
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