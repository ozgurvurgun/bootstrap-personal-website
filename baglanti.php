<?php
$vt_sunucu="localhost";
$vt_kullanici="database-user";
$vt_sifre="user-password";
$vt_adi="database-name";
$baglan=mysqli_connect($vt_sunucu, $vt_kullanici, $vt_sifre, $vt_adi);
if (!$baglan) {
    die("Veritabanına bağlanılamadı.".mysqli_connect_error());
}
?>