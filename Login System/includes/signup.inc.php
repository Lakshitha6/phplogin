<?php
    
    if (isset($_POST["submit"])) {
       
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['uid'];
        $pwd = $_POST['pwd'];
        $pwdRepeat = $_POST['pwdrepeat'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        $emptyInput = emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat);
        $invalidUid =  invalidUid($username);
        $invalidEmail  = invalidEmail($email);
        $pwdMatch = pwdMatch($pwd, $pwdRepeat);
        $uidExists = uidExists($connect, $username , $email);

        if ($emptyInput !== false) {
            header("Location: ../signup.php?error=emptyinput");
           exit();
        }

        if ($invalidUid !== false) {
            header("Location: ../signup.php?error=invaliduid");
           exit();
        }

        if ($invalidEmail !== false) {
            header("Location: ../signup.php?error=invalidEmail");
           exit();
        }

        if ($pwdMatch !== false) {
            header("Location: ../signup.php?error=passworddon'tmatch");
           exit();
        }

        if ($uidExists !== false) {
            header("Location: ../signup.php?error=usernametaken");
           exit();
        }

        createUser($connect, $name, $email, $username, $pwd);
    }

    else{
        header('Location:../login.php');
        exit();
    }