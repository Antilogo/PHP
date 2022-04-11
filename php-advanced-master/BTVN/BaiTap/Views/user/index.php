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
        <a href="index.php?controller=user&action=create">
            <button class="btn btn-primary">Create new employee</button>
        </a>
        
    </div>
    <table class="table table-striped">
    <thead>
        <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Salary</th>
        <th>Gender</th>
        <th>Birthday</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($users as $user) { ?>
        <tr>
            <td><?php echo $user['Name']; ?></td>
            <td><?php echo $user['Description']; ?></td>
            <td><?php echo $user['Salary']; ?></td>
            <td><?php echo $user['Gender']; ?></td>
            <td><?php echo $user['Birthday']; ?></td>
            <td>
            <a href="index.php?controller=user&action=edit&id=<?php echo $user['id'] ?>">Edit</a>
            <a onclick="return confirm('Are you sure')" href="index.php?controller=user&action=delete&id=<?php echo $user['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>