<?php include 'inc/header.php'; 
      include 'function/function.php';
   ?>
<style type="text/css">
      .table-section{margin: 0 auto;}
      h3{font-family: impact; font-size: 40px; color: white;}
      table{color:white;}
</style>

<div class="container">
      <div class="row">

 <?php 
    $fun_object = new allFunction();
     $getData  = $fun_object->selectCtMarkData();   
   ?>
            <div class="table-section">
            <div class="panel panle-default panel-danger">
                  <div class="panel-heading">
                        <h3 class="panel-title">Students Information</h3>
                  </div>            
                        
            <div class="panel-body">
       
                  <form accept="" method="post">
                        <table class="table table-striped">
                              <tr>
                                 <th width="20%">ROLL</th>
                                 <th width="20%">NUMBER</th>
                                 <th width="20%">MARK</th>
                                 <th width="20%">TYPE</th>
                                 <th width="20%">CHANGE</th>       
                              </tr>

                    <?php 

                     if($getData){
                        while($result = $getData->fetch_assoc()){
                       
                     ?>
                              <tr>
                   
                                 <td><?php echo $result['roll'];?></td>
                                 <td><?php echo $result['num'];?></td>
                                 <td><?php echo $result['mark'];?></td>
                                 <td><?php echo $result['type'];?></td>
                                 <td><a href="update_ct_mark.php?updateId=<?php echo $result['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to change this data?');">Change</a></td>

                              </tr>
                             
                          <?php } } ?> 
                              <tr>
                                 <td><a href="allctmark.php" class="btn btn-danger">See All Data</a></td>
                                 <td><a href="ct.php" class="btn btn-danger">Add Class Test Mark</a></td>
                              </tr>
                        </table>   
                  </form>
            </div>
                  
            </div>
         </div>
      </div>
</div>
