<?php

class Employee
{
  public function connect()
  {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'quanlysinhvien';

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
      die("Connection failed");
    }
    return $conn;
  }

  public function all($search)
  {

    $sql = "SELECT * FROM students WHERE name LIKE '%$search%'";
    $result = $this->connect()->query($sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);

  }

  public function pageDivision($search, $perPage, $offset)
  {
    $sql = "SELECT * FROM students WHERE name LIKE '%$search%' LIMIT $perPage OFFSET $offset";
    $result = $this->connect()->query($sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  public function create($request)
  {
    $name = $request['name'];
    $description = $request['description'];
    $age = $request['age'];
    $avatar = $request['avatar'];
    $created_at = $request['created_at'];

    $sql = "INSERT INTO students(name, description, age, avatar, created_at) VALUES ('$name', '$description', $age , '$avatar', '$created_at')";
    return $this->connect()->query($sql);
  }

  public function find($id)
  {
    $sql = "SELECT * FROM students WHERE id=$id";
    $result = $this->connect()->query($sql);
    return mysqli_fetch_assoc($result);
  }

  public function update($request, $id)
  {
    $name = $request['name'];
    $description = $request['description'];
    $age = $request['age'];
    $avatar = $request['avatar'];
    $created_at = $request['created_at'];

    $sql = "UPDATE students SET name = '$name', description = '$description', age = '$age', avatar = '$avatar', created_at = '$created_at' WHERE id = $id";
    return $this->connect()->query($sql);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM students WHERE id= $id";
    return $this->connect()->query($sql);
  }
}
