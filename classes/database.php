<?php
    

    class Database{
        public $host = 'locahost';
        public $username = 'root';
        public $password = '';
        public $database = 'ice_cream';

        protected $connection ;

        function connect(){
            try {
                $this->connection = new PDO("mysql: host= $this->host;dbname=$this->database",$this->username, $this->password);
            }catch(PDOException $e){
                echo 'connection error'. $e->getMessage();
            }
            return $this->connection;
        }
    }


?>