<?php


$servernaam = "localhost";
$usernaam = "root";
$wachtwoord = "";
$database = "forum_league";

try {
    $connect = new PDO("mysql:host=$servernaam;dbname=$database", $usernaam, $wachtwoord);
    // Error als het niet is gelukt of wel gelukt
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

?>
