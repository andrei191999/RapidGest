<?php
    require_once("includes/auth.inc.php");
    require("header.php");
    require("includes/functions.inc.php");

    if(isset($_GET["error"]) || isset($_GET["warning"])) {
        echo "<div class=\"mt-3 pt-2 container\">";

        if(isset($_GET["warning"])) {
            $warning = $_GET["warning"];
            switch($warning) {
                case "emptyInput":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Completa&#355;i toate c&#226;mpurile obligatorii.</div>";
                    break;
                case "noMonthlyData":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Nu exist&#259; date lunare pentru acest an!</div>";
                    break;
            }
        }

        if(isset($_GET["error"])) {
            $error = $_GET["error"];
            switch($error) {
                case "stmtFailedInsertAnual":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFINSANUAL\".</div>";
                    break;
                case "stmtFailedGetMonthlyTableData":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFGETMONTHLYDATA\".</div>";
                    break;
            }
        }

        echo "</div>";
    }
?>

<div class="container pt-5">
    <form action="generateAnualTable.php" method="POST">
    <div class="mb-3">
        <label for="yearAnual" class="form-label">Introduce&#355;i anul<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="yearAnual" required>
    </div>
    <div class = "text-center">
        <input type="submit" class="btn btn-primary mb-2 mt-2 w-100" name="generateAnualTable" value="Generare tabel anual">
    </div>
</div>

<?php

    if(isset($_POST["generateAnualTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $year = test_input($_POST["yearAnual"]);
        
        if(!checkMonthlyTable($conn, $year)) {
            header("location: ./generateAnualTable.php?warning=noMonthlyData");
            exit();
        } elseif(checkAnualTable($conn, $year)) {
            deleteAnualData($conn, $year);
        }
        if(empty($year)) {
            header("location: ./henerateAnualTable.php?warning=emptyInput");
            exit();
        }
        getMonthlyTableData($conn, $year);
    }
    if(isset($_GET["error"])) {
        if($_GET["error"] == "noMonthlyData") {
            echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Nu exista date lunare pentru acest an!</div>";
        } elseif($_GET["error"] == "noDataForMonth") {
            echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Nu a fost completat niciun un tabel zilnic pentru aceasta luna!</div>";
        }
    }
    require("footer.php");
?>