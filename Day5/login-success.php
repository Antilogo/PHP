
<?php
    session_start();
    if(isset($_POST['signout'])){
        unset($_SESSION['username']);
        $_SESSION['message'] = "Đăng xuất thành công";
        setcookie("username", "", time() - 1);
        header('location: Bai1.php');
        
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
    <?php if(isset($_SESSION['username'])){ ?>
        <?php echo 'welcome: '. $_SESSION['username']; ?>
        <br>
        <?php echo 'Thời gian hiện tại đang login: '.date('d/m/y H:m:s');?>
        <form action="" method="POST">
            <button type="submit" name="signout">Sign out</button>
        </form>
    <?php } else { ?>
        <?php echo "Cần đăng nhập để thực hiện chức năng này";
            header('Refresh:5; url=b1.php', true, 303); ?>
    <?php } ?>
</body>
</html>