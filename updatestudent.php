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
        <?php

          $fun_object = new allFunction();
            $getData  = $fun_object->updateStudentDataSelection();
       ?>
      <div class="row">
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
              $getUpdateData  = $fun_object->updateStudentData($_POST);
            }
        ?>
            <div class="table-section">
            <div class="panel panle-default panel-danger">
                  <div class="panel-heading">
                        <h3 class="panel-title">Update Student Information</h3>
                  </div>            
                        
            <div class="panel-body">
                  <form accept="" method="post">
                        <table>
                  <?php 
                   error_reporting(0);
                  if ($getUpdateData){
                    echo $getUpdateData;
                  }
                      
                  ?>
                          <?php
                          error_reporting(0);
                            if ($getData){   
                              while($result = $getData->fetch_assoc()){
                          ?>
                              <tr>
                                    <td>Roll</td>
                                    <td><input type="text" name="roll" value="<?php  echo $result['roll']; ?>"></td>
                              </tr>
                              <tr>
                                    <td>Name</td>
                                    <td><input type="text" name="name" value="<?php  echo $result['name']; ?>"></td>
                              </tr>
                              <tr>
                                    <td>Department</td>
                                    <td><input type="text" name="dept" value="<?php  echo $result['dept']; ?>"></td>
                              </tr>
                                <tr>
                                    <td>Session</td>
                                    <td><input type="text" name="session" value="<?php  echo $result['session']; ?>"></td>
                              </tr>
                              <tr>
                                    <td></td>
                                    <td><input type="submit" name="submit" value="Update">
                                    <a href="student.php" class="btn btn-danger">Back</a></td>
                              </tr>       
                      <?php } } ?>
                        </table>
                  </form>
            </div>
                  
            </div>
         </div>
      </div>
</div>
