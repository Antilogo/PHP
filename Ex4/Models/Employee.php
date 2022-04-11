<?php

class Employee
{
  public function connect()
  {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'bt1';

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
      die("Connection failed");
    }
    return $conn;
  }

  public function all()
  {

    // $sql = "SELECT * FROM employee WHERE name LIKE '%$search%'";
    // $result = $this->connect()->query($sql);
    // return mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql = "SELECT * FROM employee";
    $result = $this->connect()->query($sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  public function pageDivision($search, $perPage, $offset)
  {
    $sql = "SELECT * FROM employee WHERE name LIKE '%$search%' LIMIT $perPage OFFSET $offset";
    $result = $this->connect()->query($sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  public function create($request)
  {
    $name = $request['name'];
    $description = $request['description'];
    $gender = $request['gender'];
    $salary = $request['salary'];
    $birthday = $request['birthday'];
    $created_at = $request['created_at'];

    $sql = "INSERT INTO employee(name, description, gender, salary, birthday, created_at) VALUES ('$name', '$description', $gender , $salary, '$birthday', '$created_at')";
    return $this->connect()->query($sql);
  }

  public function find($id)
  {
    $sql = "SELECT * FROM employee WHERE id=$id";
    $result = $this->connect()->query($sql);
    return mysqli_fetch_assoc($result);
  }

  public function update($request, $id)
  {
    $name = $request['name'];
    $description = $request['description'];
    $gender = $request['gender'];
    $salary = $request['salary'];
    $birthday = $request['birthday'];
    $created_at = $request['created_at'];

    $sql = "UPDATE employee SET name = '$name', description = '$description', gender = '$gender', salary = $salary, birthday = '$birthday', created_at = '$created_at' WHERE id = $id";
    return $this->connect()->query($sql);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM employee WHERE id= $id";
    return $this->connect()->query($sql);
  }
}
