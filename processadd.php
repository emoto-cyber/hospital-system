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
                           
                            }  //validate gender
                            $gender=$_POST['gender'];
                           if (!empty($_POST['gender'])) {
                               $gender= mysqli_real_escape_string($conn, $_POST['gender']);
                               } else {
                               $gender = FALSE;
                              $errors[]=' You forgot to enter your gender.';
                              
                               } 
                             //validate address
                             $address=$_POST['address'];
                            if (!empty($_POST['address'])) {
                                $address= mysqli_real_escape_string($conn, $_POST['address']);
                                } else {
                                $address = FALSE;
                               $errors[]=' You forgot to enter your address.';
                               
                                } 
                                //validate mobile
                                $mobile=$_POST['mobile'];
                                if (!empty($_POST['mobile'])) {
                                    $mobile= mysqli_real_escape_string($conn, $_POST['mobile']);
                                    } else {
                                    $mobile = FALSE;
                                   $errors[]=' You forgot to enter your mobile.';
                                    } 
                                   
                                     //validate age
                                     $age=$_POST['secret'];
                                     if (!empty($_POST['secret'])) {
                                        $age = mysqli_real_escape_string($conn, $_POST['secret']);
                                        } else {
                                        $age= FALSE;
                                       $errors[]=' You forgot to enter your age.';
                                       
                                        } 
             
            if (empty($errors)) { // If everything's OK.
            
            // Make the query:
            $q = "INSERT INTO patient_details( firstname,lastname, email, age,mobile_number,gender,address, date)
            VALUES ('$firstname', '$lastname', '$email','$age', '$mobile','$gender','$address',NOW() )";
             $result = mysqli_query ($conn, $q); // Run the query.
             if ($result==1) { // If it runs
                
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
    
        <h1 style=margin-top:150px;>Thank you for adding new patient record</h1>
        <br>
        </div>";
        exit();
       

    

    }

                
            } else { // If it did not run OK.
               
                
           
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