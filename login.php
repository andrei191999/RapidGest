<?php require("header.php"); ?>

<div class="container mt-5">
    <form action="includes/login.inc.php" method="POST">
        <div class="mb-3">
            <label for="emailLogin" class="form-label">Introduce&#355i adresa de email:</label>
            <input type="email" class="form-control" name="emailLogin" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label for="passwordLogin" class="form-label">Introduce&#355i parola:</label>
            <input type="password" class="form-control" name="passwordLogin" placeholder="Parol&#259" required>
        </div>
        <div class = 'text-center'>
            <input type="submit" class="btn btn-primary mb-1 mt-2 w-100" name="loginUser" value="Intr&#259">
            <p> Nu ave&#355i cont? <a href = "signup.php">Creea&#355i unul aici.</a></p>
        </div>
    </form>
</div>

<?php
    if(isset($_GET["error"])) {
        if($_GET["error"] == "emptyInput") {
            echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Atentie!</strong> Completa&#355;i toate c&#226;mpurile obligatorii.</div>";
        } elseif($_GET["error"] == "wrongEmail") {
            echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Atentie!</strong> Nu exist&#259; un utilizator cu acest email.</div>";
        } elseif($_GET["error"] == "wrongPassword") {
            echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Atentie!</strong> Parol&#259; incorect&#259; pentru acest email.</div>";
        } elseif($_GET["error"] == "none") {
            echo "<div class = \"alert alert-success container\" style = \"text-align: center\"> <strong>Atentie!</strong> V-a&#355;i logat cu succes!</div>";
        } elseif($_GET["error"] == "stmtfailed") {
            echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Din p&#259cate ceva nu a func&#355ionat corect. V&#259 rug&#259m &#238;ncerca&#355;i din nou.</div>";
        } elseif($_GET["error"] == "succes") {
            echo "<div class = \"alert alert-success container\" style = \"text-align: center\"> <strong>Succes!</strong> V-a&#355;i &#238;nregistrat cu succes!</div>";
        } elseif($_GET["error"] == "notLoggedIn") {
            echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Atentie!</strong> Va rugam logativa din nou.</div>";
        }
    }
?>

<?php include("footer.php"); ?>