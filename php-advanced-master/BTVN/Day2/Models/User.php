<?php

class User
{
    public function connect()
    {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'mvc';

        $conn = mysqli_connect($host, $username, $password, $database);
        return $conn;
    }

    public function all()
    {
        $query = "SELECT * FROM users";
        //Từ DB
        $sql = $this->connect()->query($query);

        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }

    public function create($request)
    {
        $firstName = $request['first_name'];
        $lastName = $request['last_name'];
        $sql = "INSERT INTO users(first_name, last_name) VALUES ('$firstName','$lastName')";
        return $this->connect()->query($sql);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $this->connect()->query($sql);
        return mysqli_fetch_assoc($result);
    }

    public function update($request, $id)
    {
        $firstName = $request['first_name'];
        $lastName = $request['last_name'];
        $sql = "UPDATE users SET first_name='$firstName', last_name='$lastName' WHERE id = $id";
        return $this->connect()->query($sql); //$conn->query()
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = $id";
        return $this->connect()->query($sql);
    }
}
