<?php
  $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helper/helper.php');
  
 class allFunction
 { 
 	    private $db;
        private $validation;
 	
 	function __construct()
 	{
 		$this->db = new Database();
    $this->validation = new sql_injection();
 	}

 	public function insertStudentData($data){
 		$roll    = $this->validation->getValidate($data['roll']);
 		$name    = $this->validation->getValidate($data['name']);
 		$dept    = $this->validation->getValidate($data['dept']);
 		$session = $this->validation->getValidate($data['session']);

    $roll    = mysqli_real_escape_string($this->db->conn,$roll);
    $name    = mysqli_real_escape_string($this->db->conn,$name);
    $dept    = mysqli_real_escape_string($this->db->conn,$dept);
    $session = mysqli_real_escape_string($this->db->conn,$session);  
        
        if (empty($roll) || empty($name) || empty($dept) || empty($session)) {
          $text =  "<span style='color:red; font-size:30px;'>Please fill out this field first</span>";
          return $text;
        }else{
       $query = "INSERT INTO  student(roll,name,dept,session) 
                        VALUES('$roll','$name','$dept','$session')";
        $insert = $this->db->insert($query);
        $text =  "<span style='color:green; font-size:30px;'>Data Inserted Successfully done</span>";
          return $text;
        }
      
 	}
 
    public function selectstudentData(){
   	   $query = "SELECT * FROM student ORDER BY roll ASC LIMIT 5";
   	   $data = $this->db->select($query);
   	   return $data;
   }
    public function selectAllstudentData(){
       $query = "SELECT DISTINCT * FROM student ORDER BY roll ASC";
   	   $data = $this->db->select($query);
   	   return $data;
   }

   public function updateStudentDataSelection(){
   	error_reporting(0);
   	 if (!isset($_GET["updateId"]) || $_GET["updateId"] == NULL ){
          $text =  "<span style='color:green; font-size:30px;'>Data is empty</span>";
          return $text;
    }else{
         $id = $_GET["updateId"];
     }
   	 $query = "SELECT * FROM student WHERE roll = '$id'";
   	   $data = $this->db->select($query);
   	   return $data;
   }

   public function updateStudentData($data){
   	 if (!isset($_GET["updateId"]) || $_GET["updateId"] == NULL ){
         $text =  "<span style='color:green; font-size:30px;'>Data is empty</span>";
          return $text;
     }else{
         $id = $_GET["updateId"];
     }
   	$roll    = $this->validation->getValidate($data['roll']);
 		$name    = $this->validation->getValidate($data['name']);
 		$dept    = $this->validation->getValidate($data['dept']);
 		$session = $this->validation->getValidate($data['session']);

    $roll    = mysqli_real_escape_string($this->db->conn,$roll);
    $name    = mysqli_real_escape_string($this->db->conn,$name);
    $dept    = mysqli_real_escape_string($this->db->conn,$dept);
    $session = mysqli_real_escape_string($this->db->conn,$session); 

      if (empty($roll) || empty($name) || empty($dept) || empty($session)) {
          $text =  "<span style='color:red; font-size:30px;'>Please fill out this field first</span>";
          return $text;
      }else{
       $query = "UPDATE student
                 SET 
                 roll = '$roll',
                 name = '$name',
                 dept = '$dept',
                 session = '$session'
                 WHERE roll = '$id'";
                      
        $insert = $this->db->update($query);
        $text =  "<span style='color:green; font-size:30px;'>Data Updated Successfully done</span>";
          return $text;
        }  
   }
   
   public function deleteStudentData(){
   	   if (!isset($_GET["deleteId"])){
         $text =  "<span style='color:green; font-size:30px;'></span>";
          return $text;
     }else{
         $id = $_GET["deleteId"];
         $query = "DELETE FROM student WHERE roll = '$id'";
         $data  = $this->db->delete($query);
         if ($data) {
     	 $text =  "<span style='color:green; font-size:30px;'>Data Deleted Successfully done</span>";
          return $text;
        }else{
     	$text =  "<span style='color:green; font-size:30px;'>Data Not Deleted</span>";
          return $text;
       }
     }  
   }
    public function insertCtMark($data){
      $type   = $data['type'];
      $roll   = $this->validation->getValidate($data['roll']);
   		$num    = $this->validation->getValidate($data['num']);
   		$mark   = $this->validation->getValidate($data['mark']);

 	    $roll   = mysqli_real_escape_string($this->db->conn,$roll);
      $num    = mysqli_real_escape_string($this->db->conn,$num);
      $mark   = mysqli_real_escape_string($this->db->conn,$mark);
    
        
        if (empty($roll) || empty($num) || empty($mark) || empty($type)) {
          $text =  "<span style='color:red; font-size:30px;'>Please fill out this field first</span>";
          return $text;
        }else{
       $query = "INSERT INTO  city(roll,num,mark,type) 
                        VALUES('$roll','$num','$mark','$type')";
        $insert = $this->db->insert($query);
        $text =  "<span style='color:green; font-size:30px;'>Data Inserted Successfully done</span>";
          return $text;
        }
      
    }
  public function selectCtMarkData(){
       $query = "SELECT * FROM city ORDER BY roll ASC LIMIT 5";
       $data = $this->db->select($query);
       return $data;
  }
  public function selectAllCtMarkData(){
       $query = "SELECT * FROM city ORDER BY roll";
       $data = $this->db->select($query);
       return $data;
  }

    public function getSelectCtMarkData(){
        error_reporting(0);
     if (!isset($_GET["updateId"]) || $_GET["updateId"] == NULL ){
          $text =  "<span style='color:green; font-size:30px;'>Data is empty</span>";
          return $text;
    }else{
         $id = $_GET["updateId"];
         $query = "SELECT * FROM city WHERE id = '$id'";
         $data = $this->db->select($query);
         return $data;
    }
  }
  
    public function updateCtMark($data){
     $type   = $data['type'];
     if (!isset($_GET["updateId"]) || $_GET["updateId"] == NULL ){
         $text =  "<span style='color:green; font-size:30px;'>Data is empty</span>";
          return $text;
     }else{
         $id = $_GET["updateId"];
     }
      $roll    = $this->validation->getValidate($data['roll']);
      $num     = $this->validation->getValidate($data['num']);
      $mark    = $this->validation->getValidate($data['mark']);
     
      $roll    = mysqli_real_escape_string($this->db->conn,$roll);
      $num     = mysqli_real_escape_string($this->db->conn,$num);
      $mark    = mysqli_real_escape_string($this->db->conn,$mark);
     
      if (empty($roll) || empty($num) || empty($mark) || empty($type)) {
          $text =  "<span style='color:red; font-size:30px;'>Please fill out this field first</span>";
          return $text;
      }else{
       $query = "UPDATE city
                 SET 
                 roll = '$roll',
                 num = '$num',
                 mark = '$mark',
                 type = '$type'
                 WHERE id = '$id'";
                      
        $insert = $this->db->update($query);
        $text   =  "<span style='color:green; font-size:30px;'>Data Updated Successfully done</span>";
          return $text;
        }  
   }

    public function insertAttendanceMark($data){
        $roll        = $this->validation->getValidate($data['roll']);
        $semester    = $this->validation->getValidate($data['semester']);
        $mark        = $this->validation->getValidate($data['att_mark']);

        $roll        = mysqli_real_escape_string($this->db->conn,$roll);
        $semester    = mysqli_real_escape_string($this->db->conn,$semester);
        $mark        = mysqli_real_escape_string($this->db->conn,$mark);
        
        if (empty($roll) || empty($semester) || empty($mark)) {
          $text =  "<span style='color:red; font-size:30px;'>Please fill out this field first</span>";
          return $text;
        }else{
       $query   = "INSERT INTO  attendance(roll,semester,att_mark) 
                        VALUES('$roll','$semester','$mark')";
        $insert = $this->db->insert($query);
        $text   =  "<span style='color:green; font-size:30px;'>Data Inserted Successfully done</span>";
          return $text;
        }
    }
      public function searchQuery(){
      if (!isset($_GET["search"]) || $_GET["search"] == NULL ){
         $text =  "<span style='color:green; font-size:30px;'>Data is empty</span>";
          return $text;
      }else{
         $id    = $_GET["search"];
         $query = "SELECT DISTINCT * FROM city WHERE roll LIKE '%$id%'";
         $data  = $this->db->select($query);
         return $data;
     }
    }
    

















    
 }