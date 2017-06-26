<?php
require 'dbconnect.php';



if (isset($_POST['signupbtn'])) {
    $username = htmlentities( $_POST['username']);
    $email = htmlentities( $_POST['email']);
    $password = htmlentities( $_POST['password']);
    $conpassword = htmlentities( $_POST['conpassword']);
    if (!$username || !$password || !$email || !$conpassword) {
        $_SESSION['error'] = "Alle velden zijn verplicht";

    } elseif ($password != $conpassword) {
        $_SESSION['error'] = "De wachtwoorden komen niet overheen met elkaar";

    } else {
        $statement = $connect->prepare("SELECT username,email FROM users WHERE username = :username AND email = :email");
        $statement->execute([
            ':username' => $username,
            ':email' => $email

        ]);
        if ($statement->rowCount() > 0) {
            $_SESSION['error'] = "De ingevulde user is al in gebruik.";
        } else {
            $statement = $connect->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $statement->execute([
                ':username' => $username,
                ':password' => sha1($password),
                ':email' => $email
            ]);
            header("location: index.php");
        }
    }
}
