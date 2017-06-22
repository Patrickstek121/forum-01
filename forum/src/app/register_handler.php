<?php
session_start();
require 'dbconnect.php';

$message = false;

if (isset($_POST['signupbtn'])) {
    $username = htmlentities($_POST['username']);
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $conpassword = htmlentities($_POST['conpassword']);
    if (!$username || !$password || !$email || !$conpassword) {
        $message = "Alle invoer velden zijn verplicht";

    } elseif ($password != $conpassword) {
        $message = "De wachtwoorden komen niet overheen met elkaar";

    } else {
        $statement = $connect->prepare("SELECT * FROM users WHERE username = :username AND email = :email");
        $statement->execute([
            ':username' => $username,
            ':email' => $email

        ]);
        if ($statement->rowCount() > 0) {
            $message = "De ingevulde user is al in gebruik.";
        } else {
            $statement = $connect->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $statement->execute([
                ':username' => $username,
                ':password' => sha1($password),
                ':email' => $email
            ]);
            header("location: login.php");
        }
    }
}
