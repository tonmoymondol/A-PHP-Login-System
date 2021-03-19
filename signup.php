<?php
include "assets/header.php" ;

session_start();
?>
    <title>Sign up</title>

    </head>
    <body>

    <div class="container-fluid p-0">
        <div class="d-flex flex-row">
            <div class="left-section align-items-center d-flex justify-content-around">
                <div class="home-left-content">
                    <h2>Create New Account</h2>
                    <form class="margin-top-50" action="assets/signup_form.php" method="post" autocomplete="off">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php if (isset($_SESSION['firstname'])){ echo $_SESSION['firstname']; }  ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php if (isset($_SESSION['lastname'])){ echo $_SESSION['lastname']; }  ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control <?php if (isset($_SESSION['username'])) { echo "is-invalid";} ?>" id="username" name="username" value="<?php if (isset($_SESSION['username'])){ echo $_SESSION['username']; }  ?>"  aria-describedby="username_taken_describe" required>
                            <?php
                            //This is appear if the username is taken

                            if(isset($_SESSION['username_taken'])) {
                                echo $_SESSION['username_taken'];
                                $_SESSION['username_taken'] = null;
                            }
                            $_SESSION['username']=null; //clearing the values
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($_SESSION['password'])){ echo $_SESSION['password']; }  ?>" required>
                            <small id="passwordHelp" class="form-text text-muted">Password must be atleast 6 letters.</small>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?php if (isset($_SESSION['password'])){ echo $_SESSION['password']; }  ?>"
                                   required>
                        </div>

                        <p>Already have an account? <a href="index.php">Sign in</a></p>
                        <button type="submit" class="btn btn-primary" id="signup-btn">Sign up</button>
                    </form>
                    <?php
                    //clearing the values
                    $_SESSION['firstname'] = null;
                    $_SESSION['lastname'] = null;
                    $_SESSION['password'] = null;

                    //if database related error happens while signing up
                    if(isset($_SESSION['signup_error'])) {
                        echo $_SESSION['signup_error'];
                        $_SESSION['signup_error'] = null;
                    }
                    ?>
                </div>
            </div>
            <div class="right-section right-section-signup"></div>
        </div>
    </div>
    <script>
        //checking if the password is at least 6 characters.
        //comparing password and confirm password
        var password = document.getElementById("password");
        var confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value.length<6){
                confirm_password.setCustomValidity("Passwords is too short");
            }
            else {
                if (password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Passwords Don't Match");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

<?php include "assets/footer.php" ?>