<?php

require_once('connect.php'); //connection script  
 session_start();  
$empUser = $_POST['user'];
$pass = $_POST['password'];

//all fields must be entered and check if form was submitted
if (isset($_POST['submit']) && !empty($empUser) && !empty($pass)) {

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
}

if (!$dbc) {

    echo "Could not connect to database"; //connection to database failed		
} else {
    
    $query = "select auth.id, pass from auth where auth.id = '$empUser' AND " .
            " pass= '$pass'";

    $data = mysqli_query($dbc, $query) or die('couldnt query database');
}

//successful login
if (mysqli_num_rows($data) == 1) {
    
   
    
    $_SESSION['userID'] = $empUser;//use session to store login
    $redirect = 'home.php';   
    header("Location: $redirect"); //redirect to employee functions page
    exit;
}

//unsuccessful login
else {
    echo "<h2>You are not authorized. Plese verify username and/or password.</h2></div>";
}
?>