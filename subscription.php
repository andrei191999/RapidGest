<?php
    require("includes/functions.inc.php");
    require("header.php");
?>

<div class="container-fluid">
    
    <div class="row mt-4 pt-3 mb-4 pb-3">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-">
            <div class="container w-75">
                <h1 class="text-center">Abonamente</h1>
                <hr>
                <p class="lead">Folosirea serviciilor necesit&#259; o subscrip&#355;ie lunar&#259;. Mai jos sunt prezentate diferitele tipuri de abonamente. V&#259; rog alege&#355;i un tip de abonament, apoi efectua&#355;i plata. <br> <i>Not&#259;: plata se poate efectua doar dup&#259; ce v-a&#355;i logat in cont.</i></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-4 pt-3 mb-4 pb-3">
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-">
                <div class="card text-center">
                    <h5 class="card-header" style="background-color:gray;">Abonament lunar</h5>
                    <div class="card-body">
                        <h5 class="card-title">40&euro;/lun&#259;</h5>
                        <p class="card-text">
                            <ul class="text-start list-group list-group-flush">
                                <li class="list-group-item">comenzi procesate nelimitate</li>
                                <li class="list-group-item">actualizare permanenta a aplicatiei in conformitate cu prevederile legale</li>
                                <li class="list-group-item">acces nelimitat ca numar de utilizatori, numar de comenzi, volume de deseuri predate</li>
                                <li class="list-group-item">disponibilitate serviciu si suport tehnic nelimitat</li>
                                <li class="list-group-item">includere in baza de date a recipientilor newsletter-elor tehnice pentru deseuri</li>
                                <li class="list-group-item">pretul de baza este valabil pentru maxim 3 locatii de colectare (de exemplu: 3 farmacii, 3 depozite zonale, 3 magazine, 3 sucursale, etc)</li>
                            </ul>
                        </p>
                        <button class="btn btn-primary" <?php if(!isset($_SESSION["CUI"])) { echo "disabled"; } ?> onClick="pay(4000, 'Abonament lunar');">M&#259 abonez!</button>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-">
                <div class="card text-center">
                    <h5 class="card-header" style="background-color:DodgerBlue;">Abonament pe 3 luni</h5>
                    <div class="card-body">
                        <h5 class="card-title">110&euro; (mai putin de 40&euro;/lun&#259;)</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <button class="btn btn-primary" <?php if(!isset($_SESSION["CUI"])) { echo "disabled"; } ?> onClick="pay(11000, 'Abonament pe 3 luni');">M&#259 abonez!</button>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-">
                <div class="card text-center">
                    <h5 class="card-header" style="background-color:rgb(0, 174, 71);">Abonament pe un an</h5>
                    <div class="card-body">
                        <h5 class="card-title">350&euro; (mult mai putin de 40&euro;/lun&#259;</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <button class="btn btn-primary" <?php if(!isset($_SESSION["CUI"])) { echo "disabled"; } ?> onClick="pay(35000, 'Abonament pe un an');">M&#259 abonez!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</div>

<script src="https://sdk.paylike.io/10.js"></script>
<script src="includes/scripts/paylike.js"></script>

<?php
    require("footer.php");
?>