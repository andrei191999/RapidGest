<?php
    require_once("includes/auth.inc.php");
    require("header.php");
    require("includes/functions.inc.php");

    if(isset($_SESSION["CUI"]) && !empty($_SESSION["CUI"])){
        $arr = getUserInfo($conn);


    if(isset($_GET["error"]) || isset($_GET["warning"]) || isset($_GET["success"])) {
        echo "<div class=\"mt-3 pt-2 container\">";
        if(isset($_GET["error"])) {
            $error = $_GET["error"];
            switch($error){
                case "stmtFailedSomeCodes":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFSCODES\".</div>";
                    break;
                case "stmtFailedCheckMonthly":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFCKMONTHLY\".</div>";
                    break;
                case "stmtFailedCheckAnual":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFCKANUAL\".</div>";
                    break;
                case "stmtFailedDeleteAnual":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFDELANUAL\".</div>";
                    break;
                case "stmtFailedSeeWasteReport":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFSEEWASTEU\".</div>";
                    break;
                case "stmtDocumentPDFFail":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFDOCPDF\".</div>";
                    break;
                case "stmtFailedExistsMonthly":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFEXTMONTHLY\".</div>";
                    break;
                case "stmtFailedExistsAnual":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFEXTANUAL\".</div>";
                    break;
            }
        }
    
        if(isset($_GET["warning"])) {
            $warning = $_GET["warning"];
            switch($warning){
                case "emptyInput":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Completa&#355;i toate c&#226;mpurile obligatorii.</div>";
                    break;
                case "invalidName":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Numele con&#355ine caractere nepermise.</div>";
                    break;
                case "invalidEmail":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Format email invalid.</div>";
                    break;
                case "cuiTaken":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Acest CIF este deja folosit.</div>";
                    break;
                case "passwordsDontMatch":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Parolele nu se potrivesc.</div>";
                    break;
                case "emailTaken":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Aceast&#259; adres&#259; de email este deja folosit&#259;.</div>";
                    break;
                case "warningEmptyInput":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Completa&#355;i toate c&#226;mpurile obligatorii.</div>";
                    break;
                case "invalidEmailUpdate":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Format email invalid.</div>";
                    break;
                case "emptyUpdateAddress":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> V&#259; rug&#259;m completa&#355;i adresa.</div>";
                    break;
                case "emptyUpdateName":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> V&#259; rug&#259;m completa&#355;i numele.</div>";
                    break;
                case "emptyActivityUpdate":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> V&#259; rug&#259;m completa&#355;i activitatea.</div>";
                    break;
            }
        }

        if(isset($_GET["success"])) {
            $success = $_GET["success"];
            switch($success){
                case "succesInsertMonthly":
                    echo "<div class = \"alert alert-success container\" style = \"text-align: center\"> <strong>Succes!</strong> Date lunare inserate.</div>";
                    break;
                case "successUpdateUserInfo":
                    echo "<div class = \"alert alert-success container\" style = \"text-align: center\"> <strong>Succes!</strong> Datele dumneavoastr&#259; au fost schimbate.</div>";
                    break;
                case "successGenerateAnual":
                    echo "<div class = \"alert alert-success container\" style = \"text-align: center\"> <strong>Succes!</strong> Tabel anual generat.</div>";
                    break;
                case "successInsertReport":
                    echo "<div class = \"alert alert-success container\" style = \"text-align: center\"> <strong>Succes!</strong> Tabel de trasabilitate creat.</div>";
                    break;
            }
        }

        echo "</div>";
    }
?>

<div class="container pt-5 pb-5">
    <div class="row pb-2">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <h1 class="display-1">CUI: <?php echo $arr["CUI"]; ?></small></h1>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-3 text-end">
            <h5 class="h5">Operator economic:</h5>
            <h5 class="h5">Adresa:</h5>
            <h5 class="h5">Email:</h5>
            <h5 class="h5">Activitatea firmei:</h5>
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-3 text-start">
            <h5 class="h5"><?php echo $arr["Nume"]; ?></h5>
            <h5 class="h5"><?php echo $arr["Adresa"]; ?></h5>
            <h5 class="h5"><?php echo $arr["Email"]; ?></h5>
            <h5 class="h5"><?php echo $arr["Activitate"]; ?></h5>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-center mb-3">
            <a href="generateMonthlyTable.php" class="btn btn-dark mb-2 mt-2 w-100">Creare tabel lunar</a>
            <br>
            <a href="generateAnualTable.php" class="btn btn-dark mb-2 mt-2 w-100">Creare tabel anual</a>
            <br>
            <a href="wasteReport.php" class="btn btn-dark mb-2 mt-2 w-100">Creare tabel trasabilitate</a>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-center mb-3">
            <a href="visualiseMonthlyTable.php" class="btn btn-dark mb-2 mt-2 w-100">Vizualizare tabel lunar</a>
            <br>
            <a href="visualiseAnualTable.php" class="btn btn-dark mb-2 mt-2 w-100">Vizualizare tabel anual</a>
            <br>
            <a href="visualiseWasteReport.php" class="btn btn-dark mb-2 mt-2 w-100">Vizualizare tabel trasabilitate</a>
        </div>
        
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col- text-center">
        <a href=<?php echo "\"changeAccountInfo.php?denumire=".$arr["Nume"]."&adresa=".$arr["Adresa"]."&email=".$arr["Email"]."&activitate=".$arr["Activitate"]."\"";?> class="btn btn-secondary w-100 text-white">Schimb&#259; informa&#355;iile contului</a>
        </div>
    </div>
    
</div>



<?php
    } else {
        header("location: login.php?error=notLoggedIn");
        exit();
    }
    require("footer.php");
?>