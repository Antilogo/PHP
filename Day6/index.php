<?php

  $fileName = "";
  $uploadDirectory = "upload";
  $allowableExtensions = ['jpeg', 'jpg', 'gif', 'heic'];

  if (isset($_POST['upload'])) {
  $file = $_FILES['upload_file'];
  $fileName = $file['name'];

  if ($file['error'] == UPLOAD_ERR_OK) {          
  $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

  if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory);
  }

  if (in_array($fileExtension,
    $allowableExtensions
  )) {
  
  move_uploaded_file($file['tmp_name'], $uploadDirectory . DIRECTORY_SEPARATOR . $fileName);    
  }
  }
  echo '<pre>';
  print_r(($_FILES));
  echo '</pre>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>              
  <form method="POST" enctype="multipart/form-data">
      <input type="file" name="upload_file"    />
      <button name="upload" name="upload">Upload</button>
  </form>                
    <img src="<?php echo $uploadDirectory    .    DIRECTORY_SEPARATOR    .    $fileName ?>" />
</body>




</html>