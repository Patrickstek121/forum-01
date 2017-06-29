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
        <form class="profiel" method="POST">
        <h2>Uw gegevens:</h2>
        <p>Uw gebruikers naam is: <?=$_SESSION['username']; ?></p>
        <p>Uw email is: <?=$_SESSION['email']; ?> </p>
        <input type="email" name="wijzig_email" class="wijzig_email" placeholder="wijzig email">
        <button type="submit" name="wijzig_email_btn" class="wijzig_email_btn">Wijzig</button>
        <p>Wijzig u password</p>
        <input type="password" name="wijzig_password" class="wijzig_password" placeholder="wijzig password">
            <button type="submit" name="wijzig_password_btn" class="wijzig_password_btn">Wijzig</button>
</form>
    </section>
</section>







<?php
include_once "foot.php";
