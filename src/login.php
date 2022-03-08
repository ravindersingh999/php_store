<?php
session_start();
require_once('classes/User.php');
if (isset($_POST['signin'])) {
    $user2 = new User("", $_POST['email'], $_POST['password'], "", "");
    $user2->userExists();

    $_SESSION['username'] = $user->username;
    $_SESSION['email'] = $user->email;
    $_SESSION['password'] = $user->password;

}
