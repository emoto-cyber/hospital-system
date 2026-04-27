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
                     $new_password=$_POST['passwd1'];
                    if (!empty($_POST['passwd1'])) {
                        $new_password= mysqli_real_escape_string($conn, $_POST['passwd1']);
                        } else {
                        $new_password= FALSE;
                       $errors[]=' You forgot to enter your password.';
                       
                        } 
                        //validate confirm password
                        $verify_password =$_POST['passwd2'];
                        if (!empty($_POST['passwd2'])) {
                            $verify_password= mysqli_real_escape_string($conn, $_POST['passwd2']);
                            } else {
                                $verify_password = FALSE;
                           $errors[]=' You forgot to enter your password again.';
                            } 
                                if (($new_password != $verify_password))
                                {
                               $errors[] = 'Your new password did not match with the confirmed new password ';
                                }
                             //validate secret
                             $secret=$_POST['secret'];
                             if (!empty($_POST['secret'])) {
                                $secret = mysqli_real_escape_string($conn, $_POST['secret']);
                                } else {
                                    $secret = FALSE;
                               $errors[]=' You forgot to enter your secret.';
                               
                                } 
                                if($_SESSION['email']==$email){
                                }
                                else{
                                    
                                    $errors[]='Please login into the system as an authorized user and change your password';
                                }
                                    // Check that the user has entered the right email address/password combination: #2
                                    $query = "SELECT userid, secret,password FROM login WHERE email=? AND secret=? ";
                                   $q = mysqli_stmt_init($conn);
                                   mysqli_stmt_prepare($q, $query);
                                    // use prepared statement to ensure that only text is inserted
                                    // bind fields to SQL Statement
                                   mysqli_stmt_bind_param($q, 'ss', $email,$secret);
                                    // execute query
                                    mysqli_stmt_execute($q);
                                   $result = mysqli_stmt_get_result($q);
                                   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                   if ((mysqli_num_rows($result) == 1))
                                    { // Found one record
                                    // Change the password in the database...
                                    // Hash password current 60 characters but can increase
                                    $hashed_passcode = password_hash($new_password, PASSWORD_DEFAULT);
                                    // Make the query:
                                    $query = "UPDATE login SET password=? WHERE email=? AND secret=?";
                                    $q = mysqli_stmt_init($conn);
                                    mysqli_stmt_prepare($q, $query);
                                    // use prepared statement to ensure that only text is inserted
                                    // bind fields to SQL Statement
                                    mysqli_stmt_bind_param($q, 'sss', $hashed_passcode, $email,$secret);
                                    // execute query
                                    mysqli_stmt_execute($q);
                                    if (mysqli_stmt_affected_rows($q) == 1) { // one row updated #4
                                    // Thank you
                                    header('Refresh: 5; URL=index.php');
        echo"
        <style>
#success{
    background-color:white;
    color:green;
    border-radius:10px;
    height: 200px;
    margin:150px auto;
    text-align:center;
        </style>
        <div id='success'>
        <h1>Thank you $email for changing your password</h1><hr>
       <p> You are being redirected to a login page to login using your new password...</p>
        
        </div>";
        }
       
                                   
                                    } 
                                    else{
                                        header('Refresh: 2; URL=receptionpassword.php');

                                        $errors[]='Please confirm your email/secret and try again';
                                    }
                               }
                                   
                            
?>
       <?php
         if(isset($errors) && $errors!=array()){
            $errorstring ="";
            foreach ($errors as $msg) { // Print each error.
           
            $errorstring .= "$msg<br>\n";
            }

            echo " <style>
            #error{
              background-color:white;
              color:red;
              margin:auto;
              width: 450px;
              font-weight:bolder;
              text-align:center;
             
          }
        
        }
         
          
                    </style>
                    <div id='error'>
                    <p style='color:red;'> $errorstring
                    </p>
                   
                
              
                   <br>
                      </div>
            
            
            
            
            ";  
            
        }
     
        ?>