<?php 
    include_once 'header.php'
?>

    <h1>Welcome <?php 
    if(isset($_SESSION["username"])){
        echo $_SESSION["username"]; }
       

    else 
        echo "user" ;?></h1>
        <br>
        <br>
    <h2>This is a login system</h2>

    <?php 
    include_once 'footer.php'
?>