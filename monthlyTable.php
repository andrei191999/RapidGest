<?php
require("header.php");
require("includes/functions.inc.php");


if(isset($_POST["generateMonthlyTable"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $year = test_input($_POST["yearInput"]);
    $month = $_POST["monthlyInput"];

    $monthYear = $month . "-" . $year;
    if(checkMonthlyTable($conn, $monthYear)) {
        header("location: ./generateMonthlyTable.php?error=tableExists");
        exit();
    }
    $str = monthlyWasteTable($month, $year, $conn);
    print_r($_SESSION["Nume_produse"]);
?>
    <div class="container-fluid mt-5">
        <form action="includes/monthlyTable.inc.php" method="POST">
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Nume produs</th>
                        <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Total unitati vandute</th>
                        <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Stare fizica</th>
                        <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Tip deseu generat</th>
                        <th colspan="4" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cantitate de deseuri</th>
                        <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Luna si an</th>
                    </tr>
                    <tr>
                        <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">generata</th>
                        <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">valorificata</th>
                        <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">eliminata final</th>
                        <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">ramasa in stoc</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $str; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Nume produs</th>
                        <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Total unitati vandute</th>
                        <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Stare fizica</th>
                        <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Tip deseu generat</th>
                        <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">generata</th>
                        <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">valorificata</th>
                        <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">eliminata final</th>
                        <th rowspan="1" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">ramasa in stoc</th>
                        <th rowspan="2" colspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Luna si an</th>
                    </tr>
                        <tr>
                            <th colspan="4" rowspan="1" scope="col" style="text-align: center; border: 1px solid black; vertical-align: middle;">Cantitate de deseuri</th>
                        </tr>
                </tfoot>
            </table>
            <div class = 'text-center'>
                <input type="submit" class="btn btn-primary mt-2 w-100" name="sendMonthlyTable" value="Trimite tabel lunar">
            </div>
        </form>
    </div>

<?php 
}
require("footer.php"); ?>