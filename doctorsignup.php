<?php
require("autoload.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>create account</title>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" type="text/css" href="grid.css">
</head>
<body>
<header>
<div class="wrapper">
<div class="row">
<div class="sm-col-span-2 lg-col-span-4">
<img src="images/e.jpg" alt="height:100px" style="border-radius:1050px" width="100px">
          <h1><?php echo"$config_name";?></h1>
</div>

</div>
</div>
</header>
<div class="content" role="main">
<div class="wrapper">
<div class="row">
    <?php 
    require("processdoctor.php");
    ?>
<form class="form" method="post" name="login" action="doctorsignup.php">
                 <h1 class="login-title">Create Account </h1>
               

                 <input type="name" placeholder="Enter your firstname" class="login-input" name="fname" maxlength="30" size="30" autofocus pattern="[a-zA-Z][a-zA-Z\s]*" title=
"Alphabetic and space only max of 30 characters"  
 required
value=
 "<?php if (isset($_POST['fname']))
 echo htmlspecialchars($_POST['fname'], ENT_QUOTES);
?>" >
 
                      <input type="name" placeholder="Enter your lastname" class="login-input"  name="lname" maxlength="30" size="30" required pattern="[a-zA-Z][a-zA-Z\s]*" title=
"Alphabetic and space only max of 30 characters"
value=
 "<?php if (isset($_POST['lname']))
 echo htmlspecialchars($_POST['lname'], ENT_QUOTES);
?>" >
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
<select required style="width:100% ;border-radius:5px;text-align:center">
                          <option value="">-Select Secret Question-</option>
                          <option>What is your favourite state and your age </option>
                                <option>What is Your date_of_birth and favourite city</option>
                              <option>What is Your Id number and favourite university</option>
                                

                                </select> 
<input type="name" name="secret" placeholder="Enter your secret answer" class="login-input"  title=
"Alphabetic, numeric and space only max of 30 characters"
maxlength="50" required
value=
"<?php if (isset($_POST['secret']))
echo htmlspecialchars($_POST['secret'], ENT_QUOTES);
?>"  required>

               

                <input type="submit" value="Signup" class="login-button"/><br><br>
                <input type="reset" value="Clear" class="login-button1"/>
                <br> <br>
                <p  class="sect"><a  href="index.php">Back To The Website</a></p>

             </form>



</div>
</div>
<div class="footer"><p>Designed By:<?php echo"$config_author";?></p>
          <p>&copy<?php echo"$config_copyright";?></p></div>
</div>
</body>
</html>