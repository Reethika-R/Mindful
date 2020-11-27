<?php

$link = mysqli_connect("localhost", "root", "", "dbdoc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['firstname']);
$loc = mysqli_real_escape_string($link, $_REQUEST['loc']);
$subject = mysqli_real_escape_string($link, $_REQUEST['subject']);


 
// Attempt insert query execution
$sql = "INSERT INTO feedback (Name, Location,Subject) VALUES ('$name', '$loc','$subject')";
if(mysqli_query($link, $sql)){
    echo "Thank you.We received your response.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>