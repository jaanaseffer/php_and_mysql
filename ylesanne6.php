<?php include('config.php'); ?>
<?php
$user = htmlspecialchars(trim($_GET['user']));
$pass = htmlspecialchars(trim($_GET['pass']));
$sool = 'taiestisuvalinetekst';
$kryp = crypt($pass, $sool);
$paring = "INSERT INTO kasutajad(kasutaja,parool) VALUES ('".$user."','".$kryp."')";
$valjund = mysqli_query($yhendus, $paring);
$tulemus = mysqli_affected_rows($yhendus);
if ($tulemus == 1) {
    echo "Kirje edukalt lisatud";
} else {
    echo "Kirjet ei lisatud";
}
//ühenduse sulgemine
mysqli_close($yhendus);
?>
<h1>Lisa kasutaja</h1>
<form action="" method="get">
    Kasutajanimi: <input type="text" name="user"><br>
    Parool: <input type="password" name="pass"><br>
    <input type="submit" value="Lisa">
</form>