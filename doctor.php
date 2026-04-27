
<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 5))
{ header("Location: index.php");
 exit();
}
require("autoload.php");

?><!DOCTYPE html>
<html>
<head>
<title>doctor homepage</title>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" type="text/css" href="grid.css">

</head>
<style>
    li,ul{
        padding: 10px;
    }
</style>
<body>
<header>
<div class="wrapper">
<div class="row">
<div class="sm-col-span-2 lg-col-span-4">
<img src="images/e.jpg" alt="height:100px" style="border-radius:1050px" width="100px">
          <h1><?php echo"$config_name";?></h1>
</div>
<nav class="sm-col-span-2 lg-col-span-4">
<ul>
<li><a href="doctor.php">Home</a></li>
<li><a href="viewqueue.php">View Queue</a></li>
<li ><a href="doctorpassword.php">Change Password</a></li>
<li ><a href="logout.php">Logout</a></li>
</ul>
</nav>
</div>
</div>
</header>
<div class="content" role="main">
    <div id="section">
        <style>
       
                 #hello{
                background-color:firebrick;
                color:white;
                margin:2px;
                width:230px;
                border-top:0;
                border-left:0;
                border-right:1px inset blue;
                border-radius: 3px;
                border-bottom:3px outset blue;
                font-size: larger;
            }
            fieldset{
margin: 5px;
border-top:5px outset black;
border-bottom:0;
border-right:0;
border-left:2px outset black;
background-color:azure;
border-radius: 5px;
float: left;
width: 200px;
            }
          
          #section{
overflow: scroll;          }
            </style>



<h1 style="margin-top:100px;color:green;text-align:center">Hi <?php echo$_SESSION['email']; ?>,</h1>
<h1 style="color:firebrick ; text-align:center"><?php echo"$config_pannel5";?></h1>


        
</div>
</div>
<div class="footer"><p>Designed By:<?php echo"$config_author";?></p>
          <p>&copy<?php echo"$config_copyright";?></p></div>
</div>

</body>
</html>