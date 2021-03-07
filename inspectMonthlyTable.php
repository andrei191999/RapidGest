<?php
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

<div class="container mt-5">
    <form action=<?php echo "\"inspectMonthlyTable.php?searchCUI=".$searchCUI . "\""; ?> method="POST">
        <div class="mb-3">
                <label for="monthlyInput" class="form-label">Selecta&#355i luna<span class="text-danger">*</span></label>
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
        <div class="mb-3">
            <label for="yearInput" class="form-label">Introduce&#355i anul<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="yearInput" required>
        </div>
        <div class = "text-center">
            <input type="submit" class="btn btn-primary mb-2 mt-2 w-100" name="inspectMonthlyTable" value="Vizualizare tabel">
        </div>
        <?php
            if(isset($_POST["inspectMonthlyTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {    ?>
                <div class = "text-center">
                    <a class = "btn btn-info mb-2 mt-2 w-100" href="PDF/monthlyTablePDF.php" target="_blank">Vizualizare tabel in format PDF</a>
                </div>
        <?php } ?>
    </form>
</div>

<?php

if(isset($_POST["inspectMonthlyTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $year = test_input($_POST["yearInput"]);
    $month = $_POST["monthlyInput"];
    $monthYear = $month . "-" . $year;
    if (!existsMonthlyTable($conn, $monthYear, $searchCUI)) {
        echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"><strong>Atentie!</strong> Tabelul nu exista!</div>";
        exit();
    }

?>
    <div class="container-fluid mt-5" >
        <table class="table">
            <thead>
                <tr>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Nume produs</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Total unitati vandute</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Stare fizica</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Tip deseu generat</th>
                    <th colspan="4" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cantitate de deseuri</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Luna si an</th>
                </tr>
                <tr>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">generata</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">valorificata</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">eliminata final</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">ramasa in stoc</th>
                </tr>
            </thead>
            <tbody>
                <?php inspectMonthlyTable($conn, $monthYear, $searchCUI); ?>
            </tbody>
            <tfoot>
                <tr>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Nume produs</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Total unitati vandute</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Stare fizica</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Tip deseu generat</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">generata</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">valorificata</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">eliminata final</th>
                    <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">ramasa in stoc</th>
                    <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Luna si an</th>
                </tr>
                    <tr>
                        <th colspan="4" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cantitate de deseuri</th>
                    </tr>
            </tfoot>
        </table>
    </div>

<?php 
}} else {
    header("location: ./home.php?error=accessRestricted");
    exit();
}

if(isset($_GET["error"])) {
    if($_GET["error"] == "tableNotExists") {
        echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Tabelul lunar pentru aceasta luna nu a fost completat!</div>";
    } elseif($_GET["error"] == "stmtFailedSeeMonthly") {
        echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> Ne pare rau! Am intampinat o eroare. Va rugam incercati din nou.</div>";
    }
}
require("footer.php");
?>