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
  <title>Özgür Vurgun</title>
</head>

<body style="font-family:  'Raleway', sans-serif;padding-top:55px">

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" id="OzgurSize" href="panelgiris.php">Özgür V.</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav nav-pills nav-fill">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="aboutMe.php">Hakkımda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="photos.php">Galeri</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Projelerim
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="projects.php">Punch Engine (Yumruk Motoru)</a></li>
              <li><a class="dropdown-item disabled" href="#">Kuantum Sensörler</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.php">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">İletişim</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link active" href="IP.php">IP Adresin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="p-5 text-center homepage">
    <div class="container mt-5">
      <hr class="hrsetting"><i class="fa-solid fa-file-csv iconsetting"></i>
      <?php
      function GetIP()
      {
        if (getenv("HTTP_CLIENT_IP")) {
          $ip = getenv("HTTP_CLIENT_IP");
        } elseif (getenv("HTTP_X_FORWARDED_FOR")) {
          $ip = getenv("HTTP_X_FORWARDED_FOR");
          if (strstr($ip, ',')) {
            $tmp = explode(',', $ip);
            $ip = trim($tmp[0]);
          }
        } else {
          $ip = getenv("REMOTE_ADDR");
        }
        return $ip;
      }
      ?>
      <h1 align="center">IP Adresin</h1>
      <center>
        <p><?= $ip_adresi = GetIP(); ?></p>
      </center>
      <h1 align="center">🤪</h1>
      <br>
      <br>
      <br>
      <br><br>
      <br><br><br>

    </div>
  </section>

  <div class="text-center">
    <p class="align-middle p-4">
      <span>Tüm Hakları Saklıdır &copy; | 2022</span>
      <br>
      <span>Designer and Developer <b>ÖZGÜR VURGUN</b></span>
    </p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>