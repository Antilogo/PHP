<?php
$mysql = mysqli_connect("localhost", "root", "", "db_itplus_shopping");

$perPage = 3;

//Tinh so trang
$currentPage = empty($_GET['page']) ? 1 : $_GET['page'];


$offset = ($currentPage - 1) * $perPage;
$sql = "SELECT * FROM categories";
$result = mysqli_query($mysql, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$totalPage = ceil(count($rows) / $perPage);


//Lay item tren tung trang
$sql = "SELECT * FROM categories LIMIT $perPage OFFSET $offset";
$rows = [];

$result = mysqli_query($mysql, $sql);

if ($result) {
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    .header{
      width: 100%;
      display: inline-flex;
      background: black;
    }
    a{
      text-decoration: none;
    }
  </style>
</head>

<body>

<div class="container">
  <div class="header">
    <h2 style="color: white;">ITPlus Blog</h2>
    <button style="border: none;color: white;background: black;margin: 0px 20px;">Categories</button>
    <button disabled="disabled" style="background: black;color: gray;border: none;">Post</button>
  </div>
    <div class="mt-3">
        <a href="create.php">
            <button class="btn btn-primary">Create new categories</button>
        </a>
    </div>
    <table class="table table-striped">
    <thead>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>

        </tr>
    </thead>

    <tbody>
        <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id'] ?>">
                <button type="submit" class="btn btn-primary">Xem</button>
              </a>
              //Xem mới được xóa
              <!-- <a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này')"> -->
                <button type="submit" class="btn btn-danger">Xóa</button>
              <!-- </a> -->
            </td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item <?php echo $currentPage == 1 ? 'disabled' : '' ?>"><a class="page-link" href="index.php?page=<?php echo $currentPage - 1 ?>">Previous</a></li>
        <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
          <li class="page-item <?php echo $currentPage == $i ? 'active' : '' ?>"><a class="page-link" href="index.php?page=<?php echo $i ?>"> <?php echo $i ?></a></li>
        <?php } ?>
        <li class="page-item <?php echo $currentPage == $totalPage ? 'disabled' : '' ?>"><a class="page-link" href="index.php?page=<?php echo $currentPage + 1 ?>">Next</a></li>
      </ul>
    </nav>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>