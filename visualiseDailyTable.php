<?php 
require("header.php");
require("includes/functions.inc.php");

if(isset($_POST["visualiseDailyTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["datePDF"] = test_input($_POST["date"]);
    $_SESSION["cuiPDF"] = test_input($_SESSION["CUI"]);
}
?>

<div class="container mt-5">
    <form action="visualiseDailyTable.php" method="POST">
        <div class="mb-3">
            <label for="date">Introduceti data</label>
            <input type="date" class="form-control" name="date">
        </div>
        <div class = "text-center">
            <input type="submit" class="btn btn-primary mb-2 mt-2 w-100" name="visualiseDailyTable" value="Vizualizare tabel">
        </div>
        <?php 
            if(isset($_POST["visualiseDailyTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") { ?>
                <div class = "text-center">
                    <a class = "btn btn-info mb-2 mt-2 w-100" href="PDF/dailyTablePDF.php" target="_blank">Vizualizare tabel in format PDF</a>
                </div>
        <?php } ?>
    </form>
</div>

<?php

if(isset($_POST["visualiseDailyTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $date = test_input($_POST["date"]);
    if (!checkDailyTable($conn, $date)) {
        header("location: ./visualiseDailyTable.php?error=tableNotExists");
        exit();
    }

?>
<div class="container-fluid mt-5" >
    <table class="table">
        <thead>
            <tr>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Nume produs</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Stare fizica</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Unitati vandute</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">NUCGUD</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Tip deseu generat</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cantitate deseu generata</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Unitati masura</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Data creare</th>
            </tr>
        </thead>
        <tbody>
            <?php seeDailyTable($conn, $date) ?>
        </tbody>
        <tfoot>
            <tr>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Nume produs</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Stare fizica</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Unitati vandute</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">NUCGUD</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Tip deseu generat</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cantitate deseu generata</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Unitati masura</th>
                <th scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Data creare</th>
            </tr>
        </tfoot>
    </table>
</div>

<?php 
}

if(isset($_GET["error"])) {
    if($_GET["error"] == "tableNotExists") {
        echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Tabelul zilnic pentru aceasta zi nu a fost completat!</div>";
    } elseif($_GET["error"] == "stmtFailedSeeMonthly") {
        echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> Ne pare rau! Am intampinat o eroare. Va rugam incercati din nou.</div>";
    }
}



require("footer.php");