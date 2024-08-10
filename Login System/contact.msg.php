<?php 
include_once 'contact.db.php';

$name = $_POST['usersName'];
$email = $_POST['Email'];
$message = $_POST['UserMessage'];


    $sql = "INSERT INTO usermessages (usersName, Email, UserMessage) VALUES('$name','$email','$message');";
    $result = mysqli_query($connect , $sql);

    echo "Sent Succesfully";