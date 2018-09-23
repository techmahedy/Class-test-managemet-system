<?php include 'inc/header.php'; ?>
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
			</div>		
      <?php
         $check = 0;
         $err = "";
         $msg = "";
         if ($_SERVER['REQUEST_METHOD'] == "POST"){

           
          $dept = $_POST['dept'];
          $session = $_POST['session'];

          $query  = "SELECT roll FROM student WHERE session='$session' AND dept='$dept'";
          $result = $db->select($query);
          error_reporting(0);
          if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();

            $temp_id = $row['roll'];
            $sql = "SELECT roll FROM city WHERE roll = '$temp_id'";
            $result = $db->select($sql);


            if ($result->num_rows > 0) {
              $check = 1;
            }
            else{
              $err="Result is not published yet"." ".$session." of ".$dept." Department";
              $check = 0;
            }
         }
         else{
              $err="Result is not published yet"." ".$session." of ".$dept." Department";
              $check = 0;
            }
      }

    ?>
    <?php

      if ($check == 0) {

        echo "<p style='text-align:center;margin-top: 50px;color:red;font-size: 25px;'>".$err."</p>";
        echo "<p style='text-align:center;margin-top: 50px;color:#27B127;font-size: 30px;'>".$msg."</p>";
        echo "<p style='margin-top: 50px;font-size: 25px;text-align: center;color: white'>Select Session & Department To Display Result</p>";
        
        echo '<form action="" method="post">
                <table>
                     </tr>
                        <td>Session</td>
                        <td><select name="session">
                          <option value="2014-15">2014-15</option>
                          <option value="2015-16">2015-16</option>
                          <option value="2015-16">2015-16</option>
                          <option value="2016-17">2016-17</option>
                          <option value="2017-18">2017-18</option>
                          <option value="2019-20">2019-20</option>
                        </select></td>
                  </tr>
                  <tr>
                        <td>Department</td>
                        <td><select name="dept">
                          <option value="cse">CSE</option>
                          <option value="ICE">ICE</option>
                          <option value="EEE">EEE</option>
                          <option value="ETE">ETE</option>
                          <option value="CIVIL">CIVIL</option>
                          <option value="ARCH">ARCH</option>
                          <option value="URP">URP</option>
                        </select></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit">               
                  </tr>      
                </table>
              </form>"';
      }
    ?>

   <?php
       if ($check == 1) {
   
         echo "<h3>Student's Result Information</h3>";
         echo "<table><tr>
                         <th style='width:10%'>ID</th>
                         <th style='width:10%'>NAME</th>";
         $query = "SELECT type,count(type) AS 'number' 
                   FROM city 
                   WHERE roll='$temp_id' 
                   GROUP BY type 
                   ORDER BY type";
         $number_ass = 0;
         $number_ct  = 0;
         $number_pre = 0;
         $result = $db->select($query);
         if ($result) {
   
           while ($row = $result->fetch_assoc()) {
             
             if($row['type'] == "ass_ment")
               $number_ass = $row['number'];
             else if($row['type'] == "ct")
               $number_ct = $row['number'];
             else
               $number_pre = $row['number'];
             }
         }
   
   
         for ($i=1; $i <= $number_ass ; $i++) { 
           echo '<th style="width:15%">ASSIGNMENT_'.$i.'</th>';
           
         }
         for ($i=1; $i <= $number_ct ; $i++) { 
           echo  '<th style="width:5%">CT_'.$i.'</th>';
           
         }
         for ($i=1; $i <= $number_pre ; $i++) { 
           echo '<th style="width:10%">PRESENTATION'.$i.'</th>';
          
         }
          echo '<th style="width:10%">BEST 2</th>
                <th style="width:10%">ATTENDANCE</th>
                <th style="width:10%">TOTAL</th>';
        
          echo '</tr>';
           
           $max = $number_ass + $number_ct + $number_pre;
   
         $sql="SELECT s.roll,s.name,c.mark,a.att_mark,c.type,c.num 
               FROM student s
               INNER JOIN city c
               ON s.roll = c.roll
               INNER JOIN attendance a
               ON c.roll = a.roll 
               WHERE s.session ='$session' AND s.dept='$dept' 
               ORDER BY s.roll,c.type";
         $marks = [];
         $attend_marks = 0;
         $result = $db->select($sql);
         if ($result){
             $i = 0;
            while ($row = $result->fetch_assoc()) {
             $marks[$i] = $row['mark'];
             $i++;
             if ($i == $max) {
   
               $temp_marks = [];
               echo '<tr><td>'.$row['roll'].'</td><td>'.$row['name'].'</td>';
               for ($j=0; $j <$max ; $j++) { 
   
                 if ($marks[$j] == 'A') {
                   echo '<td>Absent</td>';
                   $temp_marks[$j] = 0;
                 }
                 else{
                   echo '<td>'.$marks[$j].'</td>';
                   $temp_marks[$j] = $marks[$j];
                 }
               }
               rsort($temp_marks);
               
               if ($max == 1) {
                 echo '<td>'.$temp_marks[0].'</td>';
               }
               else{
                 echo '<td>'.($temp_marks[0] + $temp_marks[1]).'</td>';
               }
               
               echo '<td>'.$row['att_mark'].'</td>';
               $attend_marks=$row['att_mark'];
               if ($max == 1) {
                 echo '<td>'.$temp_marks[0] + $attend_marks.'</td>';
               }
               else{
                 echo '<td>'.($temp_marks[0] + $temp_marks[1] + $attend_marks).'</td>';
               }
               $i=0;
               for ($j=0; $j < $max; $j++) { 
                 $url = "marks[]=".$marks[$j];
               } 
             }
           }
         }
         echo '</table>';
       }
  ?> 

  
				      
	    	</div>
	   </div>
	</div>
</div>
