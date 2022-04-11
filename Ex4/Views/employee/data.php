<tbody>
  <?php
  if (count($employees) > 0) :
    foreach ($employees as $employee) : ?>
      <tr>
        <td><?php echo $employee['id']; ?></td>
        <td><?php echo $employee['name']; ?></td>
        <td><?php echo $employee['description']; ?></td>
        <td><?php echo $employee['salary']; ?></td>
        <td><?php echo $employee['gender']; ?></td>
        <td><?php echo $employee['created_at']; ?></td>
        <td class="row">
          <div class="col-4">
            <a name="view" href="index.php?controller=employee&action=information&id=<?php echo $employee['id']; ?>"><i class="far fa-eye"></i></a>
          </div>
          <div class="col-4">
            <a name="edit" href="index.php?controller=employee&action=edit&id=<?php echo $employee['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
          </div>
          <div class="col-4">
            <a name="delete" href="index.php?controller=employee&action=delete&id=<?php echo $employee['id'] ?>" onclick="return confirm('Are you sure you want to delete')"><i class="far fa-trash-alt"></i></a>
          </div>
        </td>
      </tr>
  <?php
    endforeach;
  endif;
  ?>
</tbody>