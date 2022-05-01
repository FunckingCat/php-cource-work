<?php

    session_start();

    include_once 'database.php';
    include_once 'get_data.php';

    $type = $_POST['type'];
    $username = $_POST['username'];
    $login = $_POST['email'];
    $pswd= $_POST['password'];

    if ($type == 'reg')
    {
        if (exec_query('SELECT * FROM Users WHERE email = ' . add_quotes($login))->num_rows > 0)
            header('Location: ../index.php');
        else
        {
            addUser($username, $login, $pswd);
            $_SESSION['userId'] = exec_query('SELECT * FROM Users WHERE email = ' . add_quotes($login))->fetch_assoc()['id'];
            $_SESSION['username'] = $username;
            $_SESSION['login'] = $login;
            header('Location: ../search.php');
        }
    }
    else
    {

    }
//    header('Location: ../search.php');