<?php include('config.php'); ?>
<?php
if (!empty($_GET['artist']) && !empty($_GET['album']) && !empty($_GET['aasta']) &&  !empty($_GET['hind']) ) {
    $artist = htmlspecialchars(trim($_GET['artist']));
    $album = htmlspecialchars(trim($_GET['album']));
    $aasta = htmlspecialchars(trim($_GET['aasta']));
    $hind = htmlspecialchars(trim($_GET['hind']));
    //päring
    $paring = "INSERT INTO albumid(artist,album,aasta,hind) VALUES ('".$artist."','".$album."','".$aasta."','".$hind."')";
    $valjund = mysqli_query($yhendus, $paring);
    //päringu vastuste arv
    $tulemus = mysqli_affected_rows($yhendus);
    if ($tulemus == 1) {
        echo "Kirje edukalt lisatud";
    } else {
        echo "Kirjet ei lisatud";
    }
    //ühenduse sulgemine
    mysqli_close($yhendus);
}
?>
<h2>Uue albumi lisamine</h2>
<form action="" method="get">
    <table>
        <tr><td>Artist: </td><td><input type="text" name="artist" required></td></tr>
        <tr><td>Album:</td><td> <input type="text" name="album" required></td></tr>
        <tr><td>Aasta: </td><td><input type="number" name="aasta" value="2000" min="1900" max="2099" required></td></tr>
        <tr><td>Hind: </td><td><input type="number" name="hind" value="1" min="1" max="100" step="0.1" required></td></tr>
        <tr><td><input type="reset" value="Tühjenda"></td><td><input type="submit" value="LISA ALBUM"></td></tr>
    </table>
</form>