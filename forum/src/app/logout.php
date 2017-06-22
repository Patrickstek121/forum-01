<?php

session_start();

if(isset($_SESSION['id']))
    unset($_SESSION['id']);

if(isset($_SESSION['username']))
    unset($_SESSION['username']);

session_destroy();

header('Location: login.php');
