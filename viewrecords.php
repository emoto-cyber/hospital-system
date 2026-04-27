
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
<title>view registered patients</title>
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
      $errors = array(); // Initialize an error array.
      $success = array();
      $query ="SELECT firstname,lastname,email,registration_date from login where user_level=0";
      $result= mysqli_query ($conn, $query);
      if (mysqli_num_rows($result) ==0) {
       
        echo'<h1 style="color:red;text-align:center; margin-top:100px;">No Available patient Record(s)  found</h1>';
      }
      else{
      // Prepared statement not needed since hardcoded
      $result = mysqli_query ($conn, $query); // Run the query.
      if ($result) { // If it ran OK, display the records.
      // Table header.
      mysqli_query ($conn, $query);
        $query ="SELECT firstname,lastname,email,registration_date from login where user_level=0";

        // Prepared statement not needed since hardcoded
        $result = mysqli_query ($conn, $query); // Run the query.
        if ($result) { // If it ran OK, display the records.
        // Table header.
        mysqli_query ($conn, $query);
        echo"<h1 style='color:green;margin-top:10px;text-align:center'>These are available registered patients</h1>";
        echo '<table style="background-color:white;color:black;margin:auto">
        <tr style="  color:white; background-color:teal;
        ">
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Registered Date</th>
        </tr>';
        // Fetch and print all the records
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         // Remove special characters that might already be in table 
         // reduce the chance of XSS exploits
         $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
         $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
         $email = htmlspecialchars($row['email'], ENT_QUOTES);
         $registration_date =htmlspecialchars($row['registration_date'], ENT_QUOTES); 
         echo '<tr>
         
         <td>' . $firstname . '</td>
         <td>' . $lastname . '</td>
        <td>' . $email . '</td>
        <td>' . $registration_date . '</td>
        <td><a href=queue.php?email=' . $email .'>Add To Queue</a></td>
         </tr>';
         }
         echo '</table>';
         mysqli_free_result ($result); // Free up the resources.
        }
        echo"<hr>";
        ////////////////////////////////
        $query = "SELECT patient_id,firstname, lastname, email,date from queue";
        // Prepared statement not needed since hardcoded
        $result = mysqli_query ($conn, $query); // Run the query.
        if (mysqli_num_rows($result)>0) { // If it ran OK, display the records.
        // Table header.
        echo"<h1 style='color:green;margin-top:10px;text-align:center'>These are available patients in the queue</h1>";
        echo '<table style="background-color:white;color:black;margin:auto">
        <tr style="  color:white; background-color:teal;
        ">
        <th>Patient number</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Date</th>
        </tr>';
        // Fetch and print all the records
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         // Remove special characters that might already be in table 
         // reduce the chance of XSS exploits
         $number = htmlspecialchars($row['patient_id'], ENT_QUOTES);
         $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
         $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
         $email = htmlspecialchars($row['email'], ENT_QUOTES);
         $date =htmlspecialchars($row['date'], ENT_QUOTES); 
         echo '<tr>
         <td>' . $number. '</td>
         <td>' . $firstname . '</td>
         <td>' . $lastname . '</td>
        <td>' . $email . '</td>
        <td>' . $date . '</td>
         </tr>';
         }
         echo '</table>';
         mysqli_free_result ($result); // Free up the resources.
        }
        else{
           // Table header.
           echo"<h1 style='color:green;margin-top:10px;text-align:center'>These are available patients in the queue</h1>";
           
      
        echo'<h1 style="color:red;text-align:center">No available patient(s) record(s) found </h1>';
      echo '</table>';
      }
    }
      }
    ?>
    </div>
</div>
</div>
</div>
<div class="footer"><p>Designed By:<?php echo"$config_author";?></p>
          <p>&copy<?php echo"$config_copyright";?></p></div>
</div>

</body>
</html>