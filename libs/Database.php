<?php

// $wpdb;

class Database{
    
    // SingleTon design pattern...
    
    public $con;
    
    public function __construct() {
        $this->con=new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
    }
    
    
    public function closeCon(){
        
    }
}

