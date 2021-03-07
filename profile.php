<?php
    require("header.php");
    require("includes/functions.inc.php");

    if(isset($_SESSION["CUI"]) && !empty($_SESSION["CUI"])){
        $arr = getUserInfo($conn);
?>

<div class="container mt-5 mb-5">
    <div class="row mb-2">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <h1 class="display-1">CUI: <small class="text-muted"><?php echo $arr["CUI"]; ?></small></h1>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-3">
            <h4 class="mb-3">Denumire: <small class="text-muted"><?php echo $arr["Nume"]; ?></small></h4>
            <h4 class="mb-3">Adresa: <small class="text-muted"><?php echo $arr["Adresa"]; ?></small></h4>
            <h4 class="mb-3">Email: <small class="text-muted"><?php echo $arr["Email"]; ?></small></h4>
            <h4 class="mb-3">Info abonament: <small class="text-muted">Informatie despre abonament</small></h4>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center mb-3">
            <a href="dailyTable.php" class="btn btn-primary mb-2 mt-2 w-100">Creare tabel zilnic</a>
            <br>
            <a href="generateMonthlyTable.php" class="btn btn-primary mb-2 mt-2 w-100">Creare tabel lunar</a>
            <br>
            <a href="generateAnualTable.php" class="btn btn-primary mb-2 mt-2 w-100">Creare tabel anual</a>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center mb-3">
            <a href="visualiseDailyTable.php" class="btn btn-primary mb-2 mt-2 w-100">Vizualizare tabel zilnic</a>
            <br>
            <a href="visualiseMonthlyTable.php" class="btn btn-primary mb-2 mt-2 w-100">Vizualizare tabel lunar</a>
            <br>
            <a href="visualiseAnualTable.php" class="btn btn-primary mb-2 mt-2 w-100">Vizualizare tabel anual</a>
        </div>
        <a href=<?php echo "\"changeAccountInfo.php?denumire=".$arr["Nume"]."&adresa=".$arr["Adresa"]."&email=".$arr["Email"]."\"";?> class="btn btn-warning">Schimb&#259; informa&#355;iile contului</a>
    </div>
    
</div>



<?php
    } else {
        header("location: login.php?error=notLoggedIn");
        exit();
    }
    require("footer.php");
?>