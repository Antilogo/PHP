<?php
  $mysql = mysqli_connect("localhost", "root", "", "Day11");

  if (isset($_POST['save'])) {
    $errors = [];

    $Email = $_POST['email'];
    $Password	= $_POST['password'];
    
    if (strlen(trim($Email)) === 0) {
      $errors['email'] = "Email sai";
    } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Email sai";
      }
  
      if (strlen(trim($Password)) === 0) {
        $errors['password'] = "Password sai";
    }

    $sql = "SELECT email,password FROM login where email LIKE '$Email' and password LIKE '$Password'";
    $result = mysqli_query($mysql, $sql);

    if ($result) {
      $_SESSION['email'] = $email;
      header('location:../dashboard/index.php');
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
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
  div{
    margin-bottom: 10px;
  }
</style>
</head>

<body>

<div class="container">

  <h1>Login</h1>
  <div class="form-group">
    <input class="form-control" type="text" name="email" placeholder="Email"/>
    <?php if (isset($errors['email']) != "") { ?>
      <p><?php echo $errors['email']; ?></p>
    <?php } ?>
  </div>

  <div class="form-group">
    <input class="form-control" type="password" name="password" placeholder="Password"/>
    <?php if (isset($errors['password']) != "") { ?>
      <p><?php echo $errors['password']; ?></p>
    <?php } ?>
  </div>
  
  <button type="submit" name="save" class="btn btn-primary" style="width: 100%;">Login</button>
  
  <div>
      <p>Dont have an account? <a href="create.php">Register</a> </p>
  </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>