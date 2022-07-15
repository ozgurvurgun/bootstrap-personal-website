<!DOCTYPE html>
<html lang="tr">

<head>
  <title>Admin Paneli</title>
  <meta charset="UTF-8">
  <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
  </style>
</head>

<body>

  <center>
    <h1 style="color: red;">İletişim Tablosu</h1>
  </center>

  <table id="customers">
    <tr>
      <th>ID</th>
      <th>Ad Soyad</th>
      <th>Email</th>
      <th>Telefon</th>
      <th>Konu</th>
      <th>Mesaj</th>
      <th>Tarih</th>
    </tr>


    <?php
    session_start();
    if ($_SESSION["user"] == "") {
      echo "<script>window.location.href='cikis.php'</script>";
    } else {
      echo "<center><h2>Kullanıcı Adınız : " . $_SESSION['user'] . "</h2></center>";
      echo " <center><a href='cikis.php'><h2>ÇIKIŞ YAP</h2></a><br><br></center>";
      include("baglanti.php");

      $sec = "Select * From iletisimtb";
      $sonuc = $baglan->query($sec);

      if ($sonuc->num_rows > 0) {
        while ($cek = $sonuc->fetch_assoc()) {
          $date = explode("-", $cek['tarih']);
          $newdate = implode(" ", $date);
          $newdate_two = explode(":", $newdate);
          $newdate_three = implode(" ", $newdate_two);
          $newdate_four = explode(" ", $newdate_three);
          echo "
    
         <tr>
            <td>" . $cek['ID'] . "</td>
            <td>" . $cek['adsoyad'] . "</td>
            <td>" . $cek['mail'] . "</td>
            <td>" . $cek['telefon'] . "</td>
            <td>" . $cek['konu'] . "</td>
            <td>" . $cek['mesaj'] . "</td>
            <td>" . $newdate_four[2] . "-" . $newdate_four[1] . "-" . $newdate_four[0] . "  " . $newdate_four[3] . ":" . $newdate_four[4] . ":" . $newdate_four[5] . "</td>
         </tr>
    
         ";
        }
      } else {
        echo "<center><h3>Veritabanında kayıtlı veri bulunamadı.</h3></center>";
      }
    }
    ?>
  </table>

</body>

</html>