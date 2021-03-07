<?php
    require("header.php");
    require("includes/functions.inc.php");

    if(isset($_POST["cuiSearch"]) && !empty($_POST["cuiSearch"]) && $_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["Type"]) && $_SESSION["Type"] === "Administrator" && !empty($_SESSION["Type"])){
        $searchCUI = test_input($_POST["cuiSearch"]);
        $arr = findUser($conn, $searchCUI);
?>

<div class="container mt-5 mb-5">
    <div class="row mb-2">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <h1 class="display-1">CUI: <small class="text-muted"><?php echo $arr["CUI"]; ?></small></h1>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-3">
            <div class="container-fluid">
                <h4 class="mb-3">Denumire: <small class="text-muted"><?php echo $arr["Nume"]; ?></small></h4>
                <h4 class="mb-3">Adresa: <small class="text-muted"><?php echo $arr["Adresa"]; ?></small></h4>
                <h4 class="mb-3">Email: <small class="text-muted"><?php echo $arr["Email"]; ?></small></h4>
                <h4 class="mb-3">Info abonament: <small class="text-muted">Informatie despre abonament</small></h4>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center mb-3">
            <a href=<?php echo "\"inspectDailyTable.php?searchCUI=".$searchCUI."\"";?> class="btn btn-primary mb-2 mt-2 w-100">Inspectare tabel zilnic</a>
            <br>
            <a href=<?php echo "\"inspectMonthlyTable.php?searchCUI=".$searchCUI."\"";?> class="btn btn-primary mb-2 mt-2 w-100">Inspectare tabel lunar</a>
            <br>
            <a href=<?php echo "\"inspectAnualTable.php?searchCUI=".$searchCUI."\"";?> class="btn btn-primary mb-2 mt-2 w-100">Inspectare tabel anual</a>
        </div>
    </div>
</div>

<?php
    } else {
        header("location: ./home.php?error=accessRestricted");
        exit();
    }
    require("footer.php");
?>