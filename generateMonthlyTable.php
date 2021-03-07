<?php
require("header.php");
?>

<div class="container mt-5">
    <form action="monthlyTable.php" method="POST">
    <div class="mb-3">
            <label for="monthlyInput" class="form-label">Selecta&#355i luna<span class="text-danger">*</span></label>
            <select class="form-select" name = "monthlyInput" required>
                <option selected>Selecta&#355i luna</option>
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
        <label for="yearInput" class="form-label">Introduce&#355i anul<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="yearInput" placeholder="Anul" required>
    </div>
    <div class = 'text-center'>
        <input type="submit" class="btn btn-primary mb-2 mt-2 w-100" name="generateMonthlyTable" value="Generare tabel">
    </div>
</div>

<?php
if(isset($_GET["error"])) {
    if($_GET["error"] == "tableExists") {
        echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Tabelul pentru aceasta luna a fost deja completat!</div>";
    } elseif($_GET["error"] == "noDataForMonth") {
        echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Nu a fost completat niciun un tabel zilnic pentru aceasta luna!</div>";
    }
}
require("footer.php");
?>