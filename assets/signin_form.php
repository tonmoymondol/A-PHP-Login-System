<?php

session_start();

//SERVER INFORMATION
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

//Getting username and password and trimming it for security
$x_username = trim($_POST['username']);
$x_password = trim($_POST['password']);

//checking database if the user is registered
$pass_query = "SELECT * FROM users WHERE username = '$x_username'";
$pass_row = mysqli_query($conn, $pass_query);
if (mysqli_num_rows($pass_row) > 0) {
    $row = mysqli_fetch_array($pass_row);
    $pass_hash = $row['password'];
    $x_firstname = $row['firstname'];
    $x_lastname = $row['lastname'];

    //comparing passwords
    if (password_verify($x_password, $pass_hash)) {
        $_SESSION['firstname'] = $x_firstname;
        $_SESSION['lastname'] = $x_lastname;
        header('location:../welcome.php');
    } else {
        $_SESSION['username'] = $x_username;
        $_SESSION['password_invalid'] = "<div id='username_validation_describe' class='invalid-feedback'>Username/Password Invalid.</div>";
        header('location:../signin.php');
    }


}
else {
    $_SESSION['username'] = $x_username;
    $_SESSION['password_invalid'] = "<div id='username_validation_describe' class='invalid-feedback'>Username/Password Invalid.</div>";
    header('location:../signin.php');
}


mysqli_close($conn);
?>

