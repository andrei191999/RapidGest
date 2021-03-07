<?php
require("header.php");
require("includes/functions.inc.php");
$arr = outputCodes($conn);
if(isset($_SESSION["Type"]) && !empty($_SESSION["Type"]) && $_SESSION["Type"] === "Administrator") {
    $searchCUI = test_input($_GET["searchCUI"]);

    if(isset($_POST["inspectAnualTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["yearPDF"] = test_input($_POST["yearAnual"]);
        $_SESSION ["trashCodePDF"] = test_input($_POST["trashCodeAnual"]);
        $_SESSION["cuiPDF"] = test_input($searchCUI);
    }
?>

<div class="container mt-5">
    <form action=<?php echo "\"inspectAnualTable.php?searchCUI=".$searchCUI . "\""; ?> method="POST">
        <div class="mb-3">
            <label for="yearAnual" class="form-label">Introduce&#355i anul<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="yearAnual" required>
        </div>
        <div class="mb-3">
            <label for="trashCodeAnual" class="form-label">Selectati tipul de deseu<span class="text-danger">*</span></label>
            <select name="trashCodeAnual" class="form-select">
                <option selected></option>
                <?php
                    foreach($arr as $value) {
                        echo "<option value=\"".$value."\">".$value."</option>";
                    }
                ?>
            </select>
        </div>
        <div class = 'text-center'>
            <input type="submit" class="btn btn-primary mb-2 mt-2 w-100" name="inspectAnualTable" value="Vizualizare tabel anual">
        </div>
        <?php 
            if(isset($_POST["inspectAnualTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") { ?>
                <div class = "text-center">
                    <a class = "btn btn-info mb-2 mt-2 w-100" href="PDF/anualTablePDF.php" target="_blank">Vizualizare tabel in format PDF</a>
                </div>
        <?php } ?>
    </form>
</div>

<?php

if(isset($_POST["inspectAnualTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $year = test_input($_POST["yearAnual"]);
    $trashCode = test_input($_POST["trashCodeAnual"]);
    if(!existsAnualTable($conn, $year, $searchCUI)){
        echo "IA LA MUIE CA NUIE";
        exit();
    }
?>

<div class="container-fluid mt-3" >
    <table class="table">
        <thead>
            <tr>
                <th colspan="1" rowspan="3" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Luna</th>
                <th colspan="4" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cantitate de deseuri</th>
            </tr>
            <tr>
                <th colspan="1" rowspan="2" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Generate</th>
                <th colspan="3" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">din care:</th>
            </tr>
            <tr>
                <th colspan="1" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">valorificata</th>
                <th colspan="1" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">eliminata final</th>
                <th colspan="1" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">ramasa in stoc</th>
            </tr>
        </thead>
        <tbody>
            <?php inspectAnualTable($conn, $year, $trashCode, $searchCUI); ?>
        </tbody>
    </table>
</div>

<?php
}}
// if(isset($_GET["error"])) {
//     if($_GET["error"] == "tableExists") {
//         echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Tabelul pentru aceasta luna a fost deja completat!</div>";
//     } elseif($_GET["error"] == "noDataForMonth") {
//         echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Nu a fost completat niciun un tabel zilnic pentru aceasta luna!</div>";
//     }
// }
require("footer.php");
?>