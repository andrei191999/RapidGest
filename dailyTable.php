<?php 
require("header.php"); 
require("includes/functions.inc.php");
require("includes/auth.inc.php");
$arr = outputCodes($conn);
?>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="container text-center shadow">
            <p class='text-danger mb-5 mt-5 fs-5'><strong><em>Aten&#355;ie!</em></strong> Randurile &#238;n care se las&#259; coloane necompletate <strong>NU</strong> vor fi procesate!</p>
        </div>
        <form action="includes/dailyTable.inc.php" method="POST">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nume prod</th>
                            <th scope="col">Nr unitati vandute</th>
                            <th scope="col">Tip de deseu generat</th>
                            <th scope="col">Stare fizica</th>
                            <th scope="col">Nr unitati ce genereaza o unit de deseu</th>
                            <th scope="col">Unit de masura</th>
                        </tr>
                    </thead>
                    <tbody id="tBody" onkeyup="addRow()" onChange="addRow()">
                        <tr>
                            <td><input type="text" name="productName0" id="productName0" placeholder="Numele produsului" onChange="isSetProductName()"></td>
                            <td><input type="number" name="unitsSold0" min="1" id="unitsSold0" placeholder="Numar unitati" onChange="isSetUnitsSold()"></td>
                            <td>
                                <select name="thrashType0" id="thrashType0" onChange="isSetThrashType()">
                                    <option selected></option>
                                    <?php
                                        foreach($arr as $value) {
                                            echo "<option value=\"".$value."\">".$value."</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select name="condition0" id="condition0" onChange="changeUnit(); isSetCondition()">
                                    <option selected></option>
                                    <option value="Solid">Solid</option>
                                    <option value="Lichid">Lichid</option>
                                </select>
                            </td>
                            <td> <input type="number" name="NUCGUD0" min="1" id="NUCGUD0" onChange="isSetNUCGUD()"> </td>
                            <td name='measureUnits0' id='measureUnits0'></td>
                        </tr>
                    </tbody>
                </table>
                <div class = 'text-center'>
                <input type="submit" name="sendWasteTableInfo" class="btn btn-primary mt-2 w-100" value="Trimite">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    var codesArray = new Array();
    <?php
        forEach($arr as $value) {
            echo "codesArray.push(\"$value\");";
        }
    ?>
</script>
<script type="text/javascript" src="includes/scripts/table.js" defer></script>

<?php 
if(isset($_GET["error"])) {
    if($_GET["error"] == "invalidInput") {
        echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Atentie!</strong> Numarul de unitati vandute si numarul de unitati ce genereaza o unitate de deseu trebuie sa fie numere.</div>";
    } elseif($_GET["error"] == "succes") {
        echo "<div class = \"alert alert-success container\" style = \"text-align: center\"> <strong>Succes!</strong> Datele au fost introduse cu succes.</div>";
    }
}

include("footer.php"); ?>