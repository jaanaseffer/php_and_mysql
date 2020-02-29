<?php include('config.php'); ?>
<?php
$paring = "SELECT arved.arve_nr, albumid.artist, albumid.album
			FROM arved
			JOIN albumid ON arved.albumid_id=albumid.id";
$valjund = mysqli_query($yhendus, $paring);
while($rida = mysqli_fetch_assoc($valjund)){
    echo 'Arve number: '.$rida['arve_nr'].'<br>';
    echo 'Toote nimetus: '.$rida['artist'].'-'.$rida['album'].'<br><br>';
}
mysqli_free_result($valjund);
mysqli_close($yhendus);
?>