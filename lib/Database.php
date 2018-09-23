<?php
    include('config/config.php');
    
  class Database
  {
    public $host     = DB_HOST;
    public $user     = DB_USER;
    public $pass     = DB_PASS;
    public $db_name  = DB_NAME;

  	public $error;
  	public $conn;
  	
  	function __construct()
  	{
  		$this->connect_database();
  	}

  	private function connect_database(){
        $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db_name);
        if (!$this->conn) {
        	$this->error =  "Connection Failed".$this->conn->connect_error;
        	return false;
        }
  	}

  	public function select($query){
  		$select = $this->conn->query($query);
  		if($select->num_rows > 0){
  			return $select;
  		}else{
  			return false;
  		}
  	}

  	public function update($query){
  		$update = $this->conn->query($query);
  		if($update){
  			return $update;
  		}else{
  			return false;
  		}
  	}

  	public function insert($query){
  		$insert = $this->conn->query($query);
  		if($insert){
  			return $insert;
  		}else{
  			return false;
  		}
  	}
    
    public function delete($query){
  		$delete = $this->conn->query($query);
  		if($delete){
  			return $delete;
  		}else{
  			return false;
  		}
  	}

  }