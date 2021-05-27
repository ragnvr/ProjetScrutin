<?php

//$email = $_POST["email"];
//$values = $_POST["donne"];
$data = $_POST["user"];

$fichiersrcutin = file_get_contents('scrutin.json', true);
$fichiersrcutin = json_decode($fichiersrcutin, true);

$fichierparticipants = file_get_contents('participants.json');
$fichierparticipants = json_decode($fichierparticipants, true);


file_put_contents("participants.json", json_encode($fichierparticipants));
//Ajoute le scrutin
array_push($fichiersrcutin, $data);
file_put_contents("scrutin.json", json_encode($fichiersrcutin));


echo true ;

?>
