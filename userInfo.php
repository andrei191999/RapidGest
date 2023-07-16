<!-- stil pt butoane trb mutat?? -->
<style> 
input[type=button] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 1rem;
}
</style>

<?php
    require_once("includes/auth.inc.php");
    require("header.php"); 
    
    if(!isset($_SESSION["Type"]) && !empty($_SESSION["Type"]) && $_SESSION["Type"] !== "Administator") {
        header("location: ./home.php?error=accessRestricted");
        exit();
    }

    if(isset($_GET["error"]) || isset($_GET["warning"])) {
        echo "<div class=\"mt-3 pt-2 container\">";
        if(isset($_GET["error"])) {
            $error = $_GET["error"];
            switch($error){
                case "stmtFailedSeeWasteReport":
                    echo "<div class = \"alert alert-danger container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Din p&#259cate a ap&#259;rut o eroare. V&#259 rug&#259m rapota&#355;i eroarea suportului nostru. Tip eroare: \"STMTFSEEWASTEA\".</div>";
                    break;
            }
        }
    
        if(isset($_GET["warning"])) {
            $warning = $_GET["warning"];
            switch($warning){
                case "emptyInput":
                    echo "<div class = \"alert alert-warning container\" style = \"text-align: center\"> <strong>Aten&#355;ie!</strong> Completa&#355;i toate c&#226;mpurile obligatorii.</div>";
                    break;
                }
            }
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
        "responsive": true,
        "ajax": "includes/getUserInfo.php",
        "columnDefs": [
            { targets: [0,1,2,3,4], className: 'dt-center'},
            {  
                targets: -1,
                render: function (data, type, row, meta) {
                return '<input type="button" class="lunar" id=n-"' + meta.row + '" value="Lunar" style="margin:5px;"</input><input type="button" class="anual" id=n-"' + meta.row + '" value="Anual" style="margin:5px;"</input><input type="button" class="trasabilitate" id=n-"' + meta.row + '" value="Trasabilitate" style="margin:5px;"</input>';
                }
            }
        ],
        "language": {
            "lengthMenu": "Arata _MENU_ utilizatori pe pagina",
            "zeroRecords": "Nu am gasit niciun utilizator....ne pare rau",
            "info": "Utilizatorii de la _START_ la _END_ din _TOTAL_",
            "infoEmpty": "Nu exista date disponibile",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "infoPostFix":    "",
            "thousands":      ",",
            "decimal":        "",
            "loadingRecords": "Se incarca...",
            "processing":     "Procesare...",
            "search":         "Cauta:",
            "zeroRecords":    "Niciun utilizator gasit",
            "paginate": {
                "first":      "Prima",
                "last":       "Ultima",
                "next":       "Inainte",
                "previous":   "Inapoi"
            },
            "aria": {
                "sortAscending":  ": ordonati coloana crescator",
                "sortDescending": ": ordonati coloana descrescator"
            }
        }
    });

    $('#users tbody').on('click', '.lunar', function () {
        var id = $(this).attr("id").match(/\d+/)[0];
        var data = $('#users').DataTable().row( id ).data();
        window.location.href="inspectMonthlyTable.php?searchCUI=".concat(data[0]);
        exit()
        });
    
    $('#users tbody').on('click', '.anual', function () {
        var id = $(this).attr("id").match(/\d+/)[0];
        var data = $('#users').DataTable().row( id ).data();
        window.location.href="inspectAnualTable.php?searchCUI=".concat(data[0]);
        exit();
    });

    $('#users tbody').on('click', '.trasabilitate', function () {
        var id = $(this).attr("id").match(/\d+/)[0];
        var data = $('#users').DataTable().row( id ).data();
        window.location.href="visualiseWasteReport.php?searchCUI=".concat(data[0]);
        exit();
    });
});
</script>

<div class="container pt-5 pb-5">
    <table id="users" class="cell-border order-column hover">
        <thead>
            <tr>
                <th>CUI</th>
                <th>Nume</th>
                <th>Adresa</th>
                <th>Email</th>
                <th>Vizualizare tabel</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>CUI</th>
                <th>Nume</th>
                <th>Adresa</th>
                <th>Email</th>
                <th>Vizualizare tabel</th>
        </tfoot>
    </table>
</div>

<!-- <div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form action="userShowProfile.php" method="POST">
                <div class="pb-3">
                    <label for="cuiSearch" class="form-label">CUI</label>
                    <input type="number" min="0" class="form-control" name="cuiSearch" placeholder="Introduce&#355;i codul CUI al utilizatorului pe care dori&#355;i s&#259; &#238;l c&#259;uta&#355;i">
                </div>
                <input type="submit" class="btn btn-primary w-100" name="searchCUI" value="Caut&#259;">
            </form>
        </div>
    </div>
</div> -->



<?php require("footer.php"); ?>