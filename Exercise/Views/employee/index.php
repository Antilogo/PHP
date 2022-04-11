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
    .container {
      margin-top: 20px;
    }

    table {
      text-align: center;
    }

    .header {
      display: flex;
      justify-content: space-between;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <div class="logo">
        <h1>Danh sách sinh viên</h1>
      </div>
      <div class="item-add">
        <a class="btn btn-success" href="index.php?controller=employee&action=create"><i class="fas fa-plus"></i> Thêm mới</a>
      </div>
    </div>



    <table class="table table-striped">
      <!-- Tao 5 truong: StudentId, First name, Last name, Email, DOB -->
      <thead>
        <tr>
          <th>Id</th>
          <th>Họ Tên</th>
          <th>Tuổi</th>
          <th>Ảnh đại diện</th>
          <th>Mô tả sinh viên</th>
          <th>Ngày tạo</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <!--c1:  while ($row = mysqli_fetch_assoc($result)) -->
        <?php foreach ($employees as $employee) { ?>
          <tr>
            <td><?php echo $employee['id']; ?></td>
            <td><?php echo $employee['name']; ?></td>
            <td><?php echo $employee['age']; ?></td>
            <td><?php echo $employee['avatar']; ?></td>
            <td><?php echo $employee['description']; ?></td>
            <td><?php echo $employee['created_at']; ?></td>
            <td class="row">
              <!-- <div class="col-4">
                <a href="index.php?controller=employee&action=information&id=<?php echo $employee['id']; ?>"><i class="far fa-eye"></i></a>
              </div> -->
              <div class="col-4">
                <a href="index.php?controller=employee&action=edit&id=<?php echo $employee['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
              </div>
              <div class="col-4">
                <a href="index.php?controller=employee&action=delete&id=<?php echo $employee['id'] ?>" onclick="return confirm('Are you sure you want to delete')"><i class="far fa-trash-alt"></i></a>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>

    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item <?php echo $currentPage == 1 ? 'disabled' : '' ?>"><a class="page-link" href="index.php?controller=employee&action=index&page=<?php echo $currentPage - 1 ?>&search=<?php echo $search ?>">Previous</a></li>
        <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
          <li class="page-item <?php echo $currentPage == $i ? 'active' : '' ?>"><a class="page-link" href="index.php?controller=employee&action=index&page=<?php echo $i ?>&search=<?php echo $search ?>"> <?php echo $i ?></a></li>
        <?php } ?>
        <li class="page-item <?php echo $currentPage == $totalPage ? 'disabled' : '' ?>"><a class="page-link" href="index.php?controller=employee&action=index&page=<?php echo $currentPage + 1 ?>&search=<?php echo $search ?>">Next</a></li>
      </ul>
    </nav>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>