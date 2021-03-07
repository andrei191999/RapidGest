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
        "ajax": "includes/getCodesInfo.php"
    });
});
</script>

<div class="container mt-5">
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