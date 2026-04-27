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
                           
                            }  //validate drug name
                            $drug=$_POST['drug'];
                           if (!empty($_POST['drug'])) {
                               $drug= mysqli_real_escape_string($conn, $_POST['drug']);
                               } else {
                               $drug = FALSE;
                              $errors[]=' You forgot to enter drug name.';
                              
                               } 
                             //validate medicine purpose
                             $purpose=$_POST['purpose'];
                            if (!empty($_POST['purpose'])) {
                                $purpose= mysqli_real_escape_string($conn, $_POST['purpose']);
                                } else {
                                $purpose = FALSE;
                                $errors[]=' You forgot to enter medicine purpose.';
                               
                                } 
                                //validate medicine quntity
                             $num=$_POST['num'];
                             if (!empty($_POST['num'])) {
                                 $num= mysqli_real_escape_string($conn, $_POST['num']);
                                 } else {
                                 $num = FALSE;
                                 $errors[]=' You forgot to enter medicine quantity.';
                                
                                 } 
                               
                                   
                                     
             
            if (empty($errors)) { // If everything's OK.
            
            // Make the query:
            $q = "INSERT INTO medicine_details( firstname,lastname, email,drug_name,purpose,quantity, date)
            VALUES ('$firstname', '$lastname', '$email','$drug', '$purpose','$num',NOW() )";
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
    
        <h1 style=margin-top:150px;>Thank you for adding patient medicine information</h1>
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