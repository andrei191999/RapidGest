<?php
  session_start();

function setTime() {
  $_SESSION['poke'] = time();
}

//   if (isset($_SESSION['poke']) && time() - $_SESSION['poke'] > 10) {
//     require("includes/logout.inc.php");
//   } else {
//     $_SESSION['poke'] = time();
//  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Andrei Macovei">
    <meta name="author" content="Teodor-Avram Ciochirca">
    <meta name="application-name" content="RapidGest">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="includes/style.css" rel="stylesheet">
    <link href="humans.txt" rel="author" type="text/plain">
    <title>RapidGest</title>
    <script>
      setInterval(setTime(), 5000); 
    </script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">RapidGest</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-light" aria-current="page" href="home.php">Acas&#259;</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" aria-current="page" href="subscription.php">Abonamente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" target="_blank" href="codesInfo.php">List&#259; coduri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" target="_blank" href="PDF/GITD.pdf">Clasificare de&#351;euri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" target="_blank" href="PDF/law.pdf">Legisla&#355;ie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" aria-current="page" href="contact.php">Contact</a>
        </li>
      </ul>
      <?php
          if(isset($_SESSION["CUI"])) {
            if(isset($_SESSION["Type"]) && $_SESSION["Type"] == "Administrator" && !empty($_SESSION["Type"])){
              echo "<ul class=\"navbar-nav me-1 mb-2 mb-lg-0\">
              <li class=\"nav-item\">
                <a class=\"nav-link text-light\" href=\"instructions.php\">Instruc&#355;iuni</a>
              </li>
              <li class=\"nav-item\">
              <a href=\"userInfo.php\" class=\"nav-link text-light\">Caut&#259;</a>
              </li>
              <li class=\"nav-item\">
              <a href=\"includes/logout.inc.php\" class=\"nav-link text-light\">Ie&#351;ire</a>
              </li>
              </ul>";
            } else {
              echo "<ul class=\"navbar-nav me-1 mb-2 mb-lg-0\">
              <li class=\"nav-item\">
                <a class=\"nav-link text-light\" href=\"instructions.php\">Instruc&#355;iuni</a>
              </li>
              <li class=\"nav-item\">
                <a href=\"profile.php\" class=\"nav-link text-light\">Profil</a>
              </li>
              <li class=\"nav-item\">
              <a href=\"includes/logout.inc.php\" class=\"nav-link text-light\">Ie&#351;ire</a>
              </li>
              </ul>";
            }
          } else {
            echo "<ul class=\"navbar-nav mb-2 me-1 mb-lg-0\"><li class=\"nav-item ml-auto\"><a href=\"signup.php\" class=\"nav-link text-light\">&#206;nscriere</a></li>".
            "<li class=\"nav-item ml-auto\"><a href=\"login.php\" class=\"nav-link text-light\">Intr&#259;</a></li></ul>";
          }
      ?>
    </div>
  </div>
</nav>