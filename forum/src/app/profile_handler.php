<?php
include 'dbconnect.php';

if (isset($_SESSION['username'])) {
    $statement_gegevens = $connect->prepare("SELECT * FROM users WHERE username = :username");
    $statement_gegevens->execute([
        ':username' => $_SESSION['username']
    ]);

    if ($statement_gegevens->rowCount() >0) {

        $gegevens_row = $statement_gegevens->fetch();

        $_SESSION['email'] = $gegevens_row['email'];
    }
}

if (isset($_POST['wijzig_email_btn'])) {
    $wijzig_email = htmlentities($_POST['wijzig_email']);

    if (!$wijzig_email) {
        $_SESSION['error'] = "Vul een email in.";
    } else {
        $check_wijzig_email = $connect->prepare('select * from users where email = :wijzig_email');
        $check_wijzig_email->execute([
            ':wijzig_email' =>$wijzig_email
        ]);
        if ($check_wijzig_email->rowCount() >0) {
            $_SESSION = 'Email is al in gebruik.';
        } else {
            $updateemail = $connect->prepare('UPDATE users SET email = :wijzig_email WHERE username = :current_username');
            $updateemail->execute([
                ':wijzig_email' =>$wijzig_email,
                ':current_username' => $_SESSION['username']
            ]);
        }
    }
}

if (isset($_POST['wijzig_password_btn'])) {
    $wijzig_password = htmlentities($_POST['wijzig_password']);

    if (!$wijzig_password) {
        $_SESSION['error'] = "Vul een nieuwe wachtwoord in.";
    } else {
        $update_password = $connect->prepare('UPDATE users SET password = :wijzig_password WHERE username = :current_username');
        $update_password->execute([
            ':wijzig_password' =>sha1($wijzig_password),
            ':current_username'=> $_SESSION['username']
        ]);
    }
}
?>