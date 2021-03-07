<?php
require("includes/functions.inc.php");
require("header.php");
$arr = stats($conn);

$dataPoints = array(
	array("label"=> "01", "y"=> $arr[0]),
	array("label"=> "02", "y"=> $arr[1]),
	array("label"=> "03", "y"=> $arr[2]),
	array("label"=> "04", "y"=> $arr[3]),
	array("label"=> "05", "y"=> $arr[4]),
	array("label"=> "06", "y"=> $arr[5]),
	array("label"=> "07", "y"=> $arr[6]),
	array("label"=> "08", "y"=> $arr[7]),
	array("label"=> "09", "y"=> $arr[8]),
	array("label"=> "10", "y"=> $arr[9]),
    array("label"=> "11", "y"=> $arr[10]),
	array("label"=> "12", "y"=> $arr[11]),
	array("label"=> "13", "y"=> $arr[12]),
	array("label"=> "14", "y"=> $arr[13]),
	array("label"=> "15", "y"=> $arr[14]),
	array("label"=> "16", "y"=> $arr[15]),
	array("label"=> "17", "y"=> $arr[16]),
	array("label"=> "18", "y"=> $arr[17]),
	array("label"=> "19", "y"=> $arr[18]),
	array("label"=> "20", "y"=> $arr[19])
);
	
?>
<!DOCTYPE HTML>
<html>
    <head>
        <script>
            window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Cantitate deseuri generate"
                },
                axisY: {
                    title: "Cantitate masurata in kg sau litri"    // modif
                },
                data: [{
                    type: "column",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
            }
        </script>
    </head>
    <body>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

        <div class="container" style="font-size:0.8vw">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">1 - Deşeuri rezultate de la exploatarea minieră şi a carierelor şi de la tratarea fizică şi chimică a mineralelor</li>
                <li class="list-group-item">2 - Deşeuri din agricultura, horticultura, acvacultura, silvicultura, vânătoare şi pescuit, de la prepararea şi procesarea alimentelor </li>
                <li class="list-group-item">3 - Deşeuri de la prelucrarea lemnului şi producerea plăcilor şi mobilei, pastei de hârtie, hârtiei şi cartonului</li>
                <li class="list-group-item">4 - Deşeuri din industriile pielăriei, blănăriei şi textilă</li>
                <li class="list-group-item">5 - Deşeuri de la rafinarea petrolului, purificarea gazelor naturale şi tratarea pirolitică a cărbunilor</li>
                <li class="list-group-item">6 - Deşeuri din procese chimice anorganice</li>
                <li class="list-group-item">7 - Deşeuri din procese chimice organice</li>
                <li class="list-group-item">8 - Deşeuri de la producerea, prepararea, furnizarea şi utilizarea (ppfu) straturilor de acoperire (vopsele, lacuri şi emailuri vitroase), a adezivilor, cleiurilor şi cernelurilor tipografice</li>
                <li class="list-group-item">9 - Deşeuri din industria fotografică</li>
                <li class="list-group-item">10 - Deşeuri din procesele termice</li>
                <li class="list-group-item">11 - Deşeuri de la tratarea chimică a suprafeţelor şi acoperirea metalelor şi altor materiale; hidrometalurgie neferoasă</li>
                <li class="list-group-item">12 - Deşeuri de la modelarea, tratarea mecanică şi fizică a suprafeţelor metalelor şi a materialelor plastice</li>
                <li class="list-group-item">13 - Deşeuri uleioase şi deşeuri de combustibili lichizi (cu excepţia uleiurilor comestibile şi a celor din capitolele 05, 12 şi 19)</li>
                <li class="list-group-item">14 - Deşeuri de solvenţi organici, agenţi de răcire şi agenţi de propulsare (cu excepţia 07 şi 08)</li>
                <li class="list-group-item">15 - Deşeuri de ambalaje; materiale absorbante, materiale de lustruire, filtrante şi îmbrăcăminte de protecţie, nespecificate în altă parte</li>
                <li class="list-group-item">16 - Deşeuri nespecificate în altă parte</li>
                <li class="list-group-item">17 - Deşeuri din construcţii şi demolări (inclusiv pământ excavat din amplasamente contaminate)</li>
                <li class="list-group-item">18 - Deşeuri rezultate din activităţile unităţilor sanitare şi din activităţi veterinare şi/sau cercetări conexe (cu excepţia deşeurilor de la prepararea hranei în bucătarii sau restaurante, care nu au legătură directă cu activitatea sanitară)</li>
                <li class="list-group-item">19 - Deşeuri de la instalaţii de tratare a reziduurilor, de la staţiile de epurare a apelor uzate şi de la tratarea apelor pentru alimentare cu apa şi uz industrial</li>
                <li class="list-group-item">20 - Deşeuri municipale şi asimilabile din comerţ, industrie, instituţii, inclusiv fracţiuni colectate separat</li>
            </ul>
        </div>
    </body>
</html>             