<?php
    require_once("includes/auth.inc.php");
    require("header.php");

    if(isset($_GET["error"]) || isset($_GET["warning"])) {
        echo "<div class=\"mt-3 pt-2 container\">";

        if(isset($_GET["error"])) {
            $error = $_GET["error"];
            switch($error){
                case "stmtFailedInsertMonthly":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFINSMONTHLY\".</div>";          
                    break;        
            }
        }

        $warning = $_GET["warning"];
        switch($warning) {
            case "yearNotNumeric":
                echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Introduce&#355;i anul sub form&#259; numeric&#259;.</div>";
                break;
            case "tableExists":
                echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Tabelul pentru aceast&#259; lun&#259; a fost deja completat.</div>";
                break;
            case "emptyInput":
                echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Completa&#355;i toate c&#226;mpurile obligatorii.</div>";          
                break;
            case "invalidInputInsertMonthlyTable":
                echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Datele introduse sunt invalide.</div>";
                break;
        }

        echo "</div>";
    }
?>

<div class="container pt-4">
    <form action="monthlyTable.php" method="POST">
    <div class="mb-3">
            <label for="monthlyInput" class="form-label">Selecta&#355;i luna<span class="text-danger">*</span></label>
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
        <label for="yearInput" class="form-label">Introduce&#355;i anul<span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="yearInput" required>
    </div>
    <div class = 'text-center'>
        <input type="submit" class="btn btn-primary mb-2 mt-2 w-100" name="generateMonthlyTable" value="Generare tabel">
    </div>
</div>

<?php
    require("footer.php");
?>