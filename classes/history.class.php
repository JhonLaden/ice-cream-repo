<?php

require_once 'database.php';

class History{
    public $id;
    public $itemQuantity;
    public $grandTotal;

    protected $db ;

    function __construct(){
        $this->db = new Database();
    }

    function add_history(){
        $sql = "INSERT INTO purchased_history (item_quantity, grand_total) VALUE 
        (:item_quantity, :grand_total);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':item_quantity', $this->itemQuantity);
        $query->bindParam(':grand_total', $this->grandTotal);

        if($query->execute()){
            return true;
        }else{
            false;
        }
    }


    function show(){
        $sql = "SELECT * FROM purchased_history ORDER BY updated_at ASC;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>