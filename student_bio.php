<?php include 'inc/header.php'; 
      include 'function/function.php';
   ?>
<style type="text/css">
      .table-section{margin: 0 auto;}
      h3{font-family: impact; font-size: 40px; color: white;}
      table{color:white;}
</style>
<?php 
      $fun_object = new allFunction(); 
      $getDeleteData  = $fun_object->deleteStudentData();
?>
<div class="container">
      <div class="row">
        <?php   
            $getData  = $fun_object->selectstudentData();
         ?>
            <div class="table-section">
            <div class="panel panle-default panel-danger">
                  <div class="panel-heading">
                        <h3 class="panel-title">Students Information</h3>
                  </div>            
                        
            <div class="panel-body">
       
                  <form accept="" method="post">
                        <table class="table table-striped">
                            <?php 
                           if ($getDeleteData) {
                             echo $getDeleteData;
                           }
                           ?>
                              <tr>
                                 <th width="20%">ROLL</th>
                                 <th width="15%">NAME</th>
                                 <th width="15%">DEPARTMENT</th>
                                 <th width="20%">SESSION</th> 
                                 <th width="15%">CHANGE</th>
                                 <th width="15%">REMOVE</th>              
                              </tr>

                 <?php 
                     if($getData){
                        while($result = $getData->fetch_assoc()){
                       
                     ?>
                              <tr>
                   
                                 <td><?php echo $result['roll'];?></td>
                                 <td><?php echo $result['name'];?></td>
                                 <td><?php echo $result['dept'];?></td>
                                 <td><?php echo $result['session'];?></td>
                                 <td><a href="updatestudent.php?updateId=<?php echo $result['roll'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to change this data?');">Change</a></td>
                                 <td><a href="student_bio.php?deleteId=<?php echo $result['roll'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?');">Delete</a></td>
                              </tr>
                             
                          <?php } } ?> 
                              <tr>
                                 <td><a href="seeallstudent.php" class="btn btn-danger">See all student</a></td>
                              </tr>
                        </table>   
                  </form>
            </div>
                  
            </div>
         </div>
      </div>
</div>
