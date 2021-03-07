<?php
    require("header.php");
    require("includes/functions.inc.php");
?>

<div class="container mt-5">
    <form action="generateAnualTable.php" method="POST">
    <div class="mb-3">
        <label for="yearAnual" class="form-label">Introduce&#355i anul<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="yearAnual" required>
    </div>
    <div class = "text-center">
        <input type="submit" class="btn btn-primary mb-2 mt-2 w-100" name="generateAnualTable" value="Generare tabel anual">
    </div>
</div>

<?php

    if(isset($_POST["generateAnualTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $year = test_input($_POST["yearAnual"]);
        if(checkAnualTable($conn, $year)){
            header("location: ./generateAnualTable.php?error=tableExists");
            exit();
        }
        getMonthlyTableData($conn, $year);
    }
    // if(isset($_GET["error"])) {
    //     if($_GET["error"] == "tableExists") {
    //         echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Tabelul pentru aceasta luna a fost deja completat!</div>";
    //     } elseif($_GET["error"] == "noDataForMonth") {
    //         echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Nu a fost completat niciun un tabel zilnic pentru aceasta luna!</div>";
    //     }
    // }
    require("footer.php");
?>