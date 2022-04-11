<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php?controller=user&action=create">Create</a>
    <thead>
    <table>
        <tr>
            <td>id</td>
            <td>First</td>
            <td>Last</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['first_name'] ?></td>
                <td><?php echo $user['last_name'] ?></td>
                <td>
                    <a href="index.php?controller=user&action=edit&id=<?php echo $user['id'] ?>">Edit</a>
                    <a onclick="return confirm('Are you sure')" href="index.php?controller=user&action=delete&id=<?php echo $user['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
</body>

</html>