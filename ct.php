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
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $getData  = $fun_object->insertCtMark($_POST);
          }   
       ?>
		<div class="table-section">
		<div class="panel panle-default panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Add class Test Information</h3>
			</div>		
				
            <div class="panel-body">
            	<form action="" method="post">
            		<table>
                              <?php
                              error_reporting(0);
                              if ($getData) {
                                   echo $getData;
                              }
                              ?>
            			<tr>
            				<td>Roll</td>
            				<td><input type="text" name="roll" placeholder="Enter student roll"></td>
            			</tr>
            			<tr>
            				<td>CT/ASS_NO</td>
            				<td><input type="text" name="num" placeholder="Enter ct/ass_no"></td>
            			</tr>
                  <tr>
                        <td>MARKS</td>
                        <td><input type="text" name="mark" placeholder="Enter getting mark"></td>
                  </tr>
                  <tr>
                        <td>TYPE</td>
                        <td><select name="type">
                          <option value="ass_ment">ASSIGNMENT</option>
                          <option value="ct">CLASS TEST</option>
                          <option value="presentation">PRESENTATION</option>
                        </select></td>
                  </tr>
            			<tr>
            				<td></td>
            				<td><input type="submit" name="submit" value="Submit">
                                    <a href="ct_mark.php" class="btn btn-danger">Update</a></td>
            			</tr>		
                       
            		</table>
            	</form>
            </div>
			
		</div>
	   </div>
	</div>
</div>
