<?php
    
    $link = mysqli_connect("localhost", "root", "", "dbdoc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


session_start();
    
    if (isset($_POST['email'])) {
       $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($link, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($link, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM reg_doctors WHERE email='$email' AND password='" . md5($password) . "'";
        $result = mysqli_query($link, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['email'] = $email;
            // Redirect to user dashboard page
            header("Location: docdisplay.html");
        } else {
            echo "<div class='form'><h3>Incorrect email/password.</h3><br/><p class='link'>Click here to <a href='login.html'>Login</a> again.</p></div>";
        }
    } else {}
		
mysqli_close($link);
?>