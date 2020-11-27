<?php

$link = mysqli_connect("localhost", "root", "", "dbdoc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone = mysqli_real_escape_string($link, $_REQUEST['pnum']);
$specialisation = mysqli_real_escape_string($link, $_REQUEST['spl']);
$experience = mysqli_real_escape_string($link, $_REQUEST['exp']);


 
// Attempt insert query execution
$sql = "INSERT INTO doctors (Name, email,phone,specialisation,experience) VALUES ('$name', '$email','$phone','$specialisation','$experience')";
if(mysqli_query($link, $sql)){
    echo "Thank you.We will contact you soon.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>