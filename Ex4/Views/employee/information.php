<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    p {
      margin-bottom: 5px;
    }
  </style>
</head>

<body>
  <div class="container">
    <form action="" method="POST" enctype="multipart/form">
      <h1>View Record</h1>
      <div>
        <p>ID</p>
        <p><?php echo $employee['id']; ?></p>
        <hr>
      </div>
      <div>
        <p>Name</p>
        <p><?php echo $employee['name']; ?></p>
        <hr>
      </div>
      <div>
        <p>Description</p>
        <p><?php echo $employee['description']; ?></p>
        <hr>
      </div>
      <div>
        <p>Salary</p>
        <p><?php echo $employee['salary']; ?></p>
        <hr>
      </div>
      <div>
        <p>Gender</p>
        <p><?php echo $employee['gender']; ?></p>
        <hr>
      </div>
      <div>
        <p>Birthday</p>
        <p><?php echo $employee['birthday']; ?></p>
        <hr>
      </div>
      <div>
        <p>Created_at</p>
        <p><?php echo $employee['created_at']; ?></p>
        <hr>
      </div>

      <div>
        <button type="button" class="btn btn-primary" name="back" onclick="history.go(-1)">Back</button>
      </div>
    </form>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>