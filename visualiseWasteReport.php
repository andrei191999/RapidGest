<?php
require_once("includes/auth.inc.php");
require("header.php");
require("includes/functions.inc.php");

if(isset($_SESSION["Type"]) && !empty($_SESSION["Type"]) && $_SESSION["Type"] === "Administrator") {
    $searchCUI = test_input($_GET["searchCUI"]);
} elseif(isset($_SESSION["Type"]) && !empty($_SESSION["Type"]) && $_SESSION["Type"] === "Utilizator") {
    $searchCUI = $_SESSION["CUI"];
}
if(isset($_POST["visualiseWasteReport"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $date = test_input($_POST["reportDate"]);
}

if(isset($_GET["error"]) || isset($_GET["warning"])) {
    echo "<div class=\"mt-3 pt-2 container\">";
    
    $warning = $_GET["warning"];
    switch ($warning) {
        case "emptyInput":
            echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Completa&#355;i toate c&#226;mpurile obligatorii.</div>";
            break;
    }

    $error = $_GET["error"];
    switch ($error) {
        case "stmtFailedSeeWasteReport":
            echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFSEEWASTE\".</div>";
            break;
    }
    echo "</div>";
}

?>

<div class="container pt-4">
    <form action=<?php echo "\"visualiseWasteReport.php?searchCUI=".$searchCUI."\"";?> method="POST">
        <div class="mb-3">
                <label for="reportDate" class="form-label">Selecta&#355i ziua pentru care doriti sa vedeti rapoartele<span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="reportDate" required>
        </div>
        <div class = "text-center">
            <input type="submit" class="btn btn-primary mb-2 mt-2 w-100" name="visualiseWasteReport" value="Vizualizare raport transport">
        </div>
    </form>
</div>

<?php

if(isset($_POST["visualiseWasteReport"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $date = test_input($_POST["reportDate"]);

    if(empty($date) || empty($searchCUI)) {
        echo "<div class=\"container\">";
        echo "<div class = \"alert alert-warning mt-3 container\" style = \"text-align: center\"><strong>Atentie!</strong> Va rugam competati toate campurile obligatorii!</div>";
        echo "</div>";
        exit();
    }

    if (!checkWasteTable($conn, $date, $searchCUI)) {
        echo "<div class=\"container\">";
        echo "<div class = \"alert alert-warning mt-3 container\" style = \"text-align: center\"><strong>Atentie!</strong> Nu a fost completat nici un tabel pentru aceast&#259; zi!</div>";
        echo "</div>";
        exit();
    }

?>

    <div class = "text-center">
        <a class = "btn btn-info mb-2 mt-2 w-100" target="_blank" href=<?php echo "\"PDF/wasteReportPdf.php?searchCUI=".$searchCUI."&date=".$date."\"";?>>Vizualizare tabel &#238;n format PDF</a>
    </div>

    <div class="container-fluid mt-3" style="overflow-x:auto;">
        <table class="table">
            <thead style="background-color:#91c291;color:#0b570b;">
                <tr>
                    <th colspan="1" rowspan="3" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cod deseu</th>
                    <th colspan="4" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cantitate de deseuri</th>
                    <th colspan="1" rowspan="3" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Documente de transport</th>
                </tr>
                <tr>
                    <th colspan="1" rowspan="2" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Totala</th>
                    <th colspan="1" rowspan="2" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Ramasa in stoc</th>
                    <th colspan="2" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">predata:</th>
                </tr>
                <tr>
                    <th colspan="1" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">valorificata</th>
                    <th colspan="1" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">eliminata</th>
                </tr>
            </thead>
            <tbody>
                <?php echo seeWasteReport($conn, $searchCUI, $date); ?>
            </tbody>
            <tfoot style="background-color:#91c291;color:#0b570b;">
                <tr>
                    <th colspan="1" rowspan="3" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cod deseu</th>
                    <th colspan="1" rowspan="2" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Totala</th>
                    <th colspan="1" rowspan="2" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Ramasa in stoc</th>
                    <th colspan="1" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">valorificata</th>
                    <th colspan="1" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">eliminata</th>
                    <th colspan="1" rowspan="3" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Documente de transport</th>
                </tr>
                <tr>
                    <th colspan="2" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">predata:</th>
                </tr>
                <tr>
                    <th colspan="4" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cantitate de deseuri</th>
                </tr>
            </tfoot>
        </table>
    </div>

<?php 
    }
    require("footer.php");
?>