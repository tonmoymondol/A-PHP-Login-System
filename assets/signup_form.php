<?php

session_start();

//server information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$x_firstname = ucfirst(strtolower(trim($_POST['firstname']))); //Capitalizing the names
$x_lastname = ucfirst(strtolower(trim($_POST['lastname'])));
$x_username = trim($_POST['username']);
$x_password = $password_value =  trim($_POST['password']);
$x_password = password_hash($x_password, PASSWORD_DEFAULT); //hashing the password for security


//Check if username is taken
$check_username = "SELECT * FROM users WHERE username = '$x_username'";
$rows_found = mysqli_num_rows(mysqli_query($conn, $check_username));

if($rows_found == 1) {
    //saving values to session to retain the form values
    $_SESSION['firstname'] =  $x_firstname;
    $_SESSION['lastname'] =  $x_lastname;
    $_SESSION['username'] = $x_username ;
    $_SESSION['password'] = $password_value;
    $_SESSION['username_taken'] = "<div id='username_taken_describe' class='invalid-feedback'>Username taken.</div>";
    header('location:../signup.php');
}
else {
    $save_reg = "INSERT INTO users (firstname, lastname, username, password)
       VALUES ('$x_firstname', '$x_lastname', '$x_username', '$x_password')";
    if( mysqli_query($conn, $save_reg)) {
        $_SESSION['firstname'] =  $x_firstname;
        $_SESSION['lastname'] =  $x_lastname;
        $_SESSION['user_created'] = "<div class='alert alert-success' role='alert'>New Account Created</div>";
        header('location:../welcome.php');
    }
    else {
        $_SESSION['signup_error'] = "<div class='alert alert-danger margin-top-50' role='alert'>". "Error: " . $save_reg . "<br>" . mysqli_error($conn). "</div>";
        header('location:../signup.php');
    }
}


mysqli_close($conn);
?>