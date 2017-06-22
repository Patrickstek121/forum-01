<?php
session_start();
require 'dbconnect.php';


if(isset($_POST['loginbtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$username || !$password){
        $_SESSION['error'] = "Alle velden zijn verplicht";
    } else{
        $statement = $connect->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $statement->execute([
            ':username' => $username,
            ':password' => sha1($password)
        ]);

        if($statement->rowCount() > 0) {

            $row = $statement->fetch();

            if ($row['role'] == 1) {
                $_SESSION['is_admin'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];

                header('location: index.php');
                exit(0);

            } else {
                $_SESSION['is_admin'] = false;
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];

                header('location: index.php');
                exit(0);
            }

        } else {
            $_SESSION['error'] = 'Username en password zijn onjuist';
        }
    }

    header('Location: login.php');
}









