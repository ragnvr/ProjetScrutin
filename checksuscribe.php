<?php

$email  = htmlspecialchars($_GET["email"]);
$password  = htmlspecialchars($_GET["password"]);
//$password  = ($_GET["password"]);

$jsonString = file_get_contents('participants.json');
$datajson = json_decode($jsonString, true);



//var_dump($scrutin);

foreach ($datajson as $i => $etu) {
    if (($email== $datajson[$i]["email"])){// && ($password=== $datajson[$i]["password"])  ){//&& ($password=== $datajson[$i]["password"])) {
        echo  true ;
        die();
    }else if (($email=== $datajson[$i]["email"] && !isset($datajson[$i]["password"]))){
        echo false ;
        $datajson[$i]["password"] = $password;
        file_put_contents("participants.json", json_encode($datajson));
        die();
    }
}




$tableau = array("email" => $email, "password" =>$password );
array_push($datajson,$tableau );
file_put_contents("participants.json",json_encode($datajson));


?>