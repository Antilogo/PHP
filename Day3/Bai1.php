<?php 
  $error = [];
  if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "") {
      $errors['username'] = "Không được để trống username";
    }

    if ($password == "") {
      $errors['password'] = 'Không được để trống password';
    }
    if ($username != "admin") {
      $errors['username'] = "Sai username";
    }

    if ($password != "admin") {
      $errors['password'] = 'Sai password';
    }
  }?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body{
      display: flex;
      justify-content: center;
    }
    form{
      width: 400px;
      border: 1px solid black;
      text-align: center;
      border-radius: 10px;
      padding: 20px;
    }
    input{
      margin-bottom: 5px;
      width: 100%;
    }
    button{
      width: 100%;
    }
  </style>
</head>
<body>
  <form action="" method="post">
    <h1>Sign in</h1>
    <div id="username">
      <input type="text" name="username" id="username" placeholder="Username">
      <?php if (isset($errors['username'])) { ?>
        <p><?php echo $errors['username']; ?></p>
      <?php } ?>
    </div>
    
    <div id="password">
      <input type="text" name="password" id="password" placeholder="Password">
      <?php if (isset($errors['password'])) { ?>
        <p><?php echo $errors['password']; ?></p>
      <?php } ?>
    </div>

    <button type="submit" name="submit">Login</button>
  </form>
</body>
</html>