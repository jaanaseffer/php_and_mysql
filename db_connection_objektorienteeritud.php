<?php

//***objektorjenteeritud***//
//sinu andmed
include('config.php'); //andmebaasi paroolid ja ühendus on teises failis
//päring
$paring = 'SELECT * FROM albumid';
$valjund = $yhendus->query($paring);
//väljund
while ($rida = $valjund->fetch_row()) {
    var_dump($rida);
}
//ühenduste sulgemine
$yhendus->close();
?>
