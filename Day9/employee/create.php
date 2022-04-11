<?php require('../connection.php');  ?>

<?php 
	//Nếu nút save được clicked
	if (isset($_POST['save'])) {
    $Name = $_POST['name'];
    $Description	= $_POST['description'];
    $Gender = $_POST['gender'];
		$Birthday = $_POST['birthday'];

    if ($Name == "") {
      $errors['name'] = "Không được để trống name";
    }
		if ($Description == "") {
      $errors['description'] = "Không được để trống name";
    }
		if ($Gender == "") {
      $errors['gender'] = "Không được để trống name";
    }
		if ($Birthday == "") {
      $errors['birthday'] = "Không được để trống name";
    }

    $sql = "INSERT INTO employee(name, description, gender, birthday) 
    VALUES ('$Name', '$Description', '$Gender', '$Birthday')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
				$_SESSION['check'] = "Thêm mới thành công";
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
				<!-- First name -->
				<div class="form-group">
					<label>name</label>
					<input class="form-control" type="text" name="name" />
					<?php if (isset($errors['name']) != "") { ?>
						<p><?php echo $errors['name']; ?></p>
					<?php } ?>
				</div>

				<div class="form-group">
					<label>description</label>
					<input class="form-control" type="text" name="description" />
					<?php if (isset($errors['description']) != "") { ?>
						<p><?php echo $errors['description']; ?></p>
					<?php } ?>
				</div>

				<div class="form-group">
					<label>gender</label>
					<input class="form-control" type="text" name="gender" />
					<?php if (isset($errors['gender']) != "") { ?>
						<p><?php echo $errors['gender']; ?></p>
					<?php } ?>
				</div>
				
        <div class="form-group">
					<label>birthday</label>
					<input class="form-control" type="date" name="birthday" />
					<?php if (isset($errors['birthday']) != "") { ?>
						<p><?php echo $errors['birthday']; ?></p>
					<?php } ?>
				</div>

				<button type="submit" name="save" class="btn btn-primary">Save</button>
			</form>
		</div>
	</body>
</html>