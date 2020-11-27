<?php

$link = mysqli_connect("localhost", "root", "", "dbdoc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


session_start();

    if (isset($_REQUEST['email'])) {
        
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($link, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($link, $password);
       
        $query    = "INSERT into users ( email,password ) VALUES ( '$email','" . md5($password) . "' )";
        $result   = mysqli_query($link, $query);
        if ($result) {
            echo "<div ><h3>You are registered successfully.</h3><br/><p>Click here to <a href='login.html'>Login</a></p></div>";
        } else {
            echo "<div ><h3>Required fields are missing.</h3><br/><p >Click here to <a href='registration.html'>register</a> again.</p></div>";
        }
    } else {}
	
mysqli_close($link);
?>