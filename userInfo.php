<?php
    require("header.php"); 
    if(!isset($_SESSION["Type"]) && !empty($_SESSION["Type"]) && $_SESSION["Type"] !== "Administator") {
        header("location: ./home.php?error=accessRestricted");
        exit();
    }
?>

<!-- DataTables CSS library -->
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- DataTables JS library -->
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script>
$(document).ready(function(){
    $('#users').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "includes/getUserInfo.php"
    });
});
</script>

<div class="container mt-5 pb-5">
    <table id="users" class="display">
        <thead>
            <tr>
                <th>CUI</th>
                <th>Nume</th>
                <th>Adresa</th>
                <th>Email</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>CUI</th>
                <th>Nume</th>
                <th>Adresa</th>
                <th>Email</th>
        </tfoot>
    </table>
</div>

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form action="userShowProfile.php" method="POST">
                <div class="mb-3">
                    <label for="cuiSearch" class="form-label">CUI</label>
                    <input type="number" class="form-control" name="cuiSearch" placeholder="Introduce&#355;i codul CUI al utilizatorului pe care dori&#355;i s&#259; &#238;l c&#259;uta&#355;i">
                </div>
                <input type="submit" class="btn btn-primary w-100" name="searchCUI" value="Caut&#259;">
            </form>
        </div>
    </div>
</div>



<?php require("footer.php"); ?>