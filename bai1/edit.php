<?php
    // require('../connection.php');
    $mysql = mysqli_connect("localhost", "root", "", "db_itplus_shopping");
    
    //index.php?id=abc
    $sql = "SELECT * FROM categories WHERE id = '". $_GET['id']."'";
    $result = mysqli_query($mysql, $sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['save'])){
        // $Id = $_POST['id'];
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];


        // $sql = "UPDATE categories SET id = '$id', 
        // tenhang = '$tenhang', nsx = '$nsx', noidung = '$noidung',giaban = $giaban,soluong = $soluong WHERE mahang = '". $_GET['id']."'";
        // $result = mysqli_query($mysql, $sql);
        // if($result){
        //     header('location: index.php');
        // }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    .header{
      width: 100%;
      display: inline-flex;
      background: black;
    }
  </style>
</head>
<body>
  <div class="header">
        <h2 style="color: white;margin-left: 125px">ITPlus products</h2>
        <button style="border: none;background: black;margin: 0px 20px;">
          <a href="index.php" style="color: white;text-decoration: none;">
            Categories
          </a>
          </button>
        <button disabled="disabled" style="background: black;color: gray;border: none;">Post</button>
      </div>
<div class="container">
  <h1>
    Product in category:<?php echo $row['name']?>
  </h1>
  <form action="edit.php?id=<?php echo $row['id']?>" method="POST">
    <table class="table table-striped">
      <thead>
            <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả sản ngắn</th>
            <th>Tên danh mục</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                <button type="button" class="btn btn-danger"><a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">Xóa</a></button>
                </td>
            </tr>
        </tbody>
      </table>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>