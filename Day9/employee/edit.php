<?php
    require('../connection.php');
    
    $sql = "SELECT * FROM employee WHERE id = ". $_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['save'])){
        // $Id = $_POST['id'];
        $Name = $_POST['name'];
        $Description = $_POST['description'];
        $Salary = $_POST['salary'];
        $Gender = $_POST['gender'];
        $Birthday = $_POST['birthday'];
        $Created_at = $_POST['created_at'];

        $sql = "UPDATE employee SET name = '$Name', 
        description = '$Description', salary = '$Salary', gender = '$Gender',created_at = '$Created_at',birthday = '$Birthday' WHERE id = ". $_GET['id'];
        $result = mysqli_query($conn, $sql);
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
        <!-- <div>
            <label>Id</label>
            <br>
            <input type="text" name="id" value="<?php echo $row['id'] ?>">
        </div> -->
        <div>
            <label>Name</label>
            <br>
            <input type="text" name="name" value="<?php echo $row['name'] ?>">
        </div>
        <div>
            <label>Description</label>
            <br>
            <input type="text" name="description" value="<?php echo $row['description'] ?>">
        </div>
        <div>
            <label>Salary</label>
            <br>
            <input type="text" name="salary" value="<?php echo $row['salary'] ?>">
        </div>
        <div>
            <label>Gender</label>
            <br>
            <input type="text" name="gender" value="<?php echo $row['gender'] ?>">
        </div>
        <div>
            <label>Birthday</label>
            <br>
            <input type="date" name="birthday" value="<?php echo $row['birthday'] ?>">
        </div>
        <!-- <div>
            <label>Create_at</label>
            <br>
            <input type="date" name="created_at" value="<?php echo $row['created_at'] ?>">
        </div> -->

        <button type="submit" name="save">Update</button>
    </form>
</body>
</html>