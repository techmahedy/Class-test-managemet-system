<?php
 include 'lib/Database.php';
 include 'lib/Session.php';
 Session::checkSession(); 
 include 'helper/helper.php';
 
 $db = new Database();
 $validation = new sql_injection();
 ?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Mahedi Hasan">
    <title>CT MARK PROJECT</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css"> 
    <style type="text/css">
      body{
        background-image: url("img/b.png");
        background-repeat: no-repeat;
        background-size: cover;
        font-family: sans-serif;
      }
      .nav-section{margin-top: 40px;}
      .search-section{margin-top: 30px;}
      ul li{
        background: transparent;
        list-style: none;
        display: inline-block;
      }
      ul li a{
        padding-right: 15px;
        font-size: 20px;
        font-family: impact;
        color: white;
      }
      ul li a:hover{ text-decoration: none;}
      input[type="text"]{
        width: 220px;
        height: 34px;
        border-bottom: 0px;
        box-shadow: 0 0 10px #eee;
        border-radius: 5px;
        margin-bottom: 10px;
        margin-top: 5px;
        font-family: impact;
        font-size: 16px;
      }
      input[type="submit"]{
        width: 80px;
        height: 32px;
        background: #0b8256;
        font-size: 20px;
        font-family: impact;
        color: #fff;
        border: 0px;
        border-radius: 3px;
        letter-spacing: 0.05em;
        margin-bottom:10px;
      }
      h1{font-family: impact; font-weight: 800; color: white;}
      h2{font-family: impact; font-weight: 500; color: white;}
    </style>
    
</head>
<body>
  <?php 
   if (isset($_GET['action']) && $_GET['action'] == 'logout') {
      Session::destroy();
      header('Location:login.php');
      exit();
   }
   ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
         <div class="nav-section">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="student.php">Add Student</a></li>
              <li><a href="student_bio.php">Student Bio</a></li>
              <li><a href="ct.php">Class Test</a></li>
              <li><a href="attendance.php">Attendace Info</a></li>
              <li><a href="ct_result.php">Result</a></li>
              <li><a href="?action=logout">Log out</a></li>
            </ul>
         </div>
       </div><!--End of col-md-8-->

        <div class="col-md-4">
           <form class="search-section" action="search.php" method="get">
             <div class="form-group">
              <input type="text" name="search" placeholder="search here....">
              <input type="submit" name="submit" value="Go!">
             </div>
           </form>
        </div>
    </div>
  </div>
   