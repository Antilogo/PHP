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
      <h1>Sửa sinh viên <?php echo $_GET['id']; ?></h1>
    </div>
    
    <div>
      <button style="border: 1px solid black;" class="btn btn-light" type="button" name="cancel" onclick="history.go(-1)">Về trang danh sách</button>
    </div>

    <form action="index.php?controller=employee&action=update&id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">
        <label class="form-label" for="">Họ tên</label>
        <input class="form-control" type="text" name="name" value="<?php echo $employee['name']; ?>">
        <p id="error-name"></p>
      </div>
      <div class="form-group">
        <label class="form-label" for="">Tuổi</label>
        <input class="form-control" type="number" name="age" value="<?php echo $employee['age']; ?>">
        <p id="error-age"></p>
      </div>
      <div class="form-group">
        <label class="form-label" for="">Ảnh đại diện</label>
        <input class="form-control" type="file" name="avatar" value="<?php echo $employee['avatar']; ?>">
        <p id="error-avatar"></p>
      </div>
      <div class="form-group">
        <label class="form-label" for="">Mô tả sinh viên</label>
        <input class="form-control" class="form-control" type="textarea" name="description" value="<?php echo $employee['description']; ?>">
        <p id="error-description"></p>
      </div>
      <div class="form-group d-none">
        <label class="form-label" for="">Created_at</label>
        <input class="form-control" type="datetime" name="created_at" value="<?php echo $employee['created_at']; ?>" readonly>
      </div>

      <div class="form-group btn-ends d-flex justify-content-center">
        <div>
          <button id="submit" class="btn btn-primary" type="submit" name="submit">Save</button>
        </div>
        <div>
          </div>
            <button id="reset" class="btn btn-primary" name="reset">Reset</button>
          </div>
      </form>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
  <script>
    $(function() {
      $('#submit').click(function(e) {

        let has_error = false;

        $('#error-name').text('');
        $('#error-description').text('');
        $('#error-age').text('');
        $('#error-avatar').text('');

        $('#error-name').removeClass('alert alert-danger');
        $('#error-description').removeClass('alert alert-danger');
        $('#error-age').removeClass('alert alert-danger');
        $('#error-avatar').removeClass('alert alert-danger');

        let name = $("input[name='name']").val();
        let description = $("input[name='description']").val();
        let age = $("input[name='age']").val();
        let avatar = $("input[name='avatar']").val();
        
        if (name === "") {
          $('#error-name').addClass("alert alert-danger");
          $('#error-name').text('Trường họ tên không được để trống.');
          has_error = true;
        }
        if (description === "") {
          $('#error-description').addClass("alert alert-danger");
          $('#error-description').text('Trường mô tả không được để trống.');
          has_error = true;
        }
        if (avatar === "") {
          $('#error-avatar').addClass("alert alert-danger");
          $('#error-avatar').text('Trường ảnh đại diện không được để trống.');
          has_error = true;
        }
        if (inputIsBlank(age)) {
          $('#error-age').addClass("alert alert-danger");
          $('#error-age').text('Trường tuổi không được để trống.');
          has_error = true;
        }

        if (has_error === false) {
          $('form').unbind();
          $('form').submit();
        } else {
          e.preventDefault();
        }
      })

      $('#reset').click(function(e) {
        e.preventDefault();

        $("input[name='name']").val('');
        $("input[name='description']").val('');
        $("input[name='age']").val('');
        setTimeout(function() { 
          
        }, 2000);
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

</html>