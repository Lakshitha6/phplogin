<?php

    function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
        $result = false;

        if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {          
            $result = true ;
        }

        else{
            $result = false ;
        }

        return $result ;
    }

    function invalidUid($username){
        $result= false ;

        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {          
            $result = true ;
        }

        else{
            $result = false ;
        }

        return $result ;
    }

    function invalidEmail($email){
        $result = false;

        if (!filter_var($email)) {          
            $result = true ;
        }

        else{
            $result = false ;
        }

        return $result ;
    }

    function pwdMatch($pwd, $pwdRepeat){
        $result = false;

        if ($pwd !== $pwdRepeat) {          
            $result = true ;
        }

        else{
            $result = false ;
        }

        return $result ;
    }

    function uidExists($connect, $username , $email){
        $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail =?;";
        $stmt = mysqli_stmt_init($connect);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../signup.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
           return $row ;
        }
        else 
            return false ;

        mysqli_stmt_close($stmt);
    }

function createUser($connect, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?,?,?,?);";

    $stmt = mysqli_stmt_init($connect);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd){
    $result= false ;

    if (empty($username) || empty($pwd)) {          
        $result = true ;
    }

    else{
        $result = false ;
    }

    return $result ;
}

function LoginUser($connect, $username,$pwd){
    $uidExists = uidExists($connect, $username, $username);
    if ($uidExists === false) {
        header("Location:../signin.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("Location:../signup.php?error=wronglogin");
        exit();
    }

    elseif($checkPwd ===true ){
        session_start();
        $_SESSION["userid"] = $uidExists["usersid"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["username"] = $uidExists["usersName"];
        header("Location:../index.php");
        exit();
    }
}