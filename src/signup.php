<?php
session_start();
include('classes/DB.php');
include('classes/User.php');
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['signup_msg'] = "*Please fill all fields";
        header('location:signupF.php');
    } else {
        $user1 = new User($username, $email, $password, $role, $status);
        $user1->addUser($user1);
    }
}
