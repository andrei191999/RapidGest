<?php
require("header.php");
require("includes/functions.inc.php");
?>

<div class="container-fluid pb-5 pb-2">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0">
      <div class="position-relative instructions">
        <div class="position-absolute top-50 start-50 translate-middle">
          <p class="display-1" style="text-shadow: 1px 1px 10px black; color: #fff;">Instruc&#355;iuni de utilizare</p>
        </div>
      </div>
    </div>
  </div>
</div>

    <?php if(isset($_SESSION["CUI"]) && !empty($_SESSION["CUI"]) && isset($_SESSION["Type"]) && $_SESSION["Type"] === "Utilizator" && !empty($_SESSION["Type"])) { ?>

  <div class="container-fluid">
    <div class="container mb-5">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0">
                <h4 class="display-5 text-center mb-3">Pentru func&#355;iile aplica&#355;iei, &#238;nt&#226;i trebuie s&#259; accesa&#355;i pagina de profil cu ajutorul butonului din bara de navigare sau din pagina principal&#259; intitulat "Profil".</h4>
                <hr>
            </div>
        </div>
    </div>

    <div class="container">
      <div class="row mb-5">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
              <div class="container">
                  <p class="text-center fs-1 fw-bold">Tabelele de gestiune</p>
                  <p class="fs-3">&#206;n pagina de profil ve&#355;i observa un total de 6 butoane albastre, dintre care 2 sunt desemnate pentru crearea tabelelor si 1 pentru crearea raportului de transport, iar celelalte 3 sunt desemnate pentru vizualizarea tabelelor. Butoanele sunt intitulate intuitiv pentru cursivitatea muncii.</p>
              </div>
          </div>
          
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
              <div class="container">
                  <p class="text-center fs-1 fw-bold">Codurile de&#351;eurilor</p>
                  <p class="fs-3">C&#226;nd va trebui s&#259; completa&#355;i un tabel de gestiune sau raport de transport, codurile pentru tipuri de de&#351;euri vor fi necesare. &#206;n bara de navigare este un buton intitulat "List&#259; coduri", care ap&#259;sat, va deschide o pagina web unde se afl&#259; toat&#259; informa&#355;ia necesar&#259; privind codurile.</p>
              </div>
          </div>
      </div>
    </div>

    <div class="container">
      <div class="row mb-5">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <div class="container-fluid">
            <h3 class="fs-1 mb-3 fw-bold text-decoration-underline">Crearea tabelelor de gestiune a de&#351;eurilor</h3>
            <p class="fs-3">Urm&#259;torii pa&#351;i trebuie urma&#355;i, &#238;n general, pentru crearea oric&#259;rui tip de tabel:</p>
            <ol>
              <li class="fs-4">Ap&#259;sarea butonolui corespunz&#259;tor tipului de tabel pe care dori&#355;i s&#259; &#238;l crea&#355;i.</li>
              <li class="fs-4">Introducerea perioadei OP&#354;IONAL.</li>
              <li class="fs-4">Completarea cu informa&#355;ii &#238;n c&#259;su&#355;ele libere.</li>
              <li class="fs-4">Ap&#259;sarea butonului corespunz&#259;tor pentru trimiterea formularului.</li>
            </ol>
            <p class="fs-3">Consider&#226;nd inten&#355;ia de a crea un tabel lunar, dup&#259; ap&#259;sarea butonului pentru crearea tabelului lunar, va trebui sa selecta&#355;i luna pentru care dori&#355;i s&#259; fie generat par&#355;ial tabelul lunar, dar trebuie s&#259; introduce&#355;i &#351;i anul corespunz&#259;tor, apoi ap&#259;sa&#355;i butonul intitulat "Generare tabel". Un tabel va fi generat, iar dumneavoastr&#259; pute&#355;i continua cu pa&#351;ii 2 si 3 men&#355;ionati mai sus.</p>
            <p class="fs-3">Consider&#226;nd inten&#355;ia de a crea un tabel anual, dup&#259; ap&#259;sarea butonului pentru crearea tabelului anual, acesta va fi generat automat, nefiind nevoie de ac&#355;iuni ulterioare.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row mb-5">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <div class="container-fluid">
            <h3 class="fs-1 mb-3 fw-bold text-decoration-underline">Vizualizarea tabelelor de gestiune a de&#351;eurilor</h3>
            <p class="fs-3">Urm&#259;torii pa&#351;i trebuie urma&#355;i, &#238;n general, pentru vizualizarea oric&#259;rui tip de tabel:</p>
            <ol>
              <li class="fs-4">Ap&#259;sarea butonolui corespunz&#259;tor tipului de tabel pe care dori&#355;i s&#259; &#238;l vizualiza&#355;i.</li>
              <li class="fs-4">Introducerea perioadei.</li>
              <li class="fs-4">Ap&#259;sarea butonolui corespunz&#259;tor vizualiz&#259;rii formularului.</li>
              <p class="fs-4">Formatul PDF poate sa fie generat de asemena dup&#259; afi&#351;area tabelului &#351;i se poate &#351;i desc&#259;rca dup&#259; ce s-a deschis fi&#351;ierul de tip PDF.</p>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row mb-5">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <div class="container-fluid">
            <h3 class="fs-1 mb-3 fw-bold text-decoration-underline">Schimbarea datelor contului</h3>
            <p class="fs-3">Urmatorii pa&#351;i trebuie urma&#355;i, &#238;n general, pentru vizualizarea oric&#259;rui tip de tabel:</p>
            <ol>
              <li class="fs-4">Accesa&#355;i pagina de profil prin intermediul butonului intitulat "Profil" din bara de navigare.</li>
              <li class="fs-4">Ap&#259;sarea butonolui corespunz&#259;tor schimb&#259;rii datelor.</li>
              <li class="fs-4">Introducerea noilor date.</li>
              <li class="fs-4">Ap&#259;sarea butonolui corespunz&#259;tor salv&#259;rii noilor date.</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
</div>

<?php
} 
if(isset($_SESSION["CUI"]) && !empty($_SESSION["CUI"]) && isset($_SESSION["Type"]) && $_SESSION["Type"] === "Administrator" && !empty($_SESSION["Type"])) { ?>

<div class="container pb-5">
  <div class="row pb-5">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0">
        <div class="container">
            <p class="fs-1 fw-bold text-decoration-underline">Utilizatori</p>
            <p class="fs-4">&#206;n partea dreapta a barii de navigare ve&#355;i observa un buton intitulat "Caut&#259; utilizatori", dup&#259; ap&#259;sarea butonului ve-&#355;i fi redirec&#355;ionat c&#259;tre o pagin&#259; unde cu ajutorul unui tabel pute&#355;i c&#259;uta utilizatori dup&#259; nume, adres&#259;, email sau codul CUI. De asemenea, utilizatorii pot sa fie sorta&#355;i ascendent sau descendent dup&#259; oricare dintre detaliile contului.</p>
            <p class="fs-4">Sub acest tabel se afl&#259; o bar&#259; &#238;n care pute&#355;i s&#259; introduce&#355;i codul CUI al utilizatorului pe care dori&#355;i s&#259; &#238;l verifica&#355;i, apoi dup&#259; ap&#259;sarea butonului de c&#259;utare ve-&#355;i fi redirec&#355;ionat c&#259;tre profilul acestuia.</p>
            <br>
            <p class="fs-1 fw-bold text-decoration-underline">Tabelele de gestiune a de&#351;eurilor</p>
            <p class="fs-4">Imediat ajuns pe pagina de profil a unui utilizator se pot observa 3 butoane cu titlu intuitiv func&#355;iei associate, mai exact, "Inspectare raport transport", "Inspectare tabel lunar" &#351;i "Inspectare tabel anual". Dup&#259; ap&#259;sarea butonului ve-&#355;i fi redirec&#355;ionat c&#259;tre o pagin&#259; unde trebuie s&#259; introduce&#355;i data respectiv&#259; tabelului ce &#238;l dori&#355;i afi&#351;at, apoi ap&#259;sa&#355;i butonul de afi&#351;re.</p>
            <p class="fs-4">Formatul PDF poate sa fie generat de asemena dup&#259; afi&#351;area tabelului &#351;i se poate &#351;i desc&#259;rca dup&#259; ce s-a deschis fi&#351;ierul de tip PDF.</p>
        </div>
    </div>
  </div>
</div>
<?php 
}
require("footer.php");
?>

<div class="container-fluid">
  <div class="row pb-4">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0">
      <div class="position-relative support">
        <div class="position-absolute top-50 start-50 translate-middle">
          <p class="display-3" style="text-shadow: 1px 1px 10px black; color: #fff;">Suportul nostru mereu</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0">
        <div class="container-fluid">
        <h3 class="fs-1 mb-3 fw-bold text-decoration-underline">Ajutor imediat!</h3>
        <p class="fs-3">Pentru orice problem&#259;, inconvenient, eroare sau neclaritate ne pute&#355;i contacta. &#206;n bara de navigare, exist&#259; un buton intitulat "Contact", care ap&#259;sat, v&#259; va redirec&#355;iona c&#259;tre o pagina web unde pute&#355;i completa un formular pentru a ne trimite un mail sau s&#259; accesa&#355;i datele noastre de contact pentru o viitoare interac&#355;iune.</p>
        </div>
      </div>
    </div>
  </div>
</div>