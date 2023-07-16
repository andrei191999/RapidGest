<?php
    require("header.php");
    require("includes/functions.inc.php");
    $users = getNumberOfUsers($conn);
    $waste = getNumberOfWasteGenerated($conn);
?>


<div class="container-fluid pb-3">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0 pb-3">
    <div class="position-relative primul">
      <div class="position-absolute top-50 start-50 translate-middle text-center">
        <p class="lead fs-1 fw-bolder text-center" style="text-shadow: 1px 1px 10px black; color: #fff;">RapidGest</p>
        <p class="lead fs-4 fw-bold" style="text-shadow: 1px 1px 10px black; color: #fff;">Rapiditate &#351;i eficient&#259; la un click distan&#355;&#259;</p>
        <?php
          if(isset($_SESSION["CUI"]) && !empty($_SESSION["CUI"]) && isset($_SESSION["Type"]) && !empty($_SESSION["Type"])) {
            if($_SESSION["Type"] === "Utilizator") {
              echo "<a href=\"profile.php\" class=\"btn btn-dark fs-4\">Profil</a>";
            } elseif($_SESSION["Type"] === "Administrator") {
              echo "<a href=\"userInfo.php\" class=\"btn btn-dark fs-4\">Caut&#259; utilizatori</a>";
            }
          } else {
            echo "<a href=\"login.php\" class=\"btn btn-dark  fs-4\">Intr&#259;</a>";
          }
        ?>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="container pb-3 pt-1">
  <div class="row">
    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-">
      <?php
        if(isset($_SESSION["CUI"]) && !empty($_SESSION["CUI"])) {
          if($row = cuiExists($conn, $_SESSION["CUI"])) {
            $name = $row["Nume"];
            echo "<div class=\"container\">
              <div class=\"alert alert-success alert-dismissible fade show container text-center\" role=\"alert\">
                <strong>Bine ai venit, $name!</strong> Cu ce te putem ajuta azi?
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
              </div>
            </div>";
          }
        }
      ?>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pb-3">
      <div class="container">
        <div class="card text-center" >
          <div class="card-body">
            <h3 class="card-title fw-bold">Clien&#355;i</h3>
            <h5 class="card-title">Num&#259;rul total de utilizatori</h5>
            <hr>
            <p class="card-text">De la crearea aplica&#355;iei s-au &#238;nscris <?php if($users>19) {echo $users . " de ";} else {echo $users;} ?> agen&#355;i economici.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pb-3">
      <div class="container">
        <div class="card text-center">
        <div class="card-body">
            <h3 class="card-title fw-bold">Reziduuri</h3>
            <h5 class="card-title">Num&#259;rul total de de&#351;euri</h5>
            <hr>
            <p class="card-text">Cu ajutorul aplica&#355;iei noastre s-au generat <?php if($waste>19) {echo $waste . " de ";} else { if($waste>0){echo $waste;} else {echo 0;}} ?> de&#351;euri.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid p-0 pb-3">
  <div class="parallax">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="position-absolute top-50 start-50 translate-middle">
          <p class="lead fs-2" style="text-shadow: 2px 2px 7px black; color: #fff;">Cu pu&#355;in&#259; creativitate p&#226;n&#259; &#351;i de&#351;eurile pot deveni piese de art&#259;, iar tu po&#355;i fi artistul.</p>
        </div>
    </div>
  </div>
        </div>
</div>

<div class="container-fluid pt-3 pb-3">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
      <figure class="text-center">
        <blockquote class="blockquote">
          <div class="container">
          <p><span class="fs-3">"Oamenii nu mo&#351;tenesc p&#259;m&#226;ntul de la str&#259;mo&#351;ii lor, ci &#238;l &#238;mprumut&#259; de la copii.</span><span class="fs-3"> Ofer&#259;-le descenden&#355;ilor t&#259;i un p&#259;m&#226;nt mai pur dec&#226;t cel pe care l-ai primit."</span></p>
          </div>
        </blockquote>
        <figcaption class="blockquote-footer fs-4">
          Proverb vechi amerindian.
        </figcaption>
      </figure>
    </div>
  </div>
</div>

<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0">
      <div class="position-relative wadafaq">
        <div class="position-absolute top-50 start-50 translate-middle">
          <p class="lead fs-2" style="text-shadow: 1px 1px 10px black; color: #fff;">Anual 100 de milioane de animale mor doar din cauza plasticului... Al&#259;tur&#259;-te nou&#259; &#351;i ajut&#259; la combaterea acestei probleme.</p>
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

<div class="container pb-3">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="text-center">
        <h2 class="fs-1">Contacteaz&#259;-ne!</h2>
        <hr>
        <p class="lead fs-4">Pentru orice &#238;ntreb&#259;ri sau nel&#259;muriri, nu ezita&#355;i sa ne contacta&#355;i. Suntem disponibili &#238;ntre orele normale de func&#355;ionare, adic&#259; intervalul orar 09:00 - 17:00. Echipa noastr&#259; va face tot posibilul s&#259; v&#259; r&#259;spund&#259; c&#226;t mai rapid posibil!</p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12 cols-lg-12 col-md-12 col-sm-12">
      <form action="includes/contact.inc.php" method="POST">
        <div class="form-group pb-2">
          <label class="pb-1" for="nameContact">Nume dumneavoastr&#259;</label>
          <input type="text" class="form-control" name="nameContact">
        </div>
        <div class="form-group pb-2">
          <label class="pb-1" for="emailContact">Emailul dumneavoastr&#259;</label>
          <input type="email" class="form-control" name="emailContact">
        </div>
        <div class="form-group pb-2">
          <label class="pb-1" for="subjectContact">Subiectul emailului</label>
          <input type="text" class="form-control" name="subjectContact">
        </div>
        <div class="form-group pb-3">
          <label class="pb-1" for="messageContact">Mesajul emailului</label>
          <textarea class="form-control" name="messageContact" rows="4" ></textarea>
        </div>
        <button type="submit" name="sendEmail" class="btn btn-dark text-center w-100">Trimite</button>
      </form>
    </div>
  </div>
</div>

<?php
    require("footer.php");
?>