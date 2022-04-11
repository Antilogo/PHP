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
        <h1>Employee List</h1>
      </div>
      <div class="item-add">
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
          <i class="fas fa-plus"></i>Create
        </a>
        <a class="btn btn-primary" name="refresh">
          Refresh
        </a>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form name="form-create">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create new employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label class="form-label" for="">Name</label>
                  <input class="form-control" type="text" name="name" id="name">
                  <p id="error-name"></p>
                </div>
                <div class="form-group">
                  <label class="form-label" for="">Description</label>
                  <input class="form-control" class="form-control" type="textarea" name="description">
                  <p id="error-description"></p>
                </div>
                <div class="form-group">
                  <div>
                    <label class="form-label" for="">Gender</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="0" checked>
                    <label class="form-check-label" for="male">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="1">
                    <label class="form-check-label" for="female">Female</label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label" for="">Salary</label>
                  <input class="form-control" type="number" name="salary">
                  <p id="error-salary"></p>
                </div>
                <div class="form-group">
                  <label class="form-label" for="">Birthday</label>
                  <input class="form-control" type="date" name="birthday">
                  <p id="error-birthday"></p>
                </div>
                <div class="form-group">
                  <label class="form-label" for="">Created_at</label>
                  <input class="form-control" type="datetime" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- End modal -->
    </div>

    <!-- <form action="index.php?controller=employee&action=index" method="GET">
      <input type="text" name="search" placeholder="Name">
    </form> -->

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Description</th>
          <th>Salary</th>
          <th>Gender</th>
          <th>DOB</th>
          <th>Created_at</th>
          <th>Action</th>
        </tr>
      </thead>

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
              <td><?php echo $employee['birthday']; ?></td>
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
    </table>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script>
    $(function() {
      //modal create
      $("form[name='form-create']").submit(function(e) {
        e.preventDefault();
        const name = $("input[name='name']").val();
        const description = $("input[name='description']").val();
        const gender = $("input[name='gender']").val();
        const birthday = $("input[name='birthday']").val();
        const salary = $("input[name='salary']").val();
        const created_at = $("input[name='created_at']").val();

        //createData(name, description, gender, birthday, salary, created_at)
        let has_error = false;

        $('#error-name').text('');
        $('#error-description').text('');
        $('#error-birthday').text('');
        $('#error-salary').text('');

        $('#error-name').removeClass('alert alert-danger');
        $('#error-description').removeClass('alert alert-danger');
        $('#error-birthday').removeClass('alert alert-danger');
        $('#error-salary').removeClass('alert alert-danger');

        
        
        if (name === "") {
          $('#error-name').addClass("alert alert-danger");
          $('#error-name').text('Trường name không được để trống.');
          has_error = true;
        }
        if (description === "") {
          $('#error-description').addClass("alert alert-danger");
          $('#error-description').text('Trường description không được để trống.');
          has_error = true;
        }
        if (birthday === "") {
          $('#error-birthday').addClass("alert alert-danger");
          $('#error-birthday').text('Trường birthday không được để trống.');
          has_error = true;
        }
        if (inputIsBlank(salary)) {
          $('#error-salary').addClass("alert alert-danger");
          $('#error-salary').text('Trường salary không được để trống.');
          has_error = true;
        }

        if (has_error === false) {
          $('form').unbind();
          $('form').submit();
        } else {
          e.preventDefault();
        }
        function inputIsBlank(string) {
      if (string.trim().length === 0) {
        return true
      }
        return false
      }

      function inputIsInt(number) {
        if (Number.isNaN(number)) {
          return true
        }
        return false
      }
        
        $.ajax({
          url: 'index.php?controller=employee&action=store',
          method: 'POST',
          data: {
            name: name,
            description: description,
            gender: gender,
            birthday: birthday,
            salary: salary,
            created_at: created_at
          },
          success: function(res) {
            const result = JSON.parse(res)
            if (result.status === 1) {
              loadData()
              //close modal
              $("#modalCreate").modal('hide')
            }
            // loadData()
            // //close modal
            // $("#modalCreate").modal('hide')
          },
          error: function(err) {
            console.error(err)
          }
        })
      })

      function loadData() {
        $.ajax({
          url: 'index.php?controller=employee&action=index',
          method: 'GET',
          success: function(res) {
            $("tbody").remove();
            $("table").append(res);
          },
          error: function(err) {
            console.error(err)
          }
        });
      }

      function createData(name, description, gender, birthday, salary, created_at) {

      }

      function deleteData(id) {
        loadData()
        $.ajax({
          url: 'index.php?controller=employee&action=delete'+ id,
          method: 'POST',
          data: {
            id: id
          },
          success: function(res) {
            console.log("it Work");
          },
          error: function(err) {
            console.error(err)
          }
        })
      }

      $("a[name='refresh']").click(function() {
        loadData()
      })

      $("a[name='delete']").click(function() {
        deleteData($employee['id']);
      })
    })
  </script>
</body>

</html>