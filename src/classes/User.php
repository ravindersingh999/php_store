<?php
session_start();
include('classes/DB.php');
class User extends DB
{
    public $username;
    public $email;
    public $password;
    public $role;
    public $status;

    public function __construct($username, $email, $password, $role, $status)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->status = $status;
    }

    public function addUser($user1)
    {
        $stmt = DB::getInstance()->prepare("SELECT email from users");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultArray = $stmt->fetchAll();

        foreach ($resultArray as $key => $value) {
            if ($value['email'] == $this->email) {
                $_SESSION['signup_msg'] = "*Alreay exists";
                header('location:signupF.php');
                return;
            }
        }
        DB::getInstance()->exec("Insert INTO users(username, email, password, role, status) VALUES('$this->username','$this->email','$this->password', 'user', 'restricted')");
        $_SESSION['signup_msg'] = "Added Successfully";
        header('location:signupF.php');
    }

    public function userExists()
    {
        $stmt = DB::getInstance()->prepare("SELECT email, password,role,status FROM users WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
    
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($result as $key => $value) {
            if ($value['email'] == $this->email && $value['password'] == $this->password && $value['role'] == 'admin' && $value['status'] == 'approved') {
                header('location:dashboard.php');
                exit(0);
            } elseif ($value['email'] == $this->email && $value['password'] == $this->password && $value['role'] == 'user' && $value['status'] == 'restricted') {
                $_SESSION['login_msg'] = "Permission pending";
                header('location:loginF.php');
                exit(0);
            } elseif ($value['email'] == $this->email && $value['password'] == $this->password && $value['role'] == 'user' && $value['status'] == 'approved') {
                header('location:shop.php');
                exit(0);
            }
        }
        header('location:loginF.php');
    }
}
