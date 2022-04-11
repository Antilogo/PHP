<?php
    // require('../connection.php');
    $mysql = mysqli_connect("localhost", "root", "", "Day10");
    
    $sql = "SELECT * FROM login WHERE id = ". $_GET['id'];
    $result = mysqli_query($mysql, $sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['save'])){
        // $Id = $_POST['id'];
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $Email = $_POST['email'];
        $Dob = $_POST['dob'];
        $Avatar = $_POST['avatar_file_name'];

        $sql = "UPDATE login SET username = '$Username', 
        password = '$Password', email = '$Email', dob = '$Dob',avatar_file_name = '$Avatar' WHERE id = ". $_GET['id'];
        $result = mysqli_query($mysql, $sql);
        if($result){
            header('location: index.php');
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
    <form action="edit.php?id=<?php echo $row['id']?>" method="POST">
        <div>
            <label>Username</label>
            <br>
            <input type="text" name="username" value="<?php echo $row['username'] ?>">
        </div>
        <div>
            <label>Password</label>
            <br>
            <input type="text" name="password" value="<?php echo $row['password'] ?>">
        </div>
        <div>
            <label>Email</label>
            <br>
            <input type="text" name="email" value="<?php echo $row['email'] ?>">
        </div>
        <div>
            <label>Dob</label>
            <br>
            <input type="text" name="dob" value="<?php echo $row['dob'] ?>">
        </div>
        <div>
            <label>Avatar</label>
            <br>
            <input type="text" name="avatar_file_name" value="<?php echo $row['avatar_file_name'] ?>">
        </div>

        <button type="submit" name="save">Update</button>
    </form>
</body>
</html>