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
     
		<div class="table-section">     
		<div class="panel panle-default panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Student's Result Information</h3>
			</div>		
		 <?php
        if (!isset($_GET["search"]) || $_GET["search"] == NULL ){
            echo "<span style='color:green; font-size:30px;'>Please first enter something to search data....</span>";
            }else{
             $id = $_GET["search"]; 
            }
       ?>
               
            <table class="table table-striped">
                  <tr>
                     <th width="20%">ID</th>
                     <th width="20%">ROLL</th>
                     <th width="20%">NUMBER</th>
                     <th width="20%">MARKS</th>
                     <th width="20%">TYPE</th>
                     <th width="20%">ACTION</th>       
                  </tr>     

        <?php    
              error_reporting(0); 
              $fun_object = new allFunction();
              $getData  = $fun_object->searchQuery();
              if ($getData){
                while($result = $getData->fetch_assoc()){
          ?>
      
           
        
                  <tr>
                     <td><?php echo $result['id'];?></td>
                     <td><?php echo $result['roll'];?></td>
                     <td><?php echo $result['num'];?></td>
                     <td><?php echo $result['mark'];?></td>
                     <td><?php echo $result['type'];?></td>
                     <td><a href="update_ct_mark.php?updateId=<?php echo $result['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to change this data?');">Change</a></td>
                  </tr>
                 
              <?php } } else { ?> 
               <p style="color:white; font-size: 25px;">Your search data not matched</p>
               <?php } ?>
            </table>   
    
    
         
	    	</div>
	   </div>
	</div>
</div>
