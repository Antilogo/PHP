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

    $perPage = 6;
    //Tinh so trang
    $currentPage = empty($_GET['page']) ? 1 : $_GET['page']; // kiem tra tren url co rong ko.
    $search = empty($_GET['search']) ? "" : $_GET['search'];
    $offset = ($currentPage - 1) * $perPage;
    $totalEmployees = $employee->all($search);
    $totalPage = ceil(count($totalEmployees) / $perPage);

    $employees = $employee->pageDivision($search, $perPage, $offset);

    require('./Views/employee/index.php');
  }

  public function create()
  {
    require('./Views/employee/create.php');
  }

  public function store()
  {
    $employee = new Employee();
    $isSuccess = $employee->create($_REQUEST);

    if ($isSuccess) {
      $_SESSION['messageCreated'] = 'Thêm mới nhân viên thành công.';

      header('location:index.php?controller=employee&action=index');
    }
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
    $id = $_GET['id'];
    $employee = new Employee();
    $isDeleted = $employee->delete($id);
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
