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
                             //validate password
                             $password1=$_POST['passwd1'];
                            if (!empty($_POST['passwd1'])) {
                                $password1= mysqli_real_escape_string($conn, $_POST['passwd1']);
                                } else {
                                $password1 = FALSE;
                               $errors[]=' You forgot to enter your password.';
                               
                                } 
                                //validate confirm password
                                $password2=$_POST['passwd2'];
                                if (!empty($_POST['passwd2'])) {
                                    $password2= mysqli_real_escape_string($conn, $_POST['passwd2']);
                                    } else {
                                    $password2 = FALSE;
                                   $errors[]=' You forgot to enter your password again.';
                                    } 
                                    //check if two passwords are  the same
                                    if(($_POST['passwd1'])!=($_POST['passwd2'])){
                                        $errors[]=' Your two password did not match.';
        
                                    }
                                     //validate secret
                                     $secret=$_POST['secret'];
                                     if (!empty($_POST['secret'])) {
                                        $secret = mysqli_real_escape_string($conn, $_POST['secret']);
                                        } else {
                                        $secret = FALSE;
                                       $errors[]=' You forgot to enter your secret.';
                                       
                                        } 
                                        $query =
                "SELECT userid,email,password,secret FROM login WHERE email= ?";
                $q = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($q, $query);
                // bind $id to SQL Statement
                mysqli_stmt_bind_param($q, "s", $email);
                // execute query
                mysqli_stmt_execute($q);
                $result = mysqli_stmt_get_result($q);
                if (mysqli_num_rows($result) > 0) {
            $errors[]='The email already exists please choose another email';
        }
            if (empty($errors)) { // If everything's OK.
            // Register the user in the database...
            // Hash password current 60 characters but can increase
            $hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);
            // Make the query:
            $q = "INSERT INTO login( firstname,lastname, email, secret,password, registration_date,user_level)
            VALUES ('$firstname', '$lastname', '$email','$secret', '$hashed_passcode',NOW(),'4' )";
             $result = mysqli_query ($conn, $q); // Run the query.
             if ($result==1) { // If it runs
                session_start();
                $_SESSION['firstname']=$firstname;
                $_SESSION['lastname']=$lastname;
                $_SESSION['email'] = $email;
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
    
        <h1 style=margin-top:150px;>Thank you $email for creating you new account</h1>
        <p> You are being redirected to alupe sub-county hospital website to login ...</p>
        <br>
        </div>";
        exit();
       

    

    }

                
            } else { // If it did not run OK.
                header('Refresh:3; URL=accountantsignup.php');
                
           
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