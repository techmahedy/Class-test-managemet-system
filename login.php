<?php 
      include 'lib/Session.php';
      Session::checkLogin();include('inc/loginheader.php'); 
      include 'lib/Database.php';
      include 'helper/helper.php';

      $db = new Database();
      $validation = new sql_injection();

 ?>

<body>

    <form action="" method="post">
       <h1>Admin Login</h1>
     <?php
 
   if ($_SERVER['REQUEST_METHOD'] == "POST"){
             $username = $validation->getValidate($_POST['username']);
             $password = $validation->getValidate(md5($_POST['password']));  
             $username = mysqli_real_escape_string($db->conn,$username);
             $password = mysqli_real_escape_string($db->conn,$password);

              if(empty($username) || empty( $password))
              {
                echo "<span style='color:red; font-size:20px;'> Please fill out this field first </span>";
              }else{
                 $sql = "SELECT * FROM admin WHERE username ='$username' AND password ='$password'";
                 $result = $db->select($sql);
                 if ($result != false) {
                  
                  $value = $result->fetch_assoc();
                                    
                     Session::set("login",true);
                     Session::set("username",$value['username']);

                     header("Location:index.php");
                  }
                 
                 else{
                    echo "<span style='color:red; font-size:20px;'> Username or Password Not Matched </span>";
                }
               }
       }
?>
    
     
       <table>
           <tr>
            <td>Username</td>
            <td><input type="text" name="username" placeholder="Enter username"</td>
           </tr>
           <tr>
            <td>Password</td>
            <td><input type="password" name="password" placeholder="Enter password"</td>
           </tr>
           <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Login">
              <a href="updatepassword.php" class="btn btn-danger">Forgot password</a></td>
           </tr>
       </table>
    </form>
  
 </body>
 </html>