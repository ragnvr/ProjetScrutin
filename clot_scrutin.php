<?php
$numeroscrutin = $_GET["numeroscrutin"];

$fichiersrcutin = file_get_contents('scrutin.json', true);
$fichiersrcutin = json_decode($fichiersrcutin, true);


//PArcours le scrutin
for ($i = 0; $i < sizeof($fichiersrcutin); $i++) {
    //Si le numero du scrutin est trouvé
    if ($fichiersrcutin[$i]["nbscrutin"] == $numeroscrutin) {
        //On met son validballot a false
        $fichiersrcutin[$i]["validballot"] = "false";
        echo json_encode("true");
    }
}


file_put_contents("scrutin.json", json_encode($fichiersrcutin));