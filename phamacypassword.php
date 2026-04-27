
<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 3))
{ header("Location: index.php");
 exit();
}
require("autoload.php");

?><!DOCTYPE html>
<html>
<head>
<title>change password</title>
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
<li><a href="phamacy.php">Home</a></li>
<li ><a href="phamacypassword.php">Change Password</a></li>
<li ><a href="recomendation.php">Disperse Medicine</a></li>
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
    <?php require("processphamacy.php");?>
    <form class="form" method="post" name="login" action="phamacypassword.php">
                 <h1 class="login-title">Change Password </h1>
               

           
<input type="email" placeholder="Enter your email"class="login-input"  maxlength="60"
required name="email" 
 value=
 "<?php if (isset($_POST['email']))
 echo htmlspecialchars($_POST['email'], ENT_QUOTES);
?>" >
                <input type="password" placeholder="Enter your new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
title="One number, one upper, one lower, one special,
with 8 to 12 characters"
minlength="8" maxlength="12" required name="passwd1" 
class="login-input" >

                
                <input type="password" placeholder="Enter your new password again" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
title="One number, one upper, one lower, one special,
with 8 to 12 characters"
minlength="8" maxlength="12" required name="passwd2" class="login-input">

<input type="name" name="secret" placeholder="Enter your secret answer" class="login-input"  title=
"Alphabetic, numeric and space only max of 30 characters"
maxlength="50" required
value=
"<?php if (isset($_POST['secret']))
echo htmlspecialchars($_POST['secret'], ENT_QUOTES);
?>"  required>

               

                <input type="submit" value="Change Password" class="login-button"/><br><br>
                <input type="reset" value="Clear" class="login-button1"/>
                <br> <br>

             </form>
    </div>
</div>
</div>
</div>
<div class="footer"><p>Designed By:<?php echo"$config_author";?></p>
          <p>&copy<?php echo"$config_copyright";?></p></div>
</div>

</body>
</html>