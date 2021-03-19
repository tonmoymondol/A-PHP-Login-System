<?php include "assets/header.php" ?>
<?php

session_start();
if(!isset($_SESSION['firstname']) && !isset($_SESSION['lastname'])) {
    header('location:index.php');
}

?>
    <title>Welcome</title>
    </head>
    <body>
    <div class="container-fluid p-0">
        <div class="d-flex flex-row">
            <div class="left-section align-items-center d-flex justify-content-around">
                <div class="home-left-content">
                    <h1 style="font-weight: 200">Welcome</h1>
                    <h1 style="font-size: 80px;
                               line-height: 0.9;
                               font-weight: 400;
                               margin-bottom: 50px">
                        <?php echo $_SESSION['firstname']. " " . $_SESSION['lastname']; ?>
                    </h1>
                    <?php
                        if(isset($_SESSION['user_created'])) {
                            echo $_SESSION['user_created'];
                            $_SESSION['user_created'] = null;
                        }
                    ?>
                    <a href="assets/signout.php">Sign out</a>
                </div>
            </div>
            <div class="right-section right-section-home"></div>
        </div>
    </div>

<?php include "assets/footer.php" ?>