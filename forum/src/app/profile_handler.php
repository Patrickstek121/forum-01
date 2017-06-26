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
?>