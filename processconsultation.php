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
                           
                            }  //validate diagonosis
                            $diag=$_POST['diag'];
                           if (!empty($_POST['diag'])) {
                               $diag= mysqli_real_escape_string($conn, $_POST['diag']);
                               } else {
                               $diag = FALSE;
                              $errors[]=' You forgot to enter disease name.';
                              
                               } 
                             //validate treatment
                             $treat=$_POST['treat'];
                            if (!empty($_POST['treat'])) {
                                $treat= mysqli_real_escape_string($conn, $_POST['treat']);
                                } else {
                                $treat = FALSE;
                                $errors[]=' You forgot to enter treatment.';
                               
                                } 
                             //validate blood pressure
                             $blood=$_POST['blood'];
                             if (!empty($_POST['blood'])) {
                                 $blood= mysqli_real_escape_string($conn, $_POST['blood']);
                                 } else {
                                 $blood = FALSE;
                                $errors[]=' You forgot to enter blood pressure.';
                                
                                 } 
                               //validate weight
                               $weight=$_POST['weight'];
                              if (!empty($_POST['weight'])) {
                                  $weight= mysqli_real_escape_string($conn, $_POST['weight']);
                                  } else {
                                  $weight = FALSE;
                                  $errors[]=' You forgot to enter weight.';
                                 
                                  } 
                                   //validate doctor name
                               $doctor=$_POST['doctor'];
                               if (!empty($_POST['doctor'])) {
                                   $doctor= mysqli_real_escape_string($conn, $_POST['doctor']);
                                   } else {
                                   $doctor = FALSE;
                                   $errors[]=' You forgot to enter doctor name.';
                                  
                                   } 
                                     
             
            if (empty($errors)) { // If everything's OK.
            
            // Make the query:
            $q = "INSERT INTO consultation_details( firstname,lastname, email,diagnostic,treatment,blood_pressure,weight,doctor_name,date)
            VALUES ('$firstname', '$lastname', '$email','$diag', '$treat','$blood', '$weight','$doctor',NOW() )";
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
    
        <h1 style=margin-top:150px;>Thank you for adding patient consultation information</h1>
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