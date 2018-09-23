<?php include 'inc/loginheader.php'; ?>
<style type="text/css">
input[type="text"],input[type="password"]{
        width: 250px;
      }
  input[type="submit"]{
        width: 170px;
        cursor: pointer;
      }
</style>
<body>

    <form action="" method="post">
      <h1>Update Password</h1>
       <table>
           <tr>
            <td>Old password</td>
            <td><input type="text" name="password" placeholder="Enter old password"</td>
           </tr>
           <tr>
            <td>New password</td>
            <td><input type="password" name="new_password" placeholder="Enter new password"</td>
           </tr>
           <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Update password">
              <a href="login.php" class="btn btn-danger">Login</a></td>
           </tr>
       </table>
    </form>
  
 </body>
 </html>