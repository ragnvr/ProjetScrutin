<?php

//echo "REQUEST\n";
//var_dump($_REQUEST);
//$tofind = htmlspecialchars($_GET["email"]);
$email = htmlspecialchars($_GET["email"]);
$password = htmlspecialchars($_GET["password"]);
//$password  = ($_GET["password"]);

$jsonString = file_get_contents('participants.json');
$datajson = json_decode($jsonString, true);

$nomprenom = array();
//foreach ($datajson as $i => $etu) {
for ($i = 0; $i < sizeof($datajson); $i++) {
    if ((trim($email) === trim($datajson[$i]["email"]))) {

        array_push($nomprenom, true);
        array_push($nomprenom, htmlspecialchars($datajson[$i]["firstname"]));
        array_push($nomprenom, htmlspecialchars($datajson[$i]["lastname"]));
        echo(json_encode($nomprenom));

        die();
    }
}

if (sizeof($nomprenom) == 0) {
    array_push($nomprenom, false);
    echo(json_encode($nomprenom));
}


?>
