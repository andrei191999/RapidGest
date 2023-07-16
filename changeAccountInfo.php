<?php
    require("header.php");
    require("includes/functions.inc.php");
    require_once("includes/auth.inc.php");

    if(isset($_GET["denumire"]) && !empty($_GET["denumire"]) && isset($_GET["adresa"]) && !empty($_GET["adresa"]) && isset($_GET["email"]) && !empty($_GET["email"]) ) {
        $name = test_input($_GET["denumire"]);
        $address = test_input($_GET["adresa"]);
        $email = test_input($_GET["email"]);
        $activity = test_input($_GET["activitate"]);
    }
?>

<div class="container-fluid">
    <div class="row pt-5">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="container">
                <form action="includes/changeAccountInfo.inc.php" method="POST">
                    <div class="mb-3">
                        <label for="updateName" class="form-label">Nume</label>
                        <input type="text" class="form-control" name="updateName" value=<?php echo "\"$name\""; ?> required>
                    </div>
                    <div class="mb-3">
                        <label for="updateAddress" class="form-label">Adres&#259;</label>
                        <input type="text" class="form-control" name="updateAddress" value=<?php echo "\"$address\""; ?>>
                    </div>
                    <div class="mb-3">
                        <label for="updateEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="updateEmail" value=<?php echo "\"$email\""; ?>>
                    </div>
                    <div class="mb-3">
                        <label for="updateActivity" class="form-label">Activitate</label>
                        <input type="text" class="form-control" name="updateActivity" value=<?php echo "\"$activity\""; ?>>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="updateAccountInfo">Schimb&#259;</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    require("footer.php");
?>