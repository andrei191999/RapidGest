<?php
    require("header.php");

    if(isset($_GET["error"]) || isset($_GET["warning"]) || isset($_GET["success"])) {
        echo "<div class=\"mt-3 pt-2 container\">";

        if(isset($_GET["success"])) {
            echo "<div class = \"alert alert-success container\" style = \"text-align: center\"> <strong>Succes!</strong> V-a&#355;i &#238;nregistrat, confirma&#355;i pe email contul.</div>";
        }
    
        if(isset($_GET["warning"])) {
            $warning = $_GET["warning"];
            switch($warning) {
                case "emptyInput":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Completa&#355;i toate c&#226;mpurile obligatorii.</div>";
                    break;
                case "wrongEmail":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Adresa de email nu exist&#259;.</div>";
                    break;
                case "wrongPassword":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Parol&#259; incorect&#259;.</div>";
                    break;
            }
        }

        echo "</div>";
    }
?>

<div class="container mt-5 pt-5">
    <form action="includes/login.inc.php" method="POST">
        <div class="pb-3">
            <label for="emailLogin" class="form-label">Introduce&#355i adresa de email:</label>
            <input type="email" class="form-control" name="emailLogin" required>
        </div>
        <div class="pb-3">
            <label for="passwordLogin" class="form-label">Introduce&#355i parola:</label>
            <input type="password" class="form-control" name="passwordLogin" required>
        </div>
        <div class = 'text-center'>
            <input type="submit" class="btn btn-dark pb-1 pt-1 w-100" name="loginUser" value="Intr&#259">
            <p class="lead pt-2"> Nu ave&#355i cont? <br> <a href="signup.php" class="btn btn-secondary mt-1">Creaz&#259; cont!</a></p>
        </div>
    </form>
</div>

<?php include("footer.php"); ?>