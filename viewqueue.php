
<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 5))
{ header("Location: index.php");
 exit();
}
require("autoload.php");

?><!DOCTYPE html>
<html>
<head>
<title>view queue</title>
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
<li><a href="doctor.php">Home</a></li>
<li><a href="viewqueue.php">View Queue</a></li>
<li ><a href="doctorpassword.php">Change Password</a></li>
<li ><a href="logout.php">Logout</a></li>
</ul>
</nav>
</div>
</div>
</header>
<div class="content" role="main">
    <div id="section">
        <style>
       
                 #hello{
                background-color:firebrick;
                color:white;
                margin:2px;
                width:230px;
                border-top:0;
                border-left:0;
                border-right:1px inset blue;
                border-radius: 3px;
                border-bottom:3px outset blue;
                font-size: larger;
            }
            fieldset{
margin: 5px;
border-top:5px outset black;
border-bottom:0;
border-right:0;
border-left:2px outset black;
background-color:azure;
border-radius: 5px;
float: left;

            }
          
          #section{
overflow: scroll;          }
            </style>

<?php
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
 <td><a href=addpatient.php?email=' . $email .'>Attend</a>|</td>
 <td><a href=diseases.php?email=' . $email .'>Cases</a>|</td>
 <td><a href=medicine.php?email=' . $email .'>Medicines</a>|</td>
 <td><a href=consultation.php?email=' . $email .'>Consultation</a>|</td>
 <td><a href=dispense.php?email=' . $email .'>Dispersion</a>|</td>
 <td><a href=patientlabdetails.php?email=' . $email .'>Lab</a>|</td>
 <td><a href=billing.php?email=' . $email .'>Billing</a>|</td>
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

?>
</div>
</div>
<div class="footer"><p>Designed By:<?php echo"$config_author";?></p>
          <p>&copy<?php echo"$config_copyright";?></p></div>
</div>

</body>
</html>