<?php
include("classes/DB.php");
include("classes/User.php");
if (isset($_POST['change'])) {
    $status = $_POST['status'];
    $email = $_POST['email'];
    // print_r($_POST);

    if ($status == "restricted") {
        $sql = DB::getInstance()->prepare("UPDATE users SET status = 'approved' where email = '$email'");
        $sql->execute();
        $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
    } elseif ($status == "approved") {
        $sql = DB::getInstance()->prepare("UPDATE users SET status = 'restricted' where email = '$email'");
        $sql->execute();
        $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
    }
    
} elseif (isset($_POST['delete'])) {
    $email = $_POST['email'];
    $sql = DB::getInstance()->prepare("DELETE FROM users where email = '$email'");
    $sql->execute();
    $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
}
header('location:dashboard.php');
