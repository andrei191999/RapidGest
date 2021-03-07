<?php
    require("header.php");
    require("includes/functions.inc.php");
    $users = getNumberOfUsers($conn);
    $waste = getNumberOfWasteGenerated($conn);
?>

<div class="container-fluid mb-3">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0 mb-3">
    <div class="position-relative primul">
      <div class="position-absolute top-50 start-50 translate-middle text-center">
        <p class="lead fs-1 fw-bolder text-center" style="text-shadow: 1px 1px 10px black; color: #fff;">RapidGest</p>
        <p class="lead fs-4 fw-bold" style="text-shadow: 1px 1px 10px black; color: #fff;">Gestiunea rapid&#259; si eficient&#259; a de&#351;eurilor adus&#259; la un click distan&#355;&#259;</p>
        <?php
          if(isset($_SESSION["CUI"]) && !empty($_SESSION["CUI"])) {
            echo "<a href=\"profile.php\" class=\"btn btn-primary fs-4\">Profil</a>";
          } else {
            echo "<a href=\"login.php\" class=\"btn btn-primary  fs-4\">Intr&#259;</a>";
          }
        ?>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="container mb-5 mt-5">
  <div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-3">
      <div class="container">
        <div class="card text-center" >
          <div class="card-body">
            <h3 class="card-title fw-bold">Clien&#355;i</h3>
            <h5 class="card-title">Num&#259;rul total de utilizatori</h5>
            <hr>
            <p class="card-text">De c&#226;nd am &#238;nceput misiunea noastr&#259; s-au &#238;nscris <?php if($users>19) {echo $users . " de ";} else {echo $users;} ?> agen&#355;i economici.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-3">
      <div class="container">
        <div class="card text-center">
        <div class="card-body">
            <h3 class="card-title fw-bold">Reziduuri</h3>
            <h5 class="card-title">Num&#259;rul total de de&#351;euri</h5>
            <hr>
            <p class="card-text">Cu ajutorul aplica&#355;iei noastre s-au generat <?php if($waste>19) {echo $waste . " de ";} else {echo $waste;} ?> de&#351;euri.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid p-0">
  <div class="parallax">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="position-absolute top-50 start-50 translate-middle">
          <p class="lead fs-2" style="text-shadow: 1px 1px 10px black; color: #fff;">Daca plasticele ar ave...</p>
        </div>
    </div>
  </div>
        </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
      <figure class="text-center">
        <blockquote class="blockquote">
          <div class="container">
          <p><span class="fs-3">"Oamenii nu mo&#351;tenesc p&#259;m&#226;ntul de la str&#259;mo&#351;ii lor, ci &#238;l &#238;mprumut&#259; de la copii.</span><span class="fs-3">Ofer&#259;-le descenden&#355;ilor t&#259;i un p&#259;m&#226;nt mai pur dec&#226;t cel pe care l-ai primit."</span></p>
          </div>
        </blockquote>
        <figcaption class="blockquote-footer fs-4">
          Proverb vechi amerindian.
        </figcaption>
      </figure>
    </div>
  </div>
</div>

<div class="container-fluid mb-3">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
      <div class="position-relative wadafaq">
        <div class="position-absolute top-50 start-50 translate-middle">
          <p class="lead fs-2" style="text-shadow: 1px 1px 10px black; color: #fff;">Anual 100 de milioane de animale maritime mor doar din cauza plasticului, iar aceste statistici se refer&#259; doar la animalele pe care le g&#259;sim... al&#259;tur&#259;-te nou&#259; &#351;i ajut&#259; la combaterea acestei probleme.</p>
          <?php
            if(!isset($_SESSION["CUI"]) && empty($_SESSION["CUI"])) {
              echo "<a href=\"signup.php\" class=\"btn btn-outline-dark fs-5\">&#206;nregistrare</a>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <div class="container-fluid mb-3">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
      <div class="position-relative pula">
        <div class="position-absolute top-50 start-50 translate-middle">
          <p class="lead fs-2" style="text-shadow: 1px 1px 10px black; color: #fff;">Daca plasticele ar avea o lume, asa ar arata addictii de heroina...</p>
        </div>
      </div>
    </div>
  </div>
</div> -->



<div class="container">
  <div class="row mb-4">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">'
      <div class="text-center">
        <h2 class="fs-1">Contacteaz&#259;-ne!</h2>
        <hr>
        <p class="lead fs-4">Pentru orice &#238;ntreb&#259;ri sau nel&#259;muriri, nu ezita&#355;i sa ne contacta&#355;i. Suntem disponibili &#238;ntre orele normale de func&#355;ionare, adic&#259; intervalul orar 09:00 - 17:00. Echipa noastr&#259; va face tot posibilul s&#259; v&#259; r&#259;spund&#259; c&#226;t mai rapid posibil!</p>
      </div>
    </div>
  </div>
</div>

<div class="container mb-4">
  <div class="row">
    <div class="col-xl-12 cols-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
      <form action="includes/contact.inc.php" method="POST">
        <div class="form-group mb-2">
          <label for="nameContact">Nume</label>
          <input type="text" class="form-control" name="nameContact" placeholder="Introduce&#355;i-v&#259; numele dumneavoastr&#259;">
        </div>
        <div class="form-group mb-2">
          <label for="emailContact">Email</label>
          <input type="email" class="form-control" name="emailContact" placeholder="Introduce&#355;i adresa de email la care v&#259; putem contacta">
        </div>
        <div class="form-group mb-2">
          <label for="subjectContact">Subiect</label>
          <input type="text" class="form-control" name="subjectContact" placeholder="Introduce&#355;i subiectul emailului">
        </div>
        <div class="form-group mb-2">
          <label for="messageContact">Mesaj</label>
          <textarea class="form-control" name="messageContact" rows="4" placeholder="Introduce&#355;i mesajul emailului"></textarea>
        </div>
        <button type="submit" name="sendEmail" class="btn btn-primary text-center w-100">Trimite <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg></button>
      </form>
    </div>
  </div>
</div>

<?php
    require("footer.php");
?>