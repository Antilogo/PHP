<?php
    session_start();
    if(isset($_POST['login'])){
        if($_POST['username'] == 'admin' && $_POST['password'] == '123456'){
            // $_SESSION['username'] = 'admin';
            if(isset($_POST["remember"])){
                setcookie("username", 'admin', time() + 300);
            }
            else{
                $_SESSION['username'] = "admin";
            }
            $_SESSION['username'] = "admin";
            header('location: login-success.php');
            $t=time();
        }else{ echo 'Đăng nhập không thành công';}
    }
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
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
            <input type="text" name="username" placeholder="Username">
        </div>
        <div>
            <input type="password" name="password" placeholder="Password">
        </div>
        <input type="checkbox" name="remember">
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>