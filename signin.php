<?php
include "assets/header.php";
session_start();
?>
    <title>Sign In</title>
    </head>
    <body>

    <div class="container-fluid p-0">
        <div class="d-flex flex-row">
            <div class="left-section align-items-center d-flex justify-content-around">
                <div class="home-left-content">
                    <h2>Login to your Account</h2>
                    <form class="margin-top-50" action="assets/signin_form.php" method="post" autocomplete="off">
                        <div class="form-group">
                            <label for="username">Username</label>

                            <input type="text" class="form-control <?php if (isset($_SESSION['username'])) {
                                echo "is-invalid";
                            } ?>" id="username" name="username" value="<?php if (isset($_SESSION['username'])) {
                                echo htmlspecialchars($_SESSION['username'], ENT_QUOTES);
                            } ?>" aria-describedby="username_validation_describe" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control <?php if (isset($_SESSION['username'])) {
                                echo "is-invalid";
                            } ?>" id="password" name="password" required>
                            <?php
                            if (isset($_SESSION['password_invalid'])) {
                                echo $_SESSION['password_invalid'];
                                $_SESSION['password_invalid'] = null;
                            }
                            ?>
                        </div>
                        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                    <?php $_SESSION['username'] = null; ?>


                </div>
            </div>
            <div class="right-section right-section-index"></div>
        </div>
    </div>

<?php include "assets/footer.php" ?>