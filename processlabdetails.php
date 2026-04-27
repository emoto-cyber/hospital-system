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
                           
                            }  //validate test name
                            $test=$_POST['lab'];
                           if (!empty($_POST['lab'])) {
                               $test= mysqli_real_escape_string($conn, $_POST['lab']);
                               } else {
                               $test = FALSE;
                              $errors[]=' You forgot to enter test name.';
                              
                               } 
                             
                                 //validate results
                             $results=$_POST['results'];
                             if (!empty($_POST['results'])) {
                                 $result= mysqli_real_escape_string($conn, $_POST['results']);
                                 } else {
                                 $results = FALSE;
                                 $errors[]=' You forgot to enter patient results';
                                
                                 }
                                   
                                     
             
            if (empty($errors)) { // If everything's OK.
            
            // Make the query:
            $q = "INSERT INTO lab_details( firstname,lastname, email,test_name,results,date)
            VALUES ('$firstname', '$lastname', '$email','$test','$results',NOW() )";
             $result = mysqli_query ($conn, $q); // Run the query.
             if ($result==1) { // If it runs
                
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
    
        <h1 style=margin-top:150px;>Thank you for adding lab  information for the patient</h1>
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