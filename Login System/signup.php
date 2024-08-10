<?php 
    include_once 'header.php'
?>

<div class="form">
    <h1>Login Form</h1>
<form action="includes/signup.inc.php" method="post">

    <input type="text" id="fname" name="name" placeholder="Enter Name">
    <input type="text" id="fname" name="email" placeholder="Email">
    <input type="text" id="fname" name="uid" placeholder="Username">
    <input type="password" id="lname" name="pwd" placeholder="Password">
    <input type="password" id="fname" name="pwdrepeat" placeholder="Repeat Password">
  
    <button type="submit" name="submit">Register</button>

</form>
    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo '<div class="error">Fill out the all fields</div>';
            }

            else if ($_GET["error"] == "invaliduid") {
                echo '<div class="error">Invalid Username !</div>';
            }

            else if ($_GET["error"] == "invalidEmail") {
                echo '<div class="error">Invalid Email !</div>';
            }

            else if ($_GET["error"] == "passworddon'tmatch") {
                echo '<div class="error">Password do not Match !</div>';
            }

            else if ($_GET["error"] == "stmtfailed") {
                echo '<div class="error">Something went wrong !</div>';
            }

            else if ($_GET["error"] == "usernametaken") {
                echo '<div class="error">Username Already Taken !</div>';
            }

            else if ($_GET["error"] == "none") {
                echo '<div class="error">Account Created !</div>';
            }
        }
    ?>

    <p>Already Have An Account ?.<a href="login.php"> Login </a> </p>

</div>
    <?php 
    include_once 'footer.php'
?>