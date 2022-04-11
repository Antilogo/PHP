<?php
//$str = "Write a that takes any string of characters and finds the number of times each string occurs.";

function countWords($str)
{
  $array = [];
  $string = strtolower($str);
  $strAsArray = explode(" ", $string);

  foreach ($strAsArray as $value) {
    if (!isset($array[$value])) {
      $array[$value] = 0;
    }

    if (in_array($value, $strAsArray)) {
      $array[$value] += 1;
    }
  }

  return $array;
}
$str = "";
if (isset($_POST['submit'])) {
  $str = $_POST['string'];

  echo "<pre>";
  print_r(countWords($str));
  echo "</pre>";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
</head>

<body>
  <form action="" method="POST">
    <div class="mb-3">
      <input type="text" name="string" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>


  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>

</html>