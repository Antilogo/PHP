<?php 
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];
    $message = $_POST['message'];

    if ($name == "") {
      $errors['name'] = "Không được để trống name";
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Sai định dạng email";
    }
    if (!filter_var($_POST['phone'], FILTER_VALIDATE_INT)) {
      $errors['phone'] = "Sai định dạng phone";
    }
    if (!filter_var($_POST['website'], FILTER_VALIDATE_URL)) {
      $errors['website'] = "Sai định dạng website";
    }
    if ($message == "") {
      $errors['message'] = "Không được để trống message";
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <style>
    body{
      display: flex;
      justify-content: center;
      align-items: center;
    }
    form{
      padding: 30px;
      text-align: center;
      border: 1px solid black;
    }
    input{
      width: 243px;
      margin-bottom: 10px;
    }
    textarea{
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <form action="#" method="post">
    <input type="text" name="name" id="name" placeholder="Your name">
    <?php if (isset($errors['name']) != "") { ?>
      <p><?php echo $errors['name']; ?></p>
    <?php } ?>
    <br>
    <input type="text" name="email" id="email" placeholder="Your email address">
    <?php if (isset($errors['email']) != "") { ?>
      <p><?php echo $errors['email']; ?></p>
    <?php } ?>
    <br>
    <input type="text" name="phone" id="phone" placeholder="Phone">
    <?php if (isset($errors['phone']) != "") { ?>
      <p><?php echo $errors['phone']; ?></p>
    <?php } ?>
    <br>
    <input type="text" name="website" id="website" placeholder="Website">
    <?php if (isset($errors['website']) != "") { ?>
      <p><?php echo $errors['website']; ?></p>
    <?php } ?>
    <br>
    <textarea name="message" id="message" cols="22" rows="2" placeholder="Your text here"></textarea>
    <?php if (isset($errors['message']) != "") { ?>
      <p><?php echo $errors['message']; ?></p>
    <?php } ?>
    <br>
    <button type="submit" name="submit"> Save record</button>
  </form>
</body>
</html>
<?php
  if(isset($_POST['submit'])){ ?>
    <?php
      echo "your name: ",$name;
    ?>
    <br>
    <?php
      echo "your email: ",$email;
    ?>
    <br>
    <?php
      echo "your phone number: ",$phone;
    ?>
    <br>
    <?php
      echo "Your website: ",$website;
    ?>
    <br>
    <?php
      echo "Your message: ",$message;
  }
?>