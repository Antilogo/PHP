<?php
function isPalindrome($str) {
  $arr = str_split($str);
  for($i = 0;$i < strlen($str)/2;$i++){
    if($arr[$i] != $arr[strlen($str)-$i-1]){
      return "không là chuỗi palindrome";
    }
    else{
      return "là chuỗi palindrome";
    }
  }
}
$palindrone = "";
if(isset($_POST['save'])){
  $palindrone = $_POST['palindrone'];
  echo isPalindrome("$palindrone");
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  <script src='main.js'></script>
</head>
<body>
  <form action="" method="post">
  <input type="text" name="palindrone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <button type="submit" name="save">Xác nhận</button>
  </form>
</body>
</html>



