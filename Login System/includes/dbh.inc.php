<?php

    $serverName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "logindata";

    $connect  = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

    if (!$connect) {
        die("Connection failed : " .mysqli_connect_error());
    }