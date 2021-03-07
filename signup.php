<?php require("header.php"); ?>
<div class="container mt-5">
    <form action="includes/signup.inc.php" method="POST">
    <div class="mb-3">
        <label for="nameRegister" class="form-label">Agent economic<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="nameRegister" placeholder="Introduce&#355i denumirea agentului economic" required>
    </div>

    <div class="mb-3">
        <label for="cuiRegister" class="form-label">Codul CUI<span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="cuiRegister" placeholder="Introduce&#355i codul CUI" required>
    </div>

    <div class="mb-3">
        <label for="addressRegister" class="form-label">Adres&#259<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="addressRegister" placeholder="Introduce&#355i adresa astfel: Strad&#259, Num&#259r, Ora&#351;, Jude&#355;/Sector" required>
    </div>

    <div class="mb-3">
        <label for="emailRegister" class="form-label">Email<span class="text-danger">*</span></label>
        <input type="email" class="form-control" name="emailRegister" placeholder="Introduce&#355i adresa de email" required>
    </div>

    <div class="mb-3">
        <label for="passwordRegister" class="form-label">Parol&#259<span class="text-danger">*</span></label>
        <div class="form-text mb-1">Parola trebuie s&#259; fie de minim 8 caractere &#351;i s&#259; con&#355;in&#259; cel pu&#355;in o majuscul&#259;, o cifr&#259; &#351;i un caracter special</div>
        <input type="password" class="form-control" name="passwordRegister" placeholder="Introduce&#355i parola" required>
    </div>

    <div class="mb-3">
        <label for="passwordRegister1" class="form-label">Reintroduce&#355i parola<span class="text-danger">*</span></label>
        <input type="password" class="form-control" name="passwordRegister1" placeholder="Introduce&#355i parola din nou" required>
    </div>

    <div class = 'text-center'>
        <input type="submit" class="btn btn-primary mb-2 mt-2 w-100" name="registerUser" value="&#206nregistrare">
        <p> Ave&#355i cont? <a href = "login.php">Intra&#355;i aici.</a></p>
    </div>
    </form>
</div>

<?php
    if(isset($_GET["error"])) {
        if($_GET["error"] == "emptyInput") {
            echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Atentie!</strong> Completa&#355;i toate c&#226;mpurile obligatorii.</div>";
        } elseif($_GET["error"] == "invalidName") {
            echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Atentie!</strong> Numele con&#355ine caractere ilegale.</div>";
        } elseif($_GET["error"] == "invalidEmail") {
            echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Atentie!</strong> Format email invalid.</div>";
        } elseif($_GET["error"] == "cuiTaken") {
            echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Atentie!</strong> Acest CUI este deja in baza de date.</div>";
        } elseif($_GET["error"] == "invalidPassword") {
            echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Atentie!</strong> Format parol&#259; invalid.</div>";
        } elseif($_GET["error"] == "passwordsDontMatch") {
            echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Atentie!</strong> Nu pusca parola bre</div>";
        } elseif($_GET["error"] == "emailTaken") {
            echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Atentie!</strong> Aceast&#259; adres&#259; de email este deja folosit&#259;.</div>";
        } elseif($_GET["error"] == "none") {
            echo "<div class = \"alert alert-success container\" style = \"text-align: center\"> <strong>Succes!</strong> V-a&#355;i &#238;nregistrat cu succes!</div>";
        } elseif($_GET["error"] == "stmtfailed") {
            echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Din p&#259cate ceva nu a func&#355ionat corect. V&#259 rug&#259m &#238;ncerca&#355;i din nou.</div>";
        }
    }
?>

<?php include("footer.php"); ?>