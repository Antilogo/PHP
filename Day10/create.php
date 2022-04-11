<?php $mysql = mysqli_connect("localhost", "root", "", "Day10");  ?>

<?php 
	//Nếu nút save được clicked
	if (isset($_POST['save'])) {
    $Username = $_POST['username'];
    $Password	= $_POST['password'];
    $Email = $_POST['email'];
		$Dob = $_POST['dob'];
    $Avatar = $_POST['avatar_file_name'];

    if ($Username == "") {
      $errors['username'] = "Không được để trống name";
    }
		if ($Password == "") {
      $errors['password'] = "Không được để trống name";
    }
		if ($Email == "") {
      $errors['email'] = "Không được để trống name";
    }
		if ($Dob == "") {
      $errors['dob'] = "Không được để trống name";
    }
    if ($Avatar == "") {
      $errors['avatar_file_name'] = "Không được để trống name";
    }

    $sql = "INSERT INTO login (username, password, email, dob, avatar_file_name) 
    VALUES ('$Username', '$Password', '$Email', '$Dob','$Avatar')";
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
		<title>Create new student</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>
	
	<body>
		<div class="container">
			<h1>Create new student</h1>
			<form action="create.php" method="POST">

				<div class="form-group">
					<label>usename</label>
					<input class="form-control" type="text" name="username" />
					<?php if (isset($errors['username']) != "") { ?>
						<p><?php echo $errors['username']; ?></p>
					<?php } ?>
				</div>

				<div class="form-group">
					<label>password</label>
					<input class="form-control" type="text" name="password" />
					<?php if (isset($errors['password']) != "") { ?>
						<p><?php echo $errors['password']; ?></p>
					<?php } ?>
				</div>

				<div class="form-group">
					<label>email</label>
					<input class="form-control" type="text" name="email" />
					<?php if (isset($errors['email']) != "") { ?>
						<p><?php echo $errors['email']; ?></p>
					<?php } ?>
				</div>
				
        <div class="form-group">
					<label>dob</label>
					<input class="form-control" type="date" name="dob" />
					<?php if (isset($errors['dob']) != "") { ?>
						<p><?php echo $errors['dob']; ?></p>
					<?php } ?>
				</div>

        <div class="form-group">
					<label>avatar_file_name</label>
					<input class="form-control" type="text" name="avatar_file_name" />
					<?php if (isset($errors['avatar_file_name']) != "") { ?>
						<p><?php echo $errors['avatar_file_name']; ?></p>
					<?php } ?>
				</div>

				<button type="submit" name="save" class="btn btn-primary">Save</button>
			</form>
		</div>
	</body>
</html>