
<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0))
{ header("Location: index.php");
 exit();
}
require("autoload.php");

?><!DOCTYPE html>
<html>
<head>
<title>contact us</title>
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
<li><a href="home.php">Home</a></li>
<li ><a href="aboutus.php">About Us</a></li>
<li ><a href="contactus.php">Contact Us</a></li>
<li ><a href="patientpassword.php">Change Password</a></li>
<li ><a href="patient.php">View Records</a></li>
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
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      //validate email
      $email=$_POST['email'];
     if (!empty($_POST['email'])) {
         $email = mysqli_real_escape_string($conn, $_POST['email']);
         } else {
         $email = FALSE;
        $errors[]=' You forgot to enter your email.';
        
         } 
          //validate mobile
          $mobile=$_POST['mobile'];
         if (!empty($_POST['mobile'])) {
             $mobile= mysqli_real_escape_string($conn, $_POST['mobile']);
             } else {
             $mobile = FALSE;
            $errors[]=' You forgot to enter your mobile number.';
            
             } 
  //validate message
  $message=$_POST['message'];
  if (!empty($_POST['message'])) {
  $message= mysqli_real_escape_string($conn, $_POST['message']);
  } else {
  $message = FALSE;
  $errors[]=' You forgot to enter your message.';
  
  } 


 
             if (empty($errors)) { // If everything's OK. 
                 $q = "INSERT INTO contactus( email,mobile_number, message,post_date)
                 VALUES ('$email', '$mobile','$message', NOW() )";
                  $result = mysqli_query ($conn, $q); // Run the query.
                  if ($result==1) { // If it runs
                    header('Refresh:5;URL=contactus.php');
                    echo"
                    <style>
                    #success{
                     margin:auto;
                     color:green
                     border-radius:5px;
                    }
                    </style>
                    <div id='success'>
                    <h1 style=margin-top:150px;color:green>Thank you $email for submitting your message Your request has been received and is being processed</h1>
                    </div>
                    
                     ";
                     exit();
                  }
                 
                 }
                 }
                 
  ?>
<h1 style="margin-top:50px;color:green;text-align:center">To Contactus Please fill in the form below OR Call Us On <?php echo$config_adminno?></h1>
<form class="form" method="post" name="login" action="contactus.php">
                 <h1 class="login-title">Contact Us </h1>
                    

                      <input type="email" placeholder="Enter your email" class="login-input" name="email"  autofocus>
                      <br>
                      <input type="text" placeholder="enter your mobile number" class="login-input" name="mobile"   value="+254"  size="15" maxlength="15" title=
"Numeric  only max of 10 characters"  required>
                      <br>
                      <textarea rows="10" cols="38" class="login-input" placeholder="Enter your message" name="message"  pattern="[a-zA-Z][a-zA-Z\s]*" title=
"Alphabetic and space only max of 30 characters" required></textarea>
         
                      <br><br>
                      <input type="submit" value="Contuct Us" class="login-button"/><br><br>
                <input type="reset" value="Clear" class="login-button1"/>
                <br> <br>
                      <br><br>
                   </form>
                   
               </div>
    </div>
</div>
</div>
</div>
<div class="footer"><p>Designed By:<?php echo"$config_author";?></p>
          <p>&copy<?php echo"$config_copyright";?></p></div>
</div>

</body>
</html>