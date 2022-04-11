<?php

require('./Models/Employee.php');

class EmployeeController
{
  public function index()
  {
    $employee = new Employee();

    if (isset($_SESSION['messageCreated'])) {
      echo $_SESSION['messageCreated'];

      unset($_SESSION['messageCreated']);
    }

    if (isset($_SESSION['messageUpdated'])) {
      echo $_SESSION['messageUpdated'];

      unset($_SESSION['messageUpdated']);
    }

    if (isset($_SESSION['messageDeleted'])) {
      echo $_SESSION['messageDeleted'];

      unset($_SESSION['messageDeleted']);
    }

    if (
      isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      strcasecmp($_SERVER['HTTP_X_REQUESTED_WITH'], 'xmlhttprequest') == 0
    ) {
      $employees = $employee->all();
      return require('./Views/employee/data.php');
    }

    $employees = $employee->all();
    require('./Views/employee/index.php');
  }

  public function create()
  {
    $errors = [];
    require('./Views/employee/create.php');
  }

  public function store()
  {
    $errors = [];

    if (strlen($_POST['name']) === 0) {
      $errors['name'] = "Trường name không được để trống.";
    }
    if (strlen($_POST['description']) === 0) {
      $errors['description'] = "Trường description không được để trống.";
    }
    if (strlen($_POST['salary']) === 0) {
      $errors['salary'] = "Trường salary không được để trống.";
    }
    if (strlen($_POST['birthday']) === 0) {
      $errors['birthday'] = "Trường birthday không được để trống.";
    }

    if (count($errors) === 0) {
      $employee = new Employee();
      $isSuccess = $employee->create($_POST);

      //là xhr request thì đổ data dưới dạng json vào file view
      if (
        isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strcasecmp($_SERVER['HTTP_X_REQUESTED_WITH'], 'xmlhttprequest') == 0
      ) {
        if ($isSuccess) {
          //nếu thêm mới thành công thì trả về status là 1
          echo json_encode(['status' => 1]);
        } else {
          echo json_encode(['status' => 0, 'data' => $errors]);
        }
        return;
      }

      if ($isSuccess) {
        $_SESSION['messageCreated'] = 'Thêm mới nhân viên thành công.';

        header('location:index.php?controller=employee&action=index');
      }
    }

    require('./views/employee/create.php');
  }

  public function edit()
  {
    $id = $_GET['id'];
    $employee = new Employee();
    $employee = $employee->find($id);
    require('./Views/employee/edit.php');
  }

  public function update()
  {
    $id = $_GET['id'];
    $employee = new Employee();
    $isUpdated = $employee->update($_REQUEST, $id);
    if ($isUpdated) {
      $_SESSION['messageUpdated'] = 'Cập nhật nhân viên thành công.';

      header('location:index.php?controller=employee&action=index');
    }
  }

  public function delete()
  {
    $errors = [];
    $id = $_GET['id'];
    $employee = new Employee();
    $isDeleted = $employee->delete($id);

    // if (
    //   isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    //   strcasecmp($_SERVER['HTTP_X_REQUESTED_WITH'], 'xmlhttprequest') == 0
    // ) {
    //   if ($isDeleted) {
    //     return json_encode(['status' => 1]);
    //   } else {
    //     return json_encode(['data' => $errors]);
    //   }
    // }

    if ($isDeleted) {
      $_SESSION['messageDeleted'] = 'Xóa nhân viên nhân viên thành công.';

      header('location:index.php?controller=employee&action=index');
    }
  }

  public function information()
  {
    $id = $_GET['id'];
    $employee = new Employee();
    $employee = $employee->find($id);
    require('./Views/employee/information.php');
  }
}
