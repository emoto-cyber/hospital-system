
<?php
session_start();
$email=$_SESSION['email'];
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0))
{ header("Location: index.php");
 exit();
}
require("autoload.php");

?><!DOCTYPE html>
<html>
<head>
<title>patient records</title>
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
<style id="table_style" type="text/css">
    body
    {
        font-family: Arial;
        font-size: 10pt;
    }
    
    table{
background-color:white;color:black;margin:auto;}
tr{
  color:white; background-color:teal;

}
td{
  background-color:white;
  color:black;
}
</style>
<script type="text/javascript">
    function PrintTable() {
        var printWindow = window.open('', '', 'height=200,width=400');
        printWindow.document.write('<html><head><title>Report</title>');
 
        //Print the Table CSS.
        var table_style = document.getElementById("table_style").innerHTML;
        printWindow.document.write('<style type = "text/css">');
        printWindow.document.write(table_style);
        printWindow.document.write('</style>');
        printWindow.document.write('</head>');
 
        //Print the DIV contents i.e. the HTML Table.
        printWindow.document.write('<body>');
        var divContents = document.getElementById("dvContents").innerHTML;
        printWindow.document.write(divContents);
        printWindow.document.write('</body>');
 
        printWindow.document.write('</html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
<div class="wrapper">
<div class="row">
<div class="sm-col-span-2 lg-col-span-4">
<img src="images/e.jpg" alt="height:100px" style="border-radius:1050px" width="100px">
          <h1><?php echo"$config_name";?></h1>
</div>
<nav class="sm-col-span-2 lg-col-span-4">
<ul>
<li><a href="home.php">Home</a></li>
<li ><a href="aboutus.php">About Us</a></li>
<li ><a href="contactus.php">Contact Us</a></li>
<li ><a href="patientpassword.php">Change Password</a></li>
<li ><a href="patient.php">View Records</a></li>
<li ><a href="logout.php">Logout</a></li>
</ul>
</nav>
</div>
</div>
</header>
<div class="content" role="main">
<div class="wrapper">
<div class="row">
    <div id="section"><br>
    <input type="button" style="background-color:firebrick;border:0;" value="Print Report" onClick="PrintTable();">

<div style="border:1px solid black;" id="dvContents">
    <?php
 $query = "SELECT test_id,firstname, lastname, email,test_name,results,date from lab_details where email='$_SESSION[email]'";
 $result= mysqli_query ($conn, $query);
     if (mysqli_num_rows($result)==0) {
        echo"<h1 style='color:green;margin-top:10px;text-align:center'>Lab Details</h1>";
        echo'<h1 style="color:red;text-align:center">No Lab Detail(s)  found</h1>';

        // Fetch and print all the records
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         // Remove special characters that might already be in table 
   // reduce the chance of XSS exploits
         $number = htmlspecialchars($row['test_id'], ENT_QUOTES);
         $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
         $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
         $email = htmlspecialchars($row['email'], ENT_QUOTES);
         $lab = htmlspecialchars($row['test_name'], ENT_QUOTES);
         $test = htmlspecialchars($row['results'], ENT_QUOTES);
         $date =htmlspecialchars($row['date'], ENT_QUOTES); 
        }
         mysqli_free_result ($result); // Free up the resources.
        }

else{      
 $result = mysqli_query ($conn, $query); // Run the query.
 if($result){ // If it ran OK, display the records.
 // Table header.
 mysqli_query ($conn, $query);
 echo"<h1 style='color:green;margin-top:10px;text-align:center'>Lab Details</h1>";
 echo '<table style="background-color:white;color:black;margin:auto">
 <tr style="  color:white; background-color:teal;
 ">
 <th>Test ID</th>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Email</th>
 <th>Test Name</th>
 <th>Test Results</th>
 <th>Processed Date</th>
 </tr>';
 // Fetch and print all the records
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  // Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['test_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $lab = htmlspecialchars($row['test_name'], ENT_QUOTES);
  $test = htmlspecialchars($row['results'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
  echo '<tr>
  <td>' . $number. '</td>
  <td>' . $firstname . '</td>
  <td>' . $lastname . '</td>
  <td>' . $email . '</td>
  <td>' . $lab . '</td>
  <td>' . $test. '</td>
 <td>' . $date . '</td>
  </tr>';
  }
  echo '</table>';
  mysqli_free_result ($result); // Free up the resources.
 }
}
?>
<hr>
<?php
 $query = "SELECT consultation_id,firstname, lastname, email,diagnostic,treatment,blood_pressure,weight,doctor_name,date from consultation_details where email='$_SESSION[email]'";
 $result= mysqli_query ($conn, $query);
     if (mysqli_num_rows($result) ==0) {
        echo"<h1 style='color:green;margin-top:10px;text-align:center'>Consultation Details</h1>";
        echo'<h1 style="color:red;text-align:center">No Consultation Detail(s)  found</h1>';

        // Fetch and print all the records
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


             // Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['consultation_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $diag = htmlspecialchars($row['diagnostic'], ENT_QUOTES);
  $treat = htmlspecialchars($row['treatment'], ENT_QUOTES);
  $pressure = htmlspecialchars($row['blood_pressure'], ENT_QUOTES);
  $weight = htmlspecialchars($row['weight'], ENT_QUOTES);
  $doctor = htmlspecialchars($row['doctor_name'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
 
  }
  mysqli_free_result ($result); // Free up the resources.
 }
 else{
 $result = mysqli_query ($conn, $query); // Run the query.
 if (mysqli_num_rows($result)>0) { // If it ran OK, display the records.
 // Table header.
 echo"<h1 style='color:green;margin-top:10px;text-align:center'>Consultation Details</h1>";
 echo '<table style="background-color:white;color:black;margin:auto">
 <tr style="  color:white; background-color:teal;
 ">
 <th>Consultation ID</th>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Email</th>
 <th>Diagnostic</th>
 <th>Treatment</th>
 <th>Blood Pressure</th>
 <th>Weight</th>
 <th>Doctor Name</th>
 <th>Consultation Date</th>
 </tr>';
 // Fetch and print all the records
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  // Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['consultation_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $diag = htmlspecialchars($row['diagnostic'], ENT_QUOTES);
  $treat = htmlspecialchars($row['treatment'], ENT_QUOTES);
  $pressure = htmlspecialchars($row['blood_pressure'], ENT_QUOTES);
  $weight = htmlspecialchars($row['weight'], ENT_QUOTES);
  $doctor = htmlspecialchars($row['doctor_name'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
  echo '<tr>
  <td>' . $number. '</td>
  <td>' . $firstname . '</td>
  <td>' . $lastname . '</td>
  <td>' . $email . '</td>
  <td>' . $diag . '</td>
  <td>' . $treat. '</td>
  <td>' . $pressure. '</td>
  <td>' . $weight . '</td>
  <td>' . $doctor . '</td>
 <td>' . $date . '</td>
  </tr>';
  }
  echo '</table>';
  mysqli_free_result ($result); // Free up the resources.
 }
 
}

?>
<hr>
 
<?php
 
 $query = "SELECT disease_id,firstname, lastname, email,disease_name,disease_information,date from disease_details where email='$_SESSION[email]'";
 $result= mysqli_query ($conn, $query);
 if (mysqli_num_rows($result) ==0) {
    echo"<h1 style='color:green;margin-top:10px;text-align:center'> Disease Details</h1>";
    echo'<h1 style="color:red;text-align:center">No Disease Detail(s)  found</h1>';

    // Fetch and print all the records
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
// Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['disease_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $disease = htmlspecialchars($row['disease_name'], ENT_QUOTES);
  $desc = htmlspecialchars($row['disease_information'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
    }
    mysqli_free_result ($result); // Free up the resources.
}

else{
 

 $result = mysqli_query ($conn, $query); // Run the query.
 if (mysqli_num_rows($result)>0) { // If it ran OK, display the records.
 // Table header.
 echo"<h1 style='color:green;margin-top:10px;text-align:center'>Disease Details</h1>";
 echo '<table  style="background-color:white;color:black;margin:auto">
 <tr style="  color:white; background-color:teal;
 ">
 <th>Disease ID</th>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Email</th>
 <th>Disease Name</th>
 <th>Disease Description</th>
 <th>Processed Date</th>
 </tr>';
 // Fetch and print all the records
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  // Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['disease_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $disease = htmlspecialchars($row['disease_name'], ENT_QUOTES);
  $desc = htmlspecialchars($row['disease_information'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
  echo '<tr>
  <td>' . $number. '</td>
  <td>' . $firstname . '</td>
  <td>' . $lastname . '</td>
  <td>' . $email . '</td>
  <td>' . $disease . '</td>
  <td>' . $desc. '</td>
 <td>' . $date . '</td>
  </tr>';
  }
  echo '</table>';
  mysqli_free_result ($result); // Free up the resources.
 }
}
?>
<hr>
<?php
 $query = "SELECT dispersion_id,firstname, lastname, email,medicine,payment_method,amount,status,date from dispersion_details where email='$_SESSION[email]'";
 $result= mysqli_query ($conn, $query);
 if (mysqli_num_rows($result) ==0) {
    echo"<h1 style='color:green;margin-top:10px;text-align:center'>Medicine Dispersion Details</h1>";
    echo'<h1 style="color:red;text-align:center">No Medicine Dispersion Detail(s)  found</h1>';

    // Fetch and print all the records
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
// Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['disease_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $disease = htmlspecialchars($row['disease_name'], ENT_QUOTES);
  $desc = htmlspecialchars($row['disease_information'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
    }
    mysqli_free_result ($result); // Free up the resources.
}

else{
 $result = mysqli_query ($conn, $query); // Run the query.
 if (mysqli_num_rows($result)>0) { // If it ran OK, display the records.
 // Table header.
 echo"<h1 style='color:green;margin-top:10px;text-align:center'>Medicine Dispersion Details</h1>";
 echo '<table style="background-color:white;color:black;margin:auto">
 <tr style="  color:white; background-color:teal;
 ">
 <th>Dispension ID</th>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Email</th>
 <th>Medicine</th>
 <th>Payment Method</th>
 <th>Amount</th>
 <th>Status</th>
 <th>Date Given</th>
 </tr>';
 // Fetch and print all the records
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  // Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['dispersion_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $med = htmlspecialchars($row['medicine'], ENT_QUOTES);
  $ema = htmlspecialchars($row['payment_method'], ENT_QUOTES);
  $mt = htmlspecialchars($row['amount'], ENT_QUOTES);
  $status = htmlspecialchars($row['status'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
  echo '<tr>
  <td>' . $number. '</td>
  <td>' . $firstname . '</td>
  <td>' . $lastname . '</td>
 <td>' . $email . '</td>
 <td>' . $med . '</td>
 <td>' . $ema . '</td>
 <td>' . $mt . '</td>
 <td>' . $status . '</td>
 <td>' . $date . '</td>
 

  </tr>';
  }
  echo '</table>';
  mysqli_free_result ($result); // Free up the resources.
 }
}

?>
<hr>

<?php
 $query = "SELECT bill_id,firstname, lastname, email,medicine,amount,date from medicine_bills WHERE email='$_SESSION[email]'";
 $result= mysqli_query ($conn, $query);
 if (mysqli_num_rows($result) ==0) {
    echo"<h1 style='color:green;margin-top:10px;text-align:center'>Medicine Bill Details</h1>";
    echo'<h1 style="color:red;text-align:center">No Medicine Bill Detail(s)  found</h1>';

    // Fetch and print all the records
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
// Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['disease_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $disease = htmlspecialchars($row['disease_name'], ENT_QUOTES);
  $desc = htmlspecialchars($row['disease_information'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
    }
    mysqli_free_result ($result); // Free up the resources.
}

else{
 $result = mysqli_query ($conn, $query); // Run the query.
 if (mysqli_num_rows($result)>0) { // If it ran OK, display the records.
 // Table header.
 echo"<h1 style='color:green;margin-top:10px;text-align:center'>Medicine Bill Details</h1>";
 echo '<table style="background-color:white;color:black;margin:auto">
 <tr style="  color:white; background-color:teal;
 ">
 <th>Bill ID</th>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Email</th>
 <th>Medicine</th>
 <th>Amount</th>
 <th>Processed Date</th>
 </tr>';
 // Fetch and print all the records
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  // Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['bill_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $med1 = htmlspecialchars($row['medicine'], ENT_QUOTES);
  $mt1= htmlspecialchars($row['amount'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
  echo '<tr>
  <td>' . $number. '</td>
  <td>' . $firstname . '</td>
  <td>' . $lastname . '</td>
  <td>' . $email . '</td>
  <td>' . $med1 . '</td>
  <td>' . $mt1. '</td>
 <td>' . $date . '</td>
 
  </tr>';
  }
  echo '</table>';
  mysqli_free_result ($result); // Free up the resources.
 }

}
?>
<hr>
<?php
 $query = "SELECT medicine_id,firstname, lastname, email,drug_name,purpose,quantity,date from medicine_details WHERE email='$_SESSION[email]'";
 $result= mysqli_query ($conn, $query);
 if (mysqli_num_rows($result) ==0) {
    echo"<h1 style='color:green;margin-top:10px;text-align:center'>Medicine Details</h1>";
    echo'<h1 style="color:red;text-align:center">No Medicine Detail(s)  found</h1>';

    // Fetch and print all the records
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
// Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['medicine_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $drug = htmlspecialchars($row['drug_name'], ENT_QUOTES);
  $purpose= htmlspecialchars($row['purpose'], ENT_QUOTES);
  $qt= htmlspecialchars($row['quantity'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
    }
    mysqli_free_result ($result); // Free up the resources.
}

else{
 $result = mysqli_query ($conn, $query); // Run the query.
 if (mysqli_num_rows($result)>0) { // If it ran OK, display the records.
 // Table header.
 echo"<h1 style='color:green;margin-top:10px;text-align:center'>Medicine Details</h1>";
 echo '<table style="background-color:white;color:black;margin:auto">
 <tr style="  color:white; background-color:teal;
 ">
 <th>Medicine ID</th>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Email</th>
 <th>Drug Name</th>
 <th>Purpose</th>
 <th>Quantity</th>
 <th>Processed Date</th>
 </tr>';
 // Fetch and print all the records
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  // Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['medicine_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $drug = htmlspecialchars($row['drug_name'], ENT_QUOTES);
  $purpose= htmlspecialchars($row['purpose'], ENT_QUOTES);
  $qt= htmlspecialchars($row['quantity'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
  echo '<tr>
  <td>' . $number. '</td>
  <td>' . $firstname . '</td>
  <td>' . $lastname . '</td>
  <td>' . $email . '</td>
  <td>' . $drug . '</td>
  <td>' . $purpose. '</td>
  <td>' . $qt. '</td>
 <td>' . $date . '</td>

  </tr>';
  }
  echo '</table>';
  mysqli_free_result ($result); // Free up the resources.
 }
}
?>
<hr>
<?php
 $query = "SELECT service_id,firstname, lastname, email,age,mobile_number,gender,address,date from patient_details where email='$_SESSION[email]'";
 $result= mysqli_query ($conn, $query);
 if (mysqli_num_rows($result) ==0) {
    echo"<h1 style='color:green;margin-top:10px;text-align:center'>Details</h1>";
    echo'<h1 style="color:red;text-align:center">No Detail(s)  found</h1>';

    // Fetch and print all the records
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
// Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['service_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $age = htmlspecialchars($row['age'], ENT_QUOTES);
  $mnumber= htmlspecialchars($row['mobile_number'], ENT_QUOTES);
  $gender= htmlspecialchars($row['gender'], ENT_QUOTES);
  $address= htmlspecialchars($row['address'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
    }
    mysqli_free_result ($result); // Free up the resources.
}

else{
 $result = mysqli_query ($conn, $query); // Run the query.
 if (mysqli_num_rows($result)>0) { // If it ran OK, display the records.
 // Table header.
 echo"<h1 style='color:green;margin-top:10px;text-align:center'>Details</h1>";
 echo '<table style="background-color:white;color:black;margin:auto">
 <tr style="  color:white; background-color:teal;
 ">
 <th>Service ID</th>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Email</th>
 <th>Age</th>
 <th>Mobile Number</th>
 <th>Gender</th>
 <th>Address</th>
 <th>Processed Date</th>
 </tr>';
 // Fetch and print all the records
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  // Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['service_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $age = htmlspecialchars($row['age'], ENT_QUOTES);
  $mnumber= htmlspecialchars($row['mobile_number'], ENT_QUOTES);
  $gender= htmlspecialchars($row['gender'], ENT_QUOTES);
  $address= htmlspecialchars($row['address'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
  echo '<tr>
  <td>' . $number. '</td>
  <td>' . $firstname . '</td>
  <td>' . $lastname . '</td>
  <td>' . $email . '</td>
  <td>' . $age . '</td>
  <td>' . $mnumber. '</td>
  <td>' . $gender. '</td>
  <td>' . $address. '</td>
 <td>' . $date . '</td>
 
  </tr>';
  }
  echo '</table>';
  mysqli_free_result ($result); // Free up the resources.
 }
 
}
?>
<hr>
<?php
 $query = "SELECT payment_id,firstname, lastname, email,medicine,payment_method,amount,date from payment_details where email='$_SESSION[email]'";
 $result= mysqli_query ($conn, $query);
 if (mysqli_num_rows($result) ==0) {
    echo"<h1 style='color:green;margin-top:10px;text-align:center'>Payment Details</h1>";
    echo'<h1 style="color:red;text-align:center">No Payment Detail(s)  found</h1>';

    // Fetch and print all the records
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
// Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['payment_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $med3 = htmlspecialchars($row['medicine'], ENT_QUOTES);
  $metd= htmlspecialchars($row['payment_method'], ENT_QUOTES);
  $mt3= htmlspecialchars($row['amount'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
    }
    mysqli_free_result ($result); // Free up the resources.
}

else{
 $result = mysqli_query ($conn, $query); // Run the query.
 if (mysqli_num_rows($result)>0) { // If it ran OK, display the records.
 // Table header.
 echo"<h1 style='color:green;margin-top:10px;text-align:center'>Payment Details</h1>";
 echo '<table style="background-color:white;color:black;margin:auto">
 <tr style="  color:white; background-color:teal;
 ">
 <th>Payment ID</th>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Email</th>
 <th>Medicine</th>
 <th>Payment Method</th>
 <th>Amount</th>
 <th>Payment Date</th>
 </tr>';
 // Fetch and print all the records
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  // Remove special characters that might already be in table 
  // reduce the chance of XSS exploits
  $number = htmlspecialchars($row['payment_id'], ENT_QUOTES);
  $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES);
  $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES);
  $email = htmlspecialchars($row['email'], ENT_QUOTES);
  $med3 = htmlspecialchars($row['medicine'], ENT_QUOTES);
  $metd= htmlspecialchars($row['payment_method'], ENT_QUOTES);
  $mt3= htmlspecialchars($row['amount'], ENT_QUOTES);
  $date =htmlspecialchars($row['date'], ENT_QUOTES); 
  echo '<tr>
  <td>' . $number. '</td>
  <td>' . $firstname . '</td>
  <td>' . $lastname . '</td>
  <td>' . $email . '</td>
  <td>' . $med3 . '</td>
  <td>' . $metd. '</td>
  <td>' . $mt3. '</td>
 <td>' . $date . '</td>
  </tr>';
  }
  echo '</table>';
  mysqli_free_result ($result); // Free up the resources.
 }
}

?>

</div>
    </div>
</div>
</div>
</div>
<div class="footer"><p>Designed By:<?php echo"$config_author";?></p>
          <p>&copy<?php echo"$config_copyright";?></p></div>
</div>

</body>
</html>