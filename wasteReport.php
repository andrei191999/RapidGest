<?php
require_once("includes/auth.inc.php");
require("header.php");
require("includes/functions.inc.php");

if(outputSomeCodes($conn, $_SESSION["CUI"]) != false ) {
    $restul = "Toate codurile:";
    $arr1 = outputSomeCodes($conn, $_SESSION["CUI"]);
    $arr2 = outputCodes($conn);
    $someCodes = 1;
} else {
    $arr = outputCodes($conn);
    $someCodes = 2;
}

if(isset($_GET["error"]) || isset($_GET["warning"])) {
    echo "<div class=\"mt-3 pt-2 container\">";

    if(isset($_GET["warning"])) {
        $warning = $_GET["warning"];
        switch($warning) {
            case "emptyInput":
                echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Completa&#355;i toate c&#226;mpurile obligatorii.</div>";
                break;
            case "fileTooLarge":
                echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Fi&#351;ierul este prea mare. M&#259;rimea maxim&#259; admis&#259; este 5MB (5000 KB).</div>";
                break;
            case "invalidInput":
                echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Cantit&#259;&#355;ile introduse nu sunt valide.</div>";
                break;
            case "wrongFileType":
                echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Formatul fi&#351;ierului ales nu este acceptat.</div>";
                break;
        }
    }

    if(isset($_GET["error"])) {
        $error = $_GET["error"];
        switch($error) {
            case "fileError":
                echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"FILEERROR\".</div>";
                break;
            case "stmtFailedInsertReport":
                echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFINSREPORT\".</div>";
                break;
            }
    }
    echo "</div>";
}

?>
    <div class="container-fluid mt-3" >
        <p class="lead">Modelul pentru documentul de transport poate fi g&#259;sit <a href="PDF/Document de transport.pdf" target="_blank" class="text-decoration-none">aici</a>. 
        Acesta trebuie desc&#259;rcat, completat, scanat &#351;i &#238;nc&#259;rcat &#238;n tabelul urm&#259;tor.</p>
        <form action="includes/wasteReport.inc.php" method="POST" onchange="myFunction();" onkeyup="myFunction();" enctype="multipart/form-data">
            <div style="overflow-x:auto;">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="1" rowspan="3" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cod deseu</th>
                            <th colspan="4" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cantitate de deseuri</th>
                            <th colspan="1" rowspan="3" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Document de transport <br>(PDF, JPEG, JPG sau PNG)</th>
                        </tr>
                        <tr>
                            <th colspan="1" rowspan="2" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Totala</th>
                            <th colspan="1" rowspan="2" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Ramasa in stoc</th>
                            <th colspan="2" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">predata:</th>
                        </tr>
                        <tr>
                            <th colspan="1" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">valorificata</th>
                            <th colspan="1" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">eliminata</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3" style="text-align: center; border: 1px solid black; vertical-align: middle;">
                                <select name="trashCodeReport" class="form-select" required>
                                    <option selected></option>
                                    <?php
                                        if($someCodes == 1) {
                                            echo "<option style='background-color:#bdbbbb;' value='used'>Coduri folosite anterior:</option>";
                                            foreach($arr1 as $value) {
                                                echo "<option value=\"".$value."\">".$value."</option>";
                                            }

                                            echo "<option style='background-color:#bdbbbb;' value='used'>Toate codurile:</option>";
                                            foreach($arr2 as $value) {
                                                echo "<option value=\"".$value."\">".$value."</option>";
                                            }
                                        } else {
                                            foreach($arr as $value) {
                                                echo "<option value=\"".$value."\">".$value."</option>";
                                            }
                                        }
                                        
                                    ?>
                                </select>
                            </td>
                            <td rowspan="3" style="text-align: center; border: 1px solid black; vertical-align: middle;">
                                <input type="number" class="form-control" min="0" name="total" id="total" required>
                            </td>
                            <td rowspan="3" style="text-align: center; border: 1px solid black; vertical-align: middle;">
                                <input type="number" class="form-control" min="0" name="remained" id="remained" required>
                            </td>
                            <td>
                                <input type="number" class="form-control" min="0" name="valorified" id="valorified" required>
                            </td>
                            <td>
                                <input type="number" class="form-control" min="0" name="eliminated" id="eliminated" required>
                            </td>
                            <td rowspan="3" class="align-middle text-center">
                                <label for="document" id="documentLabel" class="btn btn-sm btn-secondary mb-1 form-control">Alege document</label>
                                <p class="form-control d-none" id="fileName"></p>
                                <input type="file" class="form-control d-none" id="document" name="document" accept=".pdf, .png, .jpg, .jpeg" onChange="uploadedPDF();" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Nume operator economic</strong></td>
                            <td class="text-center"><strong>Nume operator economic</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="valorifiedOA" id="valorifiedOA" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="eliminatedOA" id="eliminatedOA" required>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class = "text-center">
                <input type="submit" class="btn btn-primary pb-2 mt-2 w-100" name="wasteReport" value="Creare raport" id="btn" disabled="disabled">
            </div>

            </form>
    </div>

    


<script src="includes/scripts/scriptCheckWasteReport.js" defer></script>
<?php 
require("footer.php"); ?>