<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
      label{
        padding-left: 10px;
        font-size: 20px;
      }
      div{
        margin-bottom: 10px;
      }
      button{
        margin-left: 10px;
      }
      .but{
        display: flex;
        justify-content: center;
      }
    </style>
</head>

<body>
  <div class="container">
    <form method="POST" action="index.php?controller=user&action=update&id=<?php echo $user['id'] ?>">
      <div class="form-group">
          <label for="first_name">Name</label>
          <input type="text" name="Name" id="Name" class="form-control" value="<?php echo $user['Name'] ?>">
      </div>
      <div class="form-group">
          <label for="Description">Description</label>
          <input type="text" name="Description" id="Description" class="form-control" value="<?php echo $user['Description'] ?>">
      </div>
      <div class="form-group">
          <label for="Salary">Salary</label>
          <input type="text" name="Salary" id="Salary" class="form-control" value="<?php echo $user['Salary'] ?>">
      </div>
      <div>
        <label for="Gender">Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="2">
          <label class="form-check-label" for="flexRadioDefault1">
            Nam
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="1" checked>
          <label class="form-check-label" for="flexRadioDefault2">
            Nu
          </label>
        </div>
        </div>
      <div class="form-group">
          <label for="Birthday">Birthday</label>
          <input type="date" name="Birthday" id="Birthday" class="form-control" value="<?php echo $user['Birthday'] ?>">
      </div>

      <div class="but">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-primary" onclick="history.go(-1)">Back</button>
      </div>
    </form>
  </div>
</body>

</html>