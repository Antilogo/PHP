<?php
  require('../connection.php');
    
  $sql = "SELECT * FROM employee WHERE id = ". $_GET['id'];
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  <script src='main.js'></script>
  <style>
    p{
      border: 1px solid black;
      padding: 5px;
    }
  </style>
</head>
<body>
  <label>Id</label>
  <p><?php echo $row['id'] ?></p>
  <label>Name</label>
  <p><?php echo $row['name'] ?></p>
  <label>Description</label>
  <p><?php echo $row['description'] ?></p>
  <label>Salary</label>
  <p><?php echo $row['salary'] ?></p>
  <label>Gender</label>
  <p><?php echo $row['gender'] ?></p>
  <label>Birthday</label>
  <p><?php echo $row['birthday'] ?></p>
  <label>Create_At</label>
  <p><?php echo $row['created_at'] ?></p>

  <button>
    <a href="index.php">Quay lai</a>
  </button>
</body>
</html>