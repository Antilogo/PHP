<?php
    session_start();

    echo "xin chao: ". $_SESSION["username"];


    if (isset($_COOKIE['username'])){
        echo "xinchao: ". $_COOKIE['username'];
    }

    if(isset($_POST['out'])){
        unset($_SESSION["username"]);

        setcookie("username", "", time() - 1);

        header('location: bgb5.php');
    }

?>
<a href="bgb5vd1.php">Go to bgb5vd1</a>
<form action="" method="POST">
    <button type="submit" name="out">Sign out</button>
</form>