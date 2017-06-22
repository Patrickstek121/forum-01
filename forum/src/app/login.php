<?php

session_start();
include_once('authentication.php');
include_once "head.php";

// wanneer je bent ingelogt kan die niet naar inlog.php
if( isset($_SESSION['username'])!="" ){
    header("Location: index.php");
    exit;
}

?>


<link rel="stylesheet" href="../css/login.css" type="text/css">

<form class="signup" method="POST" action="login_handler.php">
    <?php if(isset($_SESSION['error'])): ?>
        <p class="message"><?= $_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <p><h2>Inloggen</h2></p>
    <label>Gebruikersnaam:</label>
    <input type="text" name="username">
    <br>
    <label>Password:</label>
    <br>
    <input type="password" name="password">
    <br>
    <button type="submit" name="loginbtn" class="loginbtn">Login</button>

</form>

<?php
include_once "foot.php";
