<?php

session_start();
require_once '../connection/config.php';

if (isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $role = $_POST['role']; 

    $checkEmail = $connection->query("SELECT * FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows > 0){
        $_SESSION['register_error'] = 'Email is already registered';
        $_SESSION['active_form'] = 'register';
    } else {
        $connection->query("INSERT INTO users (name, email, pass, role) VALUES ('$name', '$email', '$pass', '$role')");
    }

    header("Location: register.php");
    exit();
}

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password']; 

    $result = $connection->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if (password_verify($pass, $user['pass'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            if ($user['role'] === 'teacher' ){
                header("Location: ../dasboard/admin_page.php");
            } else {
                header("Location: ../dasboard/user_page.php");
            }
            exit();
        }
    }

    $_SESSION['login_error'] = 'Incorrect email or password';
    header("Location: login.php");
    exit();
}

?>