<?php include 'inc/header.php'; 
      include 'function/function.php';
?>
<style type="text/css">
	.table-section{margin: 0 auto;}
	h3{font-family: impact; font-size: 40px; color: white;}
	table{color:white;}
	 input[type="submit"]{width: 80px; margin-left:3px;}
	 a{height: 33px;}
	.btn-warning{color: white; font-weight: 800;}
	td{font-family: impact; font-size: 25px;}
</style>
<div class="container">
	<div class="row">
		<div class="table-section">
       <?php

          $fun_object = new allFunction();
             if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $getData  = $fun_object->insertStudentData($_POST);
          }
       ?>
		<div class="panel panle-default panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Add New Student Information</h3>
			</div>		
				
<div class="panel-body">
	<form action="" method="post">
         <?php 
         error_reporting(0);
           if($getData){
             echo $getData;
           }
         ?>
		<table>
			<tr>
				<td>Roll</td>
				<td><input type="text" name="roll" placeholder="Enter student roll"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" placeholder="Enter student name"></td>
			</tr>
                  <tr>
                        <td>Department</td>
                        <td><input type="text" name="dept" placeholder="Enter department name"></td>
                  </tr>
                    <tr>
                        <td>Session</td>
                        <td><input type="text" name="session" placeholder="Enter session year"></td>
                  </tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Submit">
				<a href="student_bio.php" class="btn btn-danger">Update</a>
                        </td>
			</tr>		

		</table>
	</form>
</div>
			
		</div>
	   </div>
	</div>
</div>
