<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container">

    <h1>Create Record</h1>

    <form method="POST" action="index.php?controller=user&action=store">
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" class="form-control" placeholder="" aria-describedby="helpId">
            <p id="error-Name"></p>
            
        </div>

        <div class="form-group">
            <label for="Description">Description</label>
            <input type="text" name="Description" id="Description" class="form-control" placeholder="" aria-describedby="helpId">
            <p id="error-Description"></p>
        </div>

        <div class="form-group">
            <label for="Salary">Salary</label>
            <input type="text" name="Salary" id="Salary" class="form-control" placeholder="" aria-describedby="helpId">
            <p id="error-Salary"></p>
        </div>

        <div>
        <label for="Gender">Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1">
          <label class="form-check-label" for="flexRadioDefault1">
            Nam
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2" checked>
          <label class="form-check-label" for="flexRadioDefault2">
            Nu
          </label>
        </div>
        </div>

        <div class="form-group">
            <label for="Birthday">Birthday</label>
            <input type="date" name="Birthday" id="Birthday" class="form-control" placeholder="" aria-describedby="helpId">
            <p id="error-Birthday"></p>
        </div>

        <button class="btn btn-primary" id="submit" type="submit" name="submit">Create</button>
        <button type="button" class="btn btn-primary" onclick="history.go(-1)">Back</button>
    </form>

  </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>

  $(function() {
    $('#submit').click(function(e) {
      let has_error = false;

      $('#error-Name').text('');
      $('#error-Description').text('');
      $('#error-Salary').text('');
      $('#error-Gender').text('');
      $('#error-Birthday').text('');

      $('#error-Name').removeClass('alert alert-danger');
      $('#error-Description').removeClass('alert alert-danger');
      $('#error-Salary').removeClass('alert alert-danger');
      $('#error-Gender').removeClass('alert alert-danger');
      $('#error-Birthday').removeClass('alert alert-danger');

      let Name = $("input[name='Name']").val();
      let Description = $("input[name='Description']").val();
      let Salary = $("input[name='Salary']").val();
      let Gender = $("input[name='Gender']").val();
      let Birthday = $("input[name='Birthday']").val();

      if (Name === "") {
        $('#error-name').addClass("alert alert-danger");
        $('#error-name').text('Trường birthday không được để trống.');
        has_error = true;
      }
      if (Description === "") {
        $('#error-Description').addClass("alert alert-danger");
        $('#error-Description').text('Trường birthday không được để trống.');
        has_error = true;
      } 
      if (Salary === "") {
        $('#error-Salary').addClass("alert alert-danger");
        $('#error-Salary').text('Trường birthday không được để trống.');
        has_error = true;
      } 
      if (Gender === "") {
        $('#error-Gender').addClass("alert alert-danger");
        $('#error-Gender').text('Trường birthday không được để trống.');
        has_error = true;
      } 
      if (Birthday === "") {
        $('#error-Birthday').addClass("alert alert-danger");
        $('#error-Birthday').text('Trường birthday không được để trống.');
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
</script>
</html>