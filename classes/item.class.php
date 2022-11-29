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
        $query->bindParam(':name', $this->name);
        $query->bindParam(':price', $this->price);
        $query->bindParam(':category', $this->category);

        if($query->execute()){
            return true;
        }else{
            false;
        }
    }

    function edit_item($id){
        $sql = "UPDATE items SET name = :name, price = :price, category = :category WHERE id = '$id' AND isDeleted = 'false';";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':name', $this->name);
        $query->bindParam(':price', $this->price);
        $query->bindParam(':category', $this->category);

        if($query->execute()){
            return true;
        }else{
            false;
        }
    }

    function delete_item($id){
        $sql = "UPDATE items SET isDeleted = true WHERE id = '$id';";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            return true;
        }
        return false;
    }

    function get_item_count(){
        $sql = "SELECT COUNT(id) as user_count FROM items WHERE isDeleted = false;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function get_latest_item(){
        $sql = "SELECT DATE(MAX(updated_at)) as latest_update FROM items WHERE isDeleted = false;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }


    function show(){
        $sql = "SELECT * FROM items WHERE isDeleted = false ORDER BY name ; ";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
    function show_with_category(){
        $sql = "SELECT items.id, items.name, items.price, categories.name as category,date(items.created_at) as created_at, date(items.updated_at) as updated_at FROM items JOIN categories ON items.category = categories.id WHERE ITEMS.isDeleted = false ORDER BY items.name ;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
    function show_selected_name($name){
        $sql = "SELECT items.id, items.name, items.price, categories.name as category,date(items.created_at) as created_at, date(items.updated_at) as updated_at FROM items JOIN categories ON items.category = categories.id WHERE items.name = '$name' AND  isDeleted = false ORDER BY items.name;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
    function selectId($id){
        $sql = "SELECT * FROM items WHERE $id = category AND  isDeleted = false;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
    function select_by_id($id){
        $sql = "SELECT * FROM items WHERE items.id = '$id' AND  isDeleted = false;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
    

    function selectCategoryColor($id){
        $sql = "SELECT name FROM categories WHERE id = $id AND  isDeleted = false;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function selectCategoryName($id){
        $sql = "SELECT name FROM categories WHERE id = $id ;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }
}

?>