<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    .btn-ends {
      margin-top: 20px
    }

    .btn-ends div {
      display: inline-block;
      margin-right: 10px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="logo">
      <h1>Create Record</h1>
    </div>

    <form action="index.php?controller=employee&action=store" method="POST">
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
      <div class="form-group btn-ends">
        <div>
          <button id="submit" class="btn btn-primary" type="submit" name="submit">Create</button>
        </div>
        <div>
          <button style="border: 1px solid black;" class="btn btn-light" type="button" name="cancel" onclick="history.go(-1)">Cancel</button>
        </div>
      </div>
    </form>
  </div>


  <!-- JavaScript Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script>
    $(function() {
      $('#submit').click(function(e) {

        let has_error = false;

        $('#error-name').text('');
        $('#error-description').text('');
        $('#error-birthday').text('');
        $('#error-salary').text('');

        $('#error-name').removeClass('alert alert-danger');
        $('#error-description').removeClass('alert alert-danger');
        $('#error-birthday').removeClass('alert alert-danger');
        $('#error-salary').removeClass('alert alert-danger');

        let name = $("input[name='name']").val();
        let description = $("input[name='description']").val();
        let birthday = $("input[name='birthday']").val();
        let salary = $("input[name='salary']").val();
        
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
      })
    })

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
  </script>

</body>

</html>