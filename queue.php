
<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
{ header("Location: index.php");
 exit();
}
require("autoload.php");

?><!DOCTYPE html>
<html>
<head>
<title>patient queue</title>
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
<li><a href="reception.php">Home</a></li>
<li ><a href="receptionpassword.php">Change Password</a></li>
<li ><a href="viewrecords.php">View Records</a></li>
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
    // Check for a valid user ID, through GET or POST: #1
    if ( (isset($_GET['email'])) && (is_string($_GET['email'])) ) {
    // From viewstudents.php
     $email = htmlspecialchars($_GET['email'], ENT_QUOTES);
    } elseif ( (isset($_POST['email'])) && (is_string($_POST['email'])) ) {
     // Form submission.
     $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
     } else { // No valid ID, kill the script.
     // return to index page
     
     }
      // This script retrieves all the records from the login table.
          // Make the query:
          // Nothing passed from user safe query
          $query = "SELECT email,firstname,lastname FROM login WHERE email='$email'";
          // Prepared statement not needed since hardcoded
          $result = mysqli_query ($conn, $query); // Run the query.
      if ($result) {
        mysqli_query ($conn, $query);
          // Fetch and print all the records
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           // Remove special characters that might already be in table 
           // reduce the chance of XSS exploits
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname= htmlspecialchars($row['lastname'], ENT_QUOTES);
  
           
           }
           mysqli_free_result ($result); // Free up the resources.
          }
          
    
    
     
?>
<?php
        $errors = array(); // Initialize an error array.
        $success = array();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //validate firstname
                $firstname=$_POST['fname'];
                if (!empty($_POST['fname'])) {
                    $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
                    } else {
                    $firstname = FALSE;
                   $errors[]=' You forgot to enter your first name.';
                   
                    }  
                     //validate lastname
                     $lastname=$_POST['lname'];
                    if (!empty($_POST['lname'])) {
                        $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
                        } else {
                        $lastname = FALSE;
                       $errors[]=' You forgot to enter your last name.';
                       
                        } 
                         //validate email
                         $email=$_POST['email'];
                        if (!empty($_POST['email'])) {
                            $email = mysqli_real_escape_string($conn, $_POST['email']);
                            } else {
                            $email = FALSE;
                           $errors[]=' You forgot to enter your email.';
                           
                            } 
                             
            
            // Make the query:
            $q = "INSERT INTO queue( firstname,lastname, email, date)
            VALUES ('$firstname', '$lastname', '$email',NOW() )";
             $result = mysqli_query ($conn, $q); // Run the query.
             if ($result==1) { // If it runs
                
                header('Refresh: 3; URL=reception.php');
        echo"
        <style>
#success{
    background-color:white;
    border-radius:10px;
    margin:auto;
    color:green;
    text-align:center;
}
        </style>
        <div id='success'>
    
        <h1 style=margin-top:150px;>Thank you for adding a patient to the patient queue</h1>
        <br>
        </div>";
        exit();
       

    

    }

                
            } else { // If it did not run OK.
                
           
            mysqli_close($conn); // Close the database connection.
         
            }
            
        
        
        
            
        
        ?>
<form class="form" method="post" name="login" action="queue.php">
                 <h1 class="login-title">Add Patient To The Queue </h1>
               

                 <input type="name" placeholder="Enter your firstname" class="login-input" name="fname" maxlength="30" size="30" autofocus title=
"Alphabetic and space only max of 30 characters"  
 required
 value=
 "<?php echo$firstname?>" >
 
                      <input type="name" placeholder="Enter your lastname" class="login-input"  name="lname" maxlength="30" size="30" required  title=
"Alphabetic and space only max of 30 characters"
value=
 "<?php echo$lastname?>" >
<input type="email" placeholder="Enter your email"class="login-input" name="email" maxlength="60"
required name="email" 
 value=
 "<?php echo$email?>" >
              

               

                <input type="submit" value="ADD" class="login-button"/><br><br>
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