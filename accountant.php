
<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 4))
{ header("Location: index.php");
 exit();
}
require("autoload.php");

?><!DOCTYPE html>
<html>
<head>
<title>accountant homepage</title>
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
<li><a href="accountant.php">Home</a></li>
<li ><a href="accountantpassword.php">Change Password</a></li>
<li ><a href="viewbills.php">View Patient Billing Information</a></li>
<li ><a href="logout.php">Logout</a></li>
</ul>
</nav>
</div>
</div>
</header>
<div class="content" role="main">
<div class="wrapper">
<div class="row">
    <div id="section">
<h1 style="margin-top:150px;color:green;text-align:center">Hi <?php echo$_SESSION['email']; ?>,</h1>
<h1 style="color:firebrick ; text-align:center"><?php echo"$config_pannel4";?></h1>
    </div>
</div>
</div>
</div>
<div class="footer"><p>Designed By:<?php echo"$config_author";?></p>
          <p>&copy<?php echo"$config_copyright";?></p></div>
</div>

</body>
</html>