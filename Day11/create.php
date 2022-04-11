<?php
  $mysql = mysqli_connect("localhost", "root", "", "Day11");

  if (isset($_POST['save'])) {
    $Email = $_POST['email'];
    $Password	= $_POST['password'];
    $First_name = $_POST['first_name'];
		$Last_name = $_POST['last_name'];
    $Confirm_password = $_POST['confirm_password'];

    if ($Email == "") {
      $errors['email'] = "Không được để trống name";
    }
		if ($Password == "") {
      $errors['password'] = "Không được để trống name";
    }
		if ($First_name == "") {
      $errors['first_name'] = "Không được để trống name";
    }
		if ($Last_name == "") {
      $errors['last_name'] = "Không được để trống name";
    }
    if ($Confirm_password == "") {
      $errors['confirm_password'] = "Không được để trống name";
    }

    $sql = "INSERT INTO login (email, password, first_name, last_name) 
    VALUES ('$Email', '$Password', '$First_name', '$Last_name')";
    $result = mysqli_query($mysql, $sql);
    if ($result) {
				// $_SESSION['check'] = "Thêm mới thành công";
        header('location:index.php');
    }
  }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <!-- css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    div{
      margin-bottom: 10px;
    }
    .term{
      color: blue;
    }
    .policy{
      color: blueviolet;
      text-decoration: underline;
    }
  </style>
</head>
<body>
<div class="container">
  <form action="create.php" method="POST">

    <h1>Register</h1>
    <p>Create your account. It's free and only takes a few minutes</p>
    <div class="row">
      <div class="col-sm">
        <input class="form-control" type="text" name="first_name" placeholder="Firstname"/>
        <?php if (isset($errors['first_name']) != "") { ?>
          <p><?php echo $errors['first_name']; ?></p>
        <?php } ?>
      </div>
      <div class="col-sm">
        <input class="form-control" type="text" name="last_name" placeholder="Lastname"/>
        <?php if (isset($errors['last_name']) != "") { ?>
          <p><?php echo $errors['last_name']; ?></p>
        <?php } ?>
      </div>
    </div>

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
    
    <div class="form-group">
      <input class="form-control" type="password" name="confirm_password" placeholder="Confirm password"/>
      <?php if (isset($errors['confirm_password']) != "") { ?>
        <p><?php echo $errors['confirm_password']; ?></p>
      <?php } ?>
    </div>

    <input type="checkbox" name="check" id="check">
    <span>I accept the <span class="term">Terms of Use</span> & <span class="policy"><a>Privacy and Policy</a></span> </span>
    <br>
    <button type="button" name="save" class="btn btn-success" style="width: 100%;">Register now</button>
    <p style="text-align:center">Already have an account? <a href="index.php">Sign in</a> </p>

  </form>
</div>
</body>
</html>