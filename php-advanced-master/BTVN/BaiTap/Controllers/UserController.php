<?php

require('./Models/User.php');

class UserController
{
    public function index()
    {
        $user = new User();
        $users = $user->all();
        require('./Views/user/index.php');
    }

    public function create()
    {
        require('./Views/user/create.php');
    }

    public function store()
    {
        $user = new User();
        $isSuccess = $user->create($_REQUEST);
        if ($isSuccess) {
            header('location:index.php?controller=user&action=index');
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $user = new User();
        $user = $user->find($id);
        require('./Views/user/edit.php');
    }

    public function update()
    {
        $id = $_GET['id'];
        $user = new User();
        $isUpdated = $user->update($_REQUEST, $id);
        if ($isUpdated) {
            header('location:index.php?controller=user&action=index');
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $user = new User();
        $isDeleted = $user->delete($id);
        if ($isDeleted) {
            header('location:index.php?controller=user&action=index');
        }
    }
}
