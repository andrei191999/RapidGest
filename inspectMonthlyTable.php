<?php
require_once("includes/auth.inc.php");
require("header.php");
require("includes/functions.inc.php");

if(isset($_SESSION["Type"]) && !empty($_SESSION["Type"]) && $_SESSION["Type"] === "Administrator") {
    $searchCUI = test_input($_GET["searchCUI"]);

    if(isset($_POST["inspectMonthlyTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

        $year = test_input($_POST["yearInput"]);
        $month = $_POST["monthlyInput"];
        $_SESSION["lunaAnPDF"] = test_input($month . "-" . $year);
        $_SESSION["cuiPDF"] = test_input($searchCUI);
}
?>

<div class="container pt-5">
    <form action=<?php echo "\"inspectMonthlyTable.php?searchCUI=".$searchCUI . "\""; ?> method="POST">
        <div class="pb-3">
                <label for="monthlyInput" class="form-label">Selecta&#355;i luna<span class="text-danger">*</span></label>
                <select class="form-select" name = "monthlyInput" required>
                    <option selected></option>
                    <option value = "01">Ianuarie</option>
                    <option value = "02">Februarie</option>
                    <option value = "03">Martie</option>
                    <option value = "04">Aprilie</option>
                    <option value = "05">Mai</option>
                    <option value = "05">Iunie</option>
                    <option value = "07">Iulie</option>
                    <option value = "08">August</option>
                    <option value = "09">Septembrie</option>
                    <option value = "10">Octombrie</option>
                    <option value = "11">Noiembrie</option>
                    <option value = "12">Decembrie</option>
                </select>
        </div>
        <div class="pb-3">
            <label for="yearInput" class="form-label">Introduce&#355;i anul<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="yearInput" required>
        </div>
        <div class = "text-center">
            <input type="submit" class="btn btn-primary pb-2 mt-2 w-100" name="inspectMonthlyTable" value="Vizualizare tabel">
        </div>
    </form>
</div>

<?php

if(isset($_POST["inspectMonthlyTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $year = test_input($_POST["yearInput"]);
    $month = $_POST["monthlyInput"];
    $monthYear = $month . "-" . $year;
    if (!existsMonthlyTable($conn, $monthYear, $searchCUI)) {
        echo "<div class = \"alert alert-warning mt-3 container\" style = \"text-align: center\"><strong>Aten&#355;ie!</strong> Tabelul nu exist&#259;!</div>";
        exit();
    }
?>
        <div class = "container text-center">
            <a class = "btn btn-info pb-2 mt-2 w-100" target="_blank" href="PDF/monthlyTablePdf.php">Vizualizare tabel &#238;n format PDF</a>
        </div>

    <div class="container-fluid pt-5" style="overflow-x: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cod de&#351;eu generat</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Tip de&#351;eu generat (material)</th>
                    <th colspan="4" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cantitate de de&#351;euri</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Unitate de m&#259;sur&#259;</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Luna si an</th>
                </tr>
                <tr>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Generat&#259;</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Valorificat&#259;</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Eliminat&#259; final</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Ramas&#259; in stoc</th>
                </tr>
            </thead>
            <tbody>
                <?php inspectMonthlyTable($conn, $monthYear, $searchCUI); ?>
            </tbody>
            <tfoot>
                <tr>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cod de&#351;eu generat</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Tip de&#351;eu generat (material)</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Generat&#259;</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Valorificat&#259;</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Eliminat&#259; final</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Ramas&#259; in stoc</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Unitate de m&#259;sur&#259;</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Luna si an</th>
                </tr>
                <tr>
                    <th colspan="4" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cantitate de de&#351;euri</th>
                </tr>
            </tfoot>
        </table>
    </div>

<?php 
}
} else {
    header("location: ./home.php?error=accessRestricted");
    exit();
}

require("footer.php");
?>