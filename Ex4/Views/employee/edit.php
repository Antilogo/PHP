<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    .btn-ends {
      margin-top: 20px
    }

    .btn-ends div {
      display: inline-block;
      margin-right: 10px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="logo">
      <h1>Update Record</h1>
    </div>

    <form action="index.php?controller=employee&action=update&id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">
        <label class="form-label" for="">Name</label>
        <input class="form-control" type="text" name="name" value="<?php echo $employee['name']; ?>">
      </div>
      <div class="form-group">
        <label class="form-label" for="">Description</label>
        <input class="form-control" class="form-control" type="textarea" name="description" value="<?php echo $employee['description']; ?>">
      </div>
      <div class="form-group">
        <div>
          <label class="form-label" for="">Gender</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="male" value="0" <?php echo $employee['gender'] == 0 ? 'checked' : ''; ?>>
          <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="female" value="1" <?php echo $employee['gender'] == 1 ? 'checked' : ''; ?>>
          <label class="form-check-label" for="female">Female</label>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="">Salary</label>
        <input class="form-control" type="number" name="salary" value="<?php echo $employee['salary']; ?>">
      </div>
      <div class="form-group">
        <label class="form-label" for="">Birthday</label>
        <input class="form-control" type="date" name="birthday" value="<?php echo $employee['birthday']; ?>">
      </div>
      <div class="form-group">
        <label class="form-label" for="">Created_at</label>
        <input class="form-control" type="datetime" name="created_at" value="<?php echo $employee['created_at']; ?>" readonly>
      </div>

      <div class="form-group btn-ends">
        <div>
          <button class="btn btn-primary" type="submit" name="submit">Update</button>
        </div>
        <div>
          <button style="border: 1px solid black;" class="btn btn-light" type="button" name="cancel" onclick="history.go(-1)">Cancel</button>
        </div>
      </div>
    </form>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>


</html>