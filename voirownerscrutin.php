<?php

$email  = $_GET["email"];

$fichiersrcutin = file_get_contents('scrutin.json', true);
$fichiersrcutin = json_decode($fichiersrcutin, true);

$data = array();

for ($i =0 ; $i< sizeof($fichiersrcutin) ; $i++){
    if ($fichiersrcutin[$i]["ownerscrutin"] == $email){
        array_push($data,$fichiersrcutin[$i] );
    }
}


echo json_encode($data);