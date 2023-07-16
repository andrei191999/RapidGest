<?php
    require_once("includes/auth.inc.php");
    require("header.php");
    require("includes/functions.inc.php");

    if(isset($_POST["visualiseMonthlyTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

        $year = test_input($_POST["yearInput"]);
        $month = $_POST["monthlyInput"];
        $_SESSION["lunaAnPDF"] = test_input($month . "-" . $year);
        $_SESSION["cuiPDF"] = test_input($_SESSION["CUI"]);
    }

    if(isset($_GET["error"]) || isset($_GET["warning"])) {
        echo "<div class=\"mt-3 pt-2 container\">";
        $error = $_GET["error"];
        switch ($error) {
            case "stmtFailedSeeMonthly":
                echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFSMONTHLY\".</div>";
                break;
            case "stmtFailedMonthlyPDF":
                echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFMONTHLYPDF\".</div>";
                break;
        }

        $warning = $_GET["warning"];
        switch ($warning) {
            case "emptyInput":
                echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Completa&#355;i toate c&#226;mpurile obligatorii.</div>";
                break;
        }
    }
    echo "</div>";

?>

<div class="container pt-4">
    <form action="visualiseMonthlyTable.php" method="POST">
        <div class="mb-3">
                <label for="monthlyInput" class="form-label">Selecta&#355i luna<span class="text-danger">*</span></label>
                <select class="form-select" name = "monthlyInput" required>
                    <option selected></option>
                    <option value = "01">Ianuarie</option>
                    <option value = "02">Februarie</option>
                    <option value = "03">Martie</option>
                    <option value = "04">Aprilie</option>
                    <option value = "05">Mai</option>
                    <option value = "06">Iunie</option>
                    <option value = "07">Iulie</option>
                    <option value = "08">August</option>
                    <option value = "09">Septembrie</option>
                    <option value = "10">Octombrie</option>
                    <option value = "11">Noiembrie</option>
                    <option value = "12">Decembrie</option>
                </select>
        </div>
        <div class="mb-3">
            <label for="yearInput" class="form-label">Introduce&#355i anul<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="yearInput" required>
        </div>
        <div class = "text-center">
            <input type="submit" class="btn btn-primary mb-2 mt-2 w-100" name="visualiseMonthlyTable" value="Vizualizare tabel">
        </div>
    </form>
</div>

<?php

if(isset($_POST["visualiseMonthlyTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $year = test_input($_POST["yearInput"]);
    $month = test_input($_POST["monthlyInput"]);
    
    if(empty($year) || empty($month)) {
        header("location: ./visualiseMonthlyTable.php?warning=emptyInput");
        exit();
    }

    $monthYear = $month . "-" . $year;

    if (!checkMonthlyTable($conn, $monthYear)) {
        echo "<div class=\" container\">";
        echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Nu exist&#259; acest tabel.</div>";
        echo "</div>";
        exit();
    }
    
?>
    <div class = "container text-center">
        <a class = "btn btn-info mb-2 mt-2 w-100" target="_blank" href="PDF/monthlyTablePdf.php">Vizualizare tabel &#238;n format PDF</a>
    </div>
    <div class="container-fluid pt-5" >
        <div style="overflow-x: auto;">
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
                        <?php seeMonthlyTable($conn, $monthYear) ?>
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
    </div>

<?php 
    }
    require("footer.php");
?>