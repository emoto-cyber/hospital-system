<?php
require("autoload.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>alupe sub-county website hospital</title>
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
    <div id="wall">
<?php
$errors = array(); // Initialize an error array.
$success = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
                 //validate email
                 $email=$_POST['email'];
                if (!empty($_POST['email'])) {
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    } else {
                    $email = FALSE;
                   $errors[]=' You forgot to enter your email.';
                   
                    } 
                     //validate password
                     $password=$_POST['passwd1'];
                    if (!empty($_POST['passwd1'])) {
                        $password= mysqli_real_escape_string($conn, $_POST['passwd1']);
                        } else {
                        $password = FALSE;
                       $errors[]=' You forgot to enter your password.';
                       
                        } 
                        if (empty($errors)) { // If everything's OK. #1
                            // Retrieve the user_id, psword, first_name and user_level for that
// email/password combination
 $query =
 "SELECT userid, password, email, user_level FROM login WHERE email=?";
 $q = mysqli_stmt_init($conn);
 mysqli_stmt_prepare($q, $query);
 // bind $id to SQL Statement
 mysqli_stmt_bind_param($q, 's', $email);
 // execute query
 mysqli_stmt_execute($q);
 $result = mysqli_stmt_get_result($q);
 $row = mysqli_fetch_array($result, MYSQLI_NUM);
 if (mysqli_num_rows($result) == 1) {
 //if one database row (record) matches the input:-
 // Start the session, fetch the record and insert the
 // values in an array
 if (password_verify($password, $row[1])) { //#2
 session_start();
 // Ensure that the user level is an integer.
 $_SESSION['user_level'] = (int) $row[3];
 $_SESSION['email'] = $email;
 $_SESSION['loggedin']=true;
 // Use a ternary operation to set the URL #3
    if($_SESSION['user_level'] === 6){
        header('Refresh: 3; URL=adminstrator.php');
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
    
        <h1 style=margin-top:150px;>Thank you $email for logging into the system as adminstrator</h1>
       <p> You are being redirected to adminstrator_dashboard ...</p>
        <br>
        </div>";
        exit();
       
    }
    elseif($_SESSION['user_level'] === 5){
        header('Refresh: 3; URL=doctor.php');
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
    
        <h1 style=margin-top:150px;>Thank you $email for logging into the system as a doctor</h1>
       <p> You are being redirected to doctor_dashboard ...</p>
        <br>
        </div>";
        exit();
       
    }
    elseif($_SESSION['user_level'] === 4){
        header('Refresh: 3; URL=accountant.php');
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
    
        <h1 style=margin-top:150px;>Thank you $email for logging into the system as an accountant</h1>
       <p> You are being redirected to accountant_dashboard ...</p>
        <br>
        </div>";
        exit();
       
    }
    elseif($_SESSION['user_level'] === 3){
        header('Refresh: 3; URL=phamacy.php');
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
    
        <h1 style=margin-top:150px;>Thank you $email for logging into the system as a phamacist</h1>
       <p> You are being redirected to phamacy_dashboard ...</p>
        <br>
        </div>";
        exit();
       
    }
    elseif($_SESSION['user_level'] === 2){
        header('Refresh: 3; URL=labtech.php');
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
    
        <h1 style=margin-top:150px;>Thank you $email for logging into the system as a lab technician</h1>
       <p> You are being redirected to labtechnician_dashboard ...</p>
        <br>
        </div>";
        exit();
       
    }
    elseif($_SESSION['user_level'] === 1){
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
    
        <h1 style=margin-top:150px;>Thank you $email for logging into the system as a reception</h1>
       <p> You are being redirected to reception_dashboard ...</p>
        <br>
        </div>";
        exit();
       
    }
    elseif($_SESSION['user_level'] === 0){
        header('Refresh: 3; URL=home.php');
        echo"
        <style>
#success{
    background-color:white;
    color:green;
    border-radius:10px;
    margin:auto;
    text-align:center;
}
        </style>
        <div id='success'>
        
        <h1 style=margin-top:150px;>Thank you $email for logging into the system as a patient</h1>
       <p> You are being redirected to patient_dashboard ...</p>
        
        </div>";
        exit();
        }
       
}

 
 else{
    header('Refresh: 3; URL=index.php');
    echo' 
    <style>
    #error{
        background-color:white;
        color:red;
        border-radius:10px;
        margin:auto;
        text-align:center;
        
    }
            </style>
<div id="error">
  
<p style=red;margin-top:150px;>Please confirm your login credentials and try again</p><br>
    </div>';
    exit();
 }
}
else {
    header('Refresh: 3; URL=index.php');
    echo'
    <style>
    #error{
        background-color:white;
        color:red;
        border-radius:10px;
        margin:auto;
        text-align:center;
    }
            </style>
<div id="error">
    
    <p style=red;margin-top:150px;>The acccount you are trying to access does not exist in our database please contact the system adminstator OR click on Create Account Link To Signup.</p></div> <br>';
    
    exit();
 }
                        }
                    }
        ?>
         <?php
         if(isset($errors) && $errors!=array()){
            $errorstring =
            "<h1 style='color:white;background-color:red;'>The following error(s) occurred:</h1>";
            foreach ($errors as $msg) { // Print each error.
           
            $errorstring .= "$msg<br>\n";
            }

            echo " <style>
            #error{
              background-color:white;
              color:red;
              margin:auto;
              font-weight:bolder;
              text-align:center;
             
          }
        
        }
         
          
                    </style>
                    <div id='error'>
                    <p style='color:blue;'> $errorstring
                    </p>
                   
                
              
                   <br>
                      </div>";  
            
        }
     
        ?>
<form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="email" placeholder="Enter your email"class="login-input"  maxlength="60"
required name="email" 
 value=
 "<?php if (isset($_POST['email']))
 echo htmlspecialchars($_POST['email'], ENT_QUOTES);
?>" >
                      <input type="password" class="login-input"  placeholder="Enter your password again" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}*"
title="One number, one upper, one lower, one special,
 with 8 to 12 characters"
  minlength="8" maxlength="12" required name="passwd1"
value="<?php if (isset($_POST['passwd1']))
 echo htmlspecialchars($_POST['passwd1'], ENT_QUOTES); ?>" >
        <input type="submit" value="Login" name="submit" class="login-button"/><br><br>
        <input type="reset" value="Clear" name="Clear" class="login-button1"/><br><br>
        <p  class="sect"><a  href="signup.php">Create Account</a></p>
        <p class="sect"><a href="resetpassword.php">Forgot Password</a></p>
  </form>
  <br><br>

    </div>
</div>
</div>
<div class="footer"><p>Designed By:<?php echo"$config_author";?></p>
          <p>&copy<?php echo"$config_copyright";?></p></div>
</div>
</body>
</html>