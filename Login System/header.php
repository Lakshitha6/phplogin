<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lakshitha</title>
    <link rel="stylesheet" href="header.css">
</head>
<body>


<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="contact.php">Contact</a></li>


  <?php 
      if(isset($_SESSION["username"])){
        echo '  <li style="float:right"> <a href="includes/logout.inc.php">LogOut</a></li>';
        echo '  <li style="float:right"> <a class="active" href="#"> '.$_SESSION["username"].'</a></li>' ;
    }
    else {
    echo '<li style="float:right"> <a class="active" href="login.php">Login</a></li>';
    }
    ?>

</ul>

<div class="container">