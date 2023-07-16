<?php require("header.php") ?>

<!-- DataTables CSS library -->
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- DataTables JS library -->
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script>
$(document).ready(function(){
    $('#codes').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "ajax": "includes/getCodesInfo.php",
        "language": {
            "lengthMenu": "Arata _MENU_ coduri pe pagina",
            "zeroRecords": "Nu am gasit niciun cod....ne pare rau",
            "info": "Codurile de la _START_ la _END_ din _TOTAL_",
            "infoEmpty": "Nu exista date disponibile",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "infoPostFix":    "",
            "thousands":      ",",
            "decimal":        "",
            "loadingRecords": "Se incarca...",
            "processing":     "Procesare...",
            "search":         "Cauta:",
            "zeroRecords":    "Niciun cod gasit",
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
});
</script>

<div class="container mt-5" style="overflow-x: auto;">
    <table id="codes" class="display">
        <thead>
            <tr>
                <th>Cod</th>
                <th>Descriere</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Cod</th>
                <th>Descriere</th>
        </tfoot>
    </table>
</div>



<?php require("footer.php") ?>