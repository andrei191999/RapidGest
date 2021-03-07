<?php 
require("header.php");
require("includes/functions.inc.php");

if(isset($_SESSION["Type"]) && !empty($_SESSION["Type"]) && $_SESSION["Type"] === "Administrator") {
    $searchCUI = test_input($_GET["searchCUI"]);

    if(isset($_POST["inspectDailyTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["datePDF"] = test_input($_POST["date"]);
        $_SESSION["cuiPDF"] = test_input($searchCUI);
    }
?>

<div class="container mt-5">
    <form action=<?php echo "\"inspectDailyTable.php?searchCUI=".$searchCUI . "\""; ?> method="POST">
        <div class="mb-3">
            <label for="date">Introduceti data</label>
            <input type="date" class="form-control" name="date">
        </div>
        <div class = "text-center">
            <input type="submit" class="btn btn-primary mb-2 mt-2 w-100" name="inspectDailyTable" value="Inspectare tabel">
        </div>
        <?php 
            if(isset($_POST["inspectDailyTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") { ?>
                <div class = "text-center">
                    <a class = "btn btn-info mb-2 mt-2 w-100" href="PDF/dailyTablePDF.php"  target="_blank">Vizualizare tabel in format PDF</a>
                </div>
        <?php } ?>
    </form>
</div>

<?php

    if(isset($_POST["inspectDailyTable"]) && $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["date"])) {
        $date = test_input($_POST["date"]);
        if (!existsDailyTable($conn, $date, $searchCUI)) {
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
            <?php inspectDailyTable($conn, $date, $searchCUI); ?>
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
}} else {
    header("location: ./home.php?error=accessRestricted");
    exit();
}

if(isset($_GET["error"])) {
    if($_GET["error"] == "tableNotExists") {
        echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Tabelul zilnic pentru aceasta zi nu a fost completat!</div>";
    } elseif($_GET["error"] == "stmtFailedSeeMonthly") {
        echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> Ne pare rau! Am intampinat o eroare. Va rugam incercati din nou.</div>";
    }
}



require("footer.php");