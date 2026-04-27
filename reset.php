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
                     //validate secret
                     $secret=$_POST['secret'];
                     if (!empty($_POST['secret'])) {
                        $secret = mysqli_real_escape_string($conn, $_POST['secret']);
                        } else {
                            $secret = FALSE;
                       $errors[]=' You forgot to enter your secret.';
                       
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
                            //check if two passwords are  the same
                            if(($_POST['passwd1'])!=($_POST['passwd2'])){
                                $errors[]=' Your two password did not match.';

                            }
                           
                                    // Check that the user has entered the right email address/password combination: #2
                                    $query = "SELECT userid, secret FROM login WHERE email=? AND secret=?";
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
                                    { 
                                    // Change the password in the database...
                                    // Hash password current 60 characters but can increase
                                    $hashed_passcode = password_hash($new_password, PASSWORD_DEFAULT);
                                    // Make the query:
                                    $query = "UPDATE login SET password=? WHERE email=? ";
                                    $q = mysqli_stmt_init($conn);
                                    mysqli_stmt_prepare($q, $query);
                                    // use prepared statement to ensure that only text is inserted
                                    // bind fields to SQL Statement
                                    mysqli_stmt_bind_param($q, 'ss', $hashed_passcode, $email);
                                    // execute query
                                    mysqli_stmt_execute($q);
                                    if (mysqli_stmt_affected_rows($q) == 1) { 
                                        header('Refresh: 3; URL=index.php');
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
                                    
                                        <h1 style=margin-top:150px;>Thank you $email for resetting your password</h1>
                                       <p> You are being redirected to alupe sub-county website to login using your new password ...</p>
                                        <br>
                                        </div>";
                                        exit();
                                       
                                }
                            } else { // If it did not run OK.
                                header('Refresh:3; URL=resetpassword.php');
                                $errors[]='Please confirm your Email/secret and try again';
                           
                            mysqli_close($conn); // Close the database connection.
                         
                            }
                            } 
                        
                        
                        
                            
                        
                        ?>
                         <?php
                         if(isset($errors) && $errors!=array()){
                            $errorstring =
                            "";
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
                                    <p style='color:red;'> $errorstring
                                    </p>
                                   
                                
                              
                                   <br>
                                      </div>";  
                            
                        }
                     
                        ?>