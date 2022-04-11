<?php 
  if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $hobby = $_POST['hobby'];
    $select = $_POST['select'];

    if ($firstname == "") {
      $errors['firstname'] = "Không được để trống firstname";
    }

    if ($lastname == "") {
      $errors['lastname'] = 'Không được để trống lastname';
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Sai định dạng email";
    }

    if (strlen(trim($_POST['gender'])) === 0) {
      $errors['gender'] = "Không được để trống Gender";
    }

      echo $firstname;?>
      <br>
      <?php echo $lastname; ?>
      <br>
      <?php echo $email;
      ?>

      <br>

      <?php if($gender == 1){
        echo "Male";
      }else{echo "Female";}?>

      <?php if($hobby == "Badminton"){
        echo "Badminton";
      }?>

      <br>

      <?php
      if($hobby == "Football"){
        echo "Football";
      }?>

      <br>
      
      <?php
      if($hobby == "Basketball"){
        echo "Basketball";
      }
      ?>

      <br>

      <?php
      echo $select;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <style>
    input#firstname,#lastname,#email{
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="row">
    <div class="col-md-8">
      <h2>Registration Form</h2>
      <form action="" method="post">
        <div class="firstname">
          <label for="">First name</label><br>
          <input type="text" name="firstname" id="firstname">
          <?php if (isset($errors['firstname'])) { ?>
            <p><?php echo $errors['firstname']; ?></p>
            <?php } ?>
        </div>

        <div class="lastname">
          <label for="">Last name</label><br>
          <input type="text" name="lastname" id="lastname">
          <?php if (isset($errors['lastname'])) { ?>
                <p><?php echo $errors['lastname']; ?></p>
            <?php } ?>
        </div>

        <div class="email">
          <label for="">Email</label><br>
          <input type="text" name="email" id="email">
          <?php if (isset($errors['email']) != "") { ?>
                <p><?php echo $errors['email']; ?></p>
          <?php } ?>
        </div>
        
        <div class="gender">
          <label for="">Gender</label><br>
          <input type="radio" name="gender" id="gender" value="1">
          <label for="">Male</label>
          <input type="radio" name="gender" id="gender" value="2">
          <label for="">Female</label>
          <?php if (isset($errors) && isset($errors['gender'])) { ?>
            <p><?php echo $errors['gender']; ?></p>
          <?php } ?>
        </div>
            
        <div class="state">
          <label for="">State</label><br>
          <select name="select" id="select">
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
        </div>

        <div class="hobbies">
          <label for="">Hobbies</label><br>
          <input type="checkbox" name="hobby" value="Badminton" /> Badminton
          <input type="checkbox" name="hobby" value="Football" /> Football
          <input type="checkbox" name="hobby" value="Basketball" /> Basketball
        </div>

        <button type="submit" name="submit"> Save record</button>
      </form>
      
      <p><?php echo $errors['email']; ?></p>

    </div>

    <div class="col-md-3 ml-auto">
      <h2>Feature</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat enim quibusdam adipisci maxime deleniti ipsum. Culpa nihil ipsa quasi! Ab fuga earum consectetur ullam, suscipit doloribus illo ipsam sit optio.</p>
    </div>
  </div>

  
</body>
</html>