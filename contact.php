<?php
    require("header.php");
?>

<div class="container">
  <div class="row mb-5">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
      <div class="text-center">
        <h2 class="fs-1">Contacteaz&#259;-ne!</h2>
        <hr>
        <p class="lead fs-4">Pentru orice &#238;ntreb&#259;ri sau nel&#259;muriri, nu ezita&#355;i sa ne contacta&#355;i. Suntem disponibili &#238;ntre orele normale de func&#355;ionare, adic&#259; &#238;n intervalul orar 09:00 - 17:00. Echipa noastr&#259; va face tot posibilul s&#259; v&#259; r&#259;spund&#259; c&#226;t mai rapid posibil!</p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 p-0 mb-2">
        <div class="container text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
            </svg>
            <br>
            <p class="lead">07xx xxx xxx</p>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 p-0 mb-2">
        <div class="container text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
            </svg>
            <br>
            <p class="lead">La ma-ta-n pizda</p>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 p-0 mb-2">
        <div class="container text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
            </svg>
            <br>
            <p class="lead">adresa@mail.com</p>
        </div>
    </div>
  </div>
</div>

<div class="container mt-5 mb-4">
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