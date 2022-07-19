<!DOCTYPE html>
<html lang="tr">

<head>
  <link rel="icon" href="image/icon.png" type="image/x-icon">
  <meta name="description" content="Özgür Vurgun' un kişisel web sitesi." />
  <link rel="stylesheet" type="text/css" href="meStyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google-site-verification" content="OjEh7WK4lQjpnG7YCYNG3k6TyDBsmunvKRvfOLHDVQY" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="google" content="sitelinkssearchbox" />
  <meta name="googlebot" content="index, follow" />
  <meta name="robots" content="index,follow">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/eb7367d676.js" crossorigin="anonymous"></script>
  <title>Admin Paneli</title>
  <style>
    #customers {
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

<body class="bg-light" style="font-family:  'Raleway', sans-serif;padding-top:55px">

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

      $sec = "Select * From iletisimtb ORDER BY id ASC";
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


  <section class="p-5 text-center homepage">
    <div class="container mt-5">
      <hr class="hrsetting"><i class="iconsetting">Blog Yazısı Yayınlama</i>

      <div class="row">
        <div class="col-md-6 mx-auto">

          <form  method="POST">
            <div class="mb-4">
              <label for="adSoyad" class="form-label"><b>Başlık</b></label>
              <input type="text" class="form-control" id="adSoyad" name="title" placeholder="" required>
            </div>
            <div class="mb-4 mt-3">
              <label for="mesaj" class="form-label"><b>İçerik</b> </label>
              <textarea class="form-control" id="mesaj" name="blogtext" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <button class="btn btn-success btn-lg mb-5">Gönder</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


  <?php
  include("baglanti.php");
  if (isset($_POST["title"], $_POST["blogtext"])) {
    $title = $_POST["title"];
    $blogtext = $_POST["blogtext"];
    $ekle = "INSERT INTO blogtb(title, blogtext) VALUES ('" . $title . "','" . $blogtext . "')";
    if ($baglan->query($ekle) === TRUE) {
      echo "<script>alert('Blog içeriğiniz başarı ile veri tabanına kayıt edildi :)')</script>";
    } else {
      echo "<script>alert('İçerik gönderilirken bir hata oluştu.')</script>";
    }
    echo "<script>window.location.href='blogexit.php'</script>";
  }


  ?>




  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>