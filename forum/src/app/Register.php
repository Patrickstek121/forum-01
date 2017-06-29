<?php

include_once "authentication.php";
include_once "head.php";
include_once "register_handler.php";

// wanneer je bent ingelogt kan die niet naar register.php
if( isset($_SESSION['username'])!="" ){
    header("Location: index.php");
    exit;
}


?>
    <link rel="stylesheet" href="../css/register.css" type="text/css">

    <form class="registreren" method="post">
        <?php if(isset($_SESSION['error'])): ?>
            <p class="message"><?= $_SESSION['error'] ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <p><h2>Registreren</h2></p>
        <label>Gebruikersnaam</label>
        <br>
        <input type="text" placeholder="username" name="username">
        <br>
        <label>E-mail</label>
        <br>
        <input type="email" placeholder="email" name="email">
        <br>
        <label>Wachtwoord</label>
        <br>
        <input type="password" placeholder="wachtwoord" name="password">
        <br>
        <label>Re-type wachtwoord</label>
        <br>
        <input type="password" placeholder="wachtwoord" name="conpassword">
        <br>
        <button type="submit" name="signupbtn" class="signupbtn">Registreren</button>

    </form>

<?php
include_once "foot.php";
