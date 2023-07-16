<?php 
    
    require("header.php");

    if(isset($_GET["error"]) || isset($_GET["warning"])) {
        echo "<div class=\"mt-3 pt-2 container\">";
        if(isset($_GET["error"])) {
            $error = $_GET["error"];
            switch($error){
                case "stmtFailedCui":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFCUI\".</div>";
                    break;
                case "stmtFailedEmail":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFEMAIL\".</div>";
                    break;
                case "stmtFailedUser":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFUSER\".</div>";
                    break;
            }
        }
    
        if(isset($_GET["warning"])) {
            $warning = $_GET["warning"];
            switch($warning){
                case "passwordTooShort":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Parola este prea scurt&#259;!</div>";
                    break;
                case "invalidPassword":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Parola nu este valid&#259;!</div>";
                    break;
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
            }
        }

        echo "</div>";
    }
?>

<div class="container mt-4">
    <form action="includes/signup.inc.php" method="POST">
    <div class="pb-3">
        <label for="nameRegister" class="form-label">Denumire agent economic <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="nameRegister" required>
    </div>

    <div class="pb-3">
        <label for="cuiRegister" class="form-label">Codul CIF / CUI <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="cuiRegister" required>
    </div>

    <div class="pb-3">
        <label for="firmActivityRegister" class="form-label">Activitatea firmei <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="firmActivityRegister" required>
    </div>

    <div class="pb-3">
        <label for="addressRegister" class="form-label">Adres&#259; <span class="text-danger">*</span></label>
        <div class="form-text pb-1">Introduce&#355;i adresa astfel: Strad&#259;, Num&#259;r, Ora&#351;, Jude&#355;/Sector</div>
        <input type="text" class="form-control" name="addressRegister" required>
    </div>

    <div class="pb-3">
        <label for="emailRegister" class="form-label">Email<span class="text-danger">*</span></label>
        <input type="email" class="form-control" name="emailRegister" required>
    </div>

    <div class="pb-3">
        <label for="passwordRegister" class="form-label">Parol&#259; <span class="text-danger">*</span></label>
        <div class="form-text pb-1">Parola trebuie s&#259; fie de minim 8 caractere &#351;i s&#259; con&#355;in&#259; cel pu&#355;in o majuscul&#259;, o cifr&#259; &#351;i un caracter special</div>
        <input type="password" class="form-control" name="passwordRegister" required>
    </div>

    <div class="pb-3">
        <label for="passwordRegister1" class="form-label">Reintroduce&#355;i parola <span class="text-danger">*</span></label>
        <input type="password" class="form-control" name="passwordRegister1" required>
    </div>

    <div class = 'text-center'>
        <input type="submit" class="btn btn-dark pb-2 mt-2 w-100" name="registerUser" value="&#206;nregistrare">
        <p class="lead pt-2"> Ave&#355i cont? <br> <a href="login.php" class="btn btn-secondary mt-1">Intra&#355;i &#238;n cont</a></p>
    </div>
    </form>
</div>

<?php include("footer.php"); ?>