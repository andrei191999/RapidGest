<?php
require("header.php");
require("includes/functions.inc.php");
require_once("includes/auth.inc.php");

if(isset($_SESSION["Type"]) && !empty($_SESSION["Type"]) && $_SESSION["Type"] === "Administrator") {
    $searchCUI = test_input($_GET["searchCUI"]);

    if(isset($_POST["inspectAnualTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["yearPDF"] = test_input($_POST["yearAnual"]);
        $_SESSION ["trashCodePDF"] = test_input($_POST["trashCodeAnual"]);
        $_SESSION["cuiPDF"] = test_input($searchCUI);
    }

    if(outputSomeCodes($conn, $searchCUI) != false ) {
        $arr = array_merge(outputSomeCodes($conn, $searchCUI), outputCodes($conn));
    } else {
        $arr = outputCodes($conn);
    }
?>

    <div class="container pt-5">
        <form action=<?php echo "\"inspectAnualTable.php?searchCUI=".$searchCUI . "\""; ?> method="POST">
            <div class="pb-3">
                <label for="yearAnual" class="form-label">Introduce&#355;i anul <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="yearAnual" required>
            </div>
            <div class="pb-3">
                <label for="trashCodeAnual" class="form-label">Selecta&#355;i tipul de de&#351;eu <span class="text-danger">*</span></label>
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
                        <a class = "btn btn-info mb-2 mt-2 w-100" target="_blank" href="PDF/anualTablePdf.php">Vizualizare tabel &#238;n format PDF</a>
                    </div>
            <?php } ?>
        </form>
    </div>

    <?php

    if(isset($_POST["inspectAnualTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $year = test_input($_POST["yearAnual"]);
        $trashCode = test_input($_POST["trashCodeAnual"]);
        if(!existsAnualTable($conn, $year, $searchCUI)){
            echo "<div class = \"alert alert-warning mt-3 container\" style = \"text-align: center\"><strong>Aten&#355;ie!</strong> Tabelul nu exist&#259;!</div>";
            exit();
        }
    ?>

            <?php
            if(!empty($trashCode)) {
                $counter = 1;
                $arr[0] = $trashCode;
            } else {
                $counter = count($arr);
            }
            $i = 0;
            while($i < $counter) {
                $row = getTypeAndMeasureUnit($conn, $arr[$i], $searchCUI);
            ?>

                <div class="container-fluid mt-3" >
                    <div class="row mb-2 pb-2">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="container text-center">
                                <p class="lead"><br>CUI: <?php echo $searchCUI; ?>&emsp;Anul: <?php echo $year; ?>&emsp;
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
                                        inspectAnualTable($conn, $year, $arr[$i], $searchCUI); 
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
    }
    require("footer.php");
?>