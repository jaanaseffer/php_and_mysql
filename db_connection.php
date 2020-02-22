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
//päring
$paring = '
	SELECT 
	AVG(hind) AS "Keskmine hind",
	COUNT(*) AS "Albumeid kokku" 
	FROM albumid
';
//mysql käsu saatmine andmebaasile
$valjund = mysqli_query($yhendus, $paring);
//väljastamine
while($rida = mysqli_fetch_assoc($valjund)){
    printf("Keskmine hind: %0.2f eur<br>", $rida['Keskmine hind']);
    printf("Albumeid kokku: %d tk<br>", $rida['Albumeid kokku']);
}
echo '<hr>';

//dünaamilised päringud
if (!empty($_GET['otsi'])) {
    //kasutaja tekst vormist
    $otsi = $_GET['otsi'];
    $otsi = htmlspecialchars(trim($otsi));
    //päring
    $paring = 'SELECT * FROM albumid WHERE artist LIKE "%'.$otsi.'%"';
    $valjund = mysqli_query($yhendus, $paring);
    //päringu vastuste arv
    $tulemusi = mysqli_num_rows($valjund);

    echo 'Otsingusõna: '.$otsi.'<br>';
    echo 'Vastused: <br>';
    if ($tulemusi == 0) {
        echo "Leiti 0 vastust!";
    }
    while($rida = mysqli_fetch_assoc($valjund)){
        echo $rida['artist'].' - '.$rida['album'].' - '.$rida['aasta'].'<br>';
    }
    mysqli_free_result($valjund);
    mysqli_close($yhendus);
}
?>
<form method="get" action="">
    Otsing <input type="text" name="otsi">
    <input type="submit" value="otsi...">
</form>

