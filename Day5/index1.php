<?php
    session_start();//required to run

    if(isset($_COOKIE["username"])){
        header("location: bgb5vd");
    }

    if(isset($_POST['login'])){
        if($_POST['username'] == 'admin' && $_POST['password'] == 'admin'){
            //check remember
            if(isset($_POST["remember"])){
                setcookie("username", 'admin', time() + 300);
            }
            else{
                $_SESSION['username'] = "admin";
            }
            $_SESSION['username'] = 'admin';
            //sau khi dang nhap xong thi dieu huong sang bgb5vd.php
            header('location: bgb5vd.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <div>
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <input type="checkbox" name="remember">
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>