<?php
include('config.php'); //andmebaasi paroolid ja ühendus on teises failis
//päring
$paring = 'SELECT * FROM albumid';				//mysql käsk VALI kõik veerud TABELIST albumid
$valjund = mysqli_query($yhendus, $paring);		//mysql käsu saatmine andmebaasile
while($rida = mysqli_fetch_row($valjund)){		//vastus andmebaasist
    //var_dump($rida);
    echo '<strong>Album: '.$rida[1].' - '.$rida[2].'</strong><br>';
    echo 'Aasta: '.$rida[3].'<br>';
    echo 'Žanr: '.$rida[4].'<br><br>';
}
echo '<hr>';
$paring2 = 'SELECT artist, album FROM albumid ORDER BY artist';
$valjund = mysqli_query($yhendus, $paring2);
while($rida = mysqli_fetch_assoc($valjund)){
    echo $rida['artist'].' - '.$rida['album'].'<br>';
}
echo '<hr>';
$paring3 = 'SELECT artist, album FROM albumid WHERE aasta>2010';
$valjund = mysqli_query($yhendus, $paring3);
while($rida = mysqli_fetch_assoc($valjund)){
    echo $rida['artist'].' - '.$rida['album'].'<br>';
}
echo '<hr>';
$paring4 = 'SELECT COUNT(*) AS "Albumeid kokku", AVG(hind) AS "Keskmine hind", SUM(hind) AS "Kogu maksumus" FROM albumid';
$valjund = mysqli_query($yhendus, $paring4);
while($rida = mysqli_fetch_assoc($valjund)){
    printf("Keskmine hind: %0.2f eur<br>", $rida['Keskmine hind']);
    printf("Albumeid kokku: %d tk<br>", $rida['Albumeid kokku']);
    printf("Kogu maksumus: %0.2f eur<br>", $rida['Kogu maksumus']);
}
echo '<hr>';
$paring5 = 'SELECT album, aasta, MAX(aasta) AS "Kõige vanem" FROM albumid';
$valjund = mysqli_query($yhendus, $paring5);
while($rida = mysqli_fetch_assoc($valjund)){
    echo 'Kõige vanem album: '.$rida['aasta'].' - '.$rida['album'].'<br>';
}
echo '<hr>';

mysqli_free_result($valjund);
mysqli_close($yhendus);