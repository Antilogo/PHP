<?php
$mysql = mysqli_connect("localhost", "root", "", "Day10");

$perPage = 3;

//Tinh so trang
$currentPage = empty($_GET['page']) ? 1 : $_GET['page'];
$search = empty($_GET['search']) ? "" : $_GET['search'];

$offset = ($currentPage - 1) * $perPage;
$sql = "SELECT * FROM login WHERE username LIKE '%$search%'";
$result = mysqli_query($mysql, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$totalPage = ceil(count($rows) / $perPage);


//Lay item tren tung trang
$sql = "SELECT * FROM login WHERE username LIKE '%$search%' LIMIT $perPage OFFSET $offset";
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
</head>

<body>

<div class="container">
    <div class="mt-3">
        <a href="create.php">
            <button class="btn btn-primary">Create new student</button>
        </a>
    </div>
    <form>
        <input type="text" name="search" placeholder="Username" />
    </form>
    <table class="table table-striped">
    <thead>
        <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Dob</th>
        <th>Avatar</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['dob']; ?></td>
            <td><?php echo $row['avatar_file_name']; ?></td>
            <td>
            <a href="edit.php?id=<?php echo $row['id'] ?>">Update</a>
            <a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item <?php echo $currentPage == 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="index.php?page=<?php echo $currentPage - 1 ?>&search=<?php echo $search ?>">Previous</a>
        </li>
        
        <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
            <?php $hrefLink = "index.php?page=$i". !empty($search) ? "&search=$search" : ""; ?>
            <?php die($hrefLink); ?>
            <li class="page-item <?php echo$currentPage == $i ? 'active' : '' ?>"><a class="page-link" href="index.php?page=<?php echo $i ?>&search=<?php echo $search ?>"> <?php echo $i ?></a></li>
        <?php } ?>
            
        <li class="page-item <?php echo $currentPage == $totalPage ? 'disabled' : '' ?>">
        <?php $hrefLink = "index.php?page=$currentPage+1". !empty($search) ? "&search=$search" : ""; ?>
            <a class="page-link" href=<?php echo $hrefLink; ?>>Next</a>
        </li>

    </ul>
    </nav>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>