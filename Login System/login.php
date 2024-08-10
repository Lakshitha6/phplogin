<?php 
    include_once 'header.php'
?>

<div class="form">
    <h1>Login Form</h1>
<form action="includes/login.inc.php" method="post">

    <input type="text" id="fname" name="uid" placeholder="Email / Username">

    <input type="password" id="lname" name="pwd" placeholder="Password">
  
    <button type="submit" name="submit">Login</button>

</form>

<?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo '<div class="error">Fill out the all fields</div>';
            }

            else if ($_GET["error"] == "wronglogin") {
                echo '<div class="error">Invalid Details !</div>';
            }

            else if ($_GET["error"] == "stmtfailed") {
                echo '<div class="error">Something went wrong !</div>';
            }

            else if ($_GET["error"] == "none") {
                echo '<div class="error">Account Created !</div>';
            }
        }
    ?>
<p>New User ? <a href="signup.php"> Resister Now </a></p>
</div>
    <?php 
    include_once 'footer.php'
?>