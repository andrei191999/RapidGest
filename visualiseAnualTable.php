<?php
    require_once("includes/auth.inc.php");
    require("header.php");
    require("includes/functions.inc.php");

    $arr = outputSomeCodes($conn, $_SESSION["CUI"]);

    if(isset($_POST["visualiseAnualTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["yearPDF"] = test_input($_POST["yearAnual"]);
        $_SESSION ["trashCodePDF"] = test_input($_POST["trashCodeAnual"]);
        $_SESSION["cuiPDF"] = test_input($_SESSION["CUI"]);
    }

    if(isset($_GET["error"]) || isset($_GET["warning"])) {
        echo "<div class=\"mt-3 pt-2 container\">";

        if(isset($_GET["error"])) {
            $error = $_GET["error"];
            switch($error){
                case "stmtFailedAnualPDF1":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFANUALPDF1\".</div>";
                    break;
                case "stmtFailedAnualPDF2":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFANUALPDF2\".</div>";
                    break;
            }
        }
        if(isset($_GET["warning"])) {
            $warning = $_GET["warning"];
            switch ($warning) {
                case "noMonthlyData":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Nu exist&#259; acest tabel lunar.</div>";
                    break;
                case "noAnualData":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Nu exist&#259; acest tabel anual.</div>";
                    break;
            }
        }
    }
?>

<div class="container pt-4">
    <form action="visualiseAnualTable.php" method="POST">
        <div class="pb-3">
            <label for="yearAnual" class="form-label">Introduce&#355;i anul<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="yearAnual" required>
        </div>
        <div class="pb-3">
            <label for="trashCodeAnual" class="form-label">Selecta&#355;i tipul de de&#351;eu<span class="text-danger">*</span></label>
            <select name="trashCodeAnual" class="form-select">
                <option selected></option>
                <?php
                    if(empty($arr)) {
                        echo "<option value='0 rezultate'>0 rezultate</option>";
                    } else {
                        foreach($arr as $value) {
                        echo "<option value=\"".$value."\">".$value."</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class = 'text-center'>
            <input type="submit" class="btn btn-primary mb-2 mt-2 w-100" name="visualiseAnualTable" value="Vizualizare tabel anual">
        </div>
    </form>
</div>

<?php

    if(isset($_POST["visualiseAnualTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $year = test_input($_POST["yearAnual"]);
        $trashCode = test_input($_POST["trashCodeAnual"]);

        if(!checkMonthlyTable($conn, $year)) {
            header("location: ./visualiseAnualTable.php?warning=noMonthlyData");
            exit();
        } elseif(!checkAnualTable($conn, $year)) {
            header("location: ./visualiseAnualTable.php?warning=noAnualData");
            exit();
        }
?>

    <div class = "container text-center">
        <a class = "btn btn-info mb-2 mt-2 w-100" target="_blank" href="PDF/anualTablePdf.php">Vizualizare tabel &#238;n format PDF</a>
    </div>

    <?php
        if(!empty($trashCode)) {
            $counter = 1;
            $arr[0] = $trashCode;
        } else {
            $counter = count($arr);
        }
        $i = 0;
        while($i < $counter) {
            $row = getTypeAndMeasureUnit($conn, $arr[$i], $_SESSION["CUI"]);
    ?>

            <div class="container-fluid mt-3" >
                <div class="row mb-2 pb-2">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="container text-center">
                            <p class="lead"><br>CUI: <?php echo $_SESSION["CUI"]; ?>&emsp;Anul: <?php echo $year; ?>&emsp;
                            Cod de&#351;eu: <?php echo $arr[$i]; ?>&emsp;Tip de&#351;eu: <?php echo $row["Tip_deseu"]; ?>&emsp;
                            Unitate m&#259;sur&#259;: <?php echo $row["Unitate_masura"]; ?>&emsp;<p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-ld-12 col-md-12 col-sm-12" style="overflow-x: auto;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="1" rowspan="3" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Luna</th>
                                    <th colspan="4" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cantitate de deseuri</th>
                                </tr>
                                <tr>
                                    <th colspan="1" rowspan="2" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Generata</th>
                                    <th colspan="3" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">din care:</th>
                                </tr>
                                <tr>
                                    <th colspan="1" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">valorificata</th>
                                    <th colspan="1" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">eliminata final</th>
                                    <th colspan="1" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">ramasa in stoc</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    seeAnualTable($conn, $year, $arr[$i]); 
                                    $i++;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

<?php
        }
    }
    require("footer.php");
?>