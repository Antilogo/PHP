<?php

class User
{
    public function connect()
    {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'bt1';

        $conn = mysqli_connect($host, $username, $password, $database);
        return $conn;
    }

    public function all()
    {
        $query = "SELECT * FROM employee";
        //Từ DB
        $sql = $this->connect()->query($query);

        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }

    public function create($request)
    {
        $Name = $request['Name'];
        $Description = $request['Description'];
        $Salary = $request['Salary'];
        $Gender = $request['Gender'];
        $Birthday = $request['Birthday'];
        $sql = "INSERT INTO employee(Name,Description,Salary,Gender,Birthday) VALUES ('$Name','$Description','$Salary','$Gender','$Birthday')";
        return $this->connect()->query($sql);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM employee WHERE id = $id";
        $result = $this->connect()->query($sql);
        return mysqli_fetch_assoc($result);
    }

    public function update($request, $id)
    {
        $Name = $request['Name'];
        $Description = $request['Description'];
        $Salary = $request['Salary'];
        $Gender = $request['Gender'];
        $Birthday = $request['Birthday'];
        $sql = "UPDATE employee SET Name='$Name', Description='$Description', Salary='$Salary', Gender='$Gender', Birthday='$Birthday' WHERE id = $id";
        return $this->connect()->query($sql); //$conn->query()
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM employee WHERE id = $id";
        return $this->connect()->query($sql);
    }
}
