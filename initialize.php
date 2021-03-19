<?php
include "assets/header.php";

//server information
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 margin-top-50 text-center">
            <?php
            // Create database
            $sql = "CREATE DATABASE mydb";
            if (mysqli_query($conn, $sql)) {
                echo "
    <div class='alert alert-success' role='alert'>
        Database created successfully
    </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "Error creating database: " . $conn->error;
                echo "</div>";
            }

            //Create Table
            $table = "CREATE TABLE mydb.users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(50) NOT NULL,
lastname VARCHAR(50) NOT NULL,
username VARCHAR(50) NOT NULL,
password VARCHAR(100) NOT NULL
)";

            if ($conn->query($table) === TRUE) {
                echo "
    <div class='alert alert-success' role='alert'>
        Table created successfully
    </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "Error creating table: " . $conn->error;
                echo "</div>";

            }
            ?>

            <a href="index.php" class="btn btn-primary align-self-center">Go to website</a>
        </div>
    </div>
</div>


<?php

mysqli_close($conn);

include "assets/footer.php";
?>

