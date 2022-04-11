<?php $mysql = mysqli_connect("localhost", "root", "", "db_itplus_shopping");  ?>

<?php 
	//Nếu nút save được clicked
	if (isset($_POST['save'])) {
    $errors = [];
    $name	= $_POST['name'];
    $description = $_POST['description'];

		if ($name == "") {
      $errors['name'] = "Không được để trống name";
    }
		if ($description == "") {
      $errors['description'] = "Không được để trống name";
    }

    $sql = "INSERT INTO categories (name, description) 
    VALUES ('$name', '$description')";
    $result = mysqli_query($mysql, $sql);
    if ($result) {
        header('location:index.php');
    }
    // else{
    //   echo "abc";
    // }
}
	
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Create new student</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
      button{
        width: 100%;
      }
    </style>
  </head>
	
	<body>
		<div class="container">
			<h1>Create new student</h1>
			<form action="create.php" method="POST">

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
				
				<button type="submit" name="save" class="btn btn-primary">Save</button>
				</div>

			</form>
		</div>
	</body>
</html>