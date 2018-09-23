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
 <?php 
      $fun_object = new allFunction();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $getInsertData  = $fun_object->insertAttendanceMark($_POST);
          }
    ?>
		<div class="table-section">
		<div class="panel panle-default panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Student Attendance Information</h3>
			</div>		
				
            <div class="panel-body">
            	<form action="" method="post">
            		<table>
                      <?php
                             error_reporting(0);
                              if ($getInsertData) {
                                   echo $getInsertData;
                              }
                        ?>
            			<tr>
            				<td>Roll</td>
            				<td><input type="text" name="roll" placeholder="Enter student roll"></td>
            			</tr>
            			<tr>
            				<td>Semester</td>
            				<td><input type="text" name="semester" placeholder="Enter semester number"></td>
            			</tr>
                  <tr>
                        <td>Attendance Mark</td>
                        <td><input type="text" name="att_mark" placeholder="Enter attendance mark"></td>
                  </tr>
            			<tr>
            				<td></td>
            				<td><input type="submit" name="submit" value="Submit">
                    <a href="update_att_mark.php" class="btn btn-danger">Update</a></td>
            			</tr>		

            		</table>
            	</form>
            </div>
			
		</div>
	   </div>
	</div>
</div>
