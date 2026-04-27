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
                           
                            }  //validate medicine
                            $medicine=$_POST['med'];
                           if (!empty($_POST['med'])) {
                               $medicine= mysqli_real_escape_string($conn, $_POST['med']);
                               } else {
                               $medicine = FALSE;
                              $errors[]=' You forgot to enter medicine.';
                              
                               } 
                             //validate quantity
                             $quantity=$_POST['quan'];
                            if (!empty($_POST['quan'])) {
                                $quantity= mysqli_real_escape_string($conn, $_POST['quan']);
                                } else {
                                $quantity = FALSE;
                                $errors[]=' You forgot to enter medicine quantity.';
                               
                                } 
                                //validate amount
                             $amount=$_POST['mt'];
                             if (!empty($_POST['mt'])) {
                                 $amount= mysqli_real_escape_string($conn, $_POST['mt']);
                                 } else {
                                 $amount = FALSE;
                                 $errors[]=' You forgot to enter medicine amount.';
                                
                                 } 
                                 //validate status
                             $status=$_POST['status'];
                             if (!empty($_POST['status'])) {
                                 $status= mysqli_real_escape_string($conn, $_POST['status']);
                                 } else {
                                 $status = FALSE;
                                 $errors[]=' You forgot to enter medicine status';
                                
                                 }
                                 $total=$quantity*$amount;
                                   
                                     
             
            if (empty($errors)) { // If everything's OK.
            
            // Make the query:
            $q = "INSERT INTO medicine_dispersion( firstname,lastname, email,medicine,quantity,amount,total,status, date)
            VALUES ('$firstname', '$lastname', '$email','$medicine', '$quantity','$amount','$total', '$status',NOW() )";
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
    
        <h1 style=margin-top:150px;>Thank you for adding  medicine dispersion information</h1>
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