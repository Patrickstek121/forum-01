<?php
session_start();
include_once "authentication.php";
include_once "head.php";
include_once "profile_handler.php";
?>
 <!-- eigen stylesheet -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">

<section class="gegevens_wrapper">
    <section class="gegevens">
        <p>Uw gebruikers naam is: <?=$_SESSION['username']; ?></p>
        <p>Uw email is: <?=$_SESSION['email']; ?> </p>

    </section>
</section>







<?php
include_once "foot.php";
