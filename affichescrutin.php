<?php

$email  = htmlspecialchars($_GET["email"]);
$nbscrutin  = htmlspecialchars($_GET["numeroscrutin"]);
$jsonString = file_get_contents('scrutin.json');
$scrutin = json_decode($jsonString, true);
//echo ($scrutin[0]["nbscrutin"]);
//echo ($scrutin[0]["participant"][0]);

function est_dans  ($tab, $aemail){
    $a = "je suis dedans";
    $b = "je suis pas  dedans";
    for ($i=0 ; $i<= sizeof($tab ) ; $i++){
        if ($aemail == $tab[$i]){
            return true;
        }
    }
    return false ;
}


for ($i=0 ; $i<= sizeof($scrutin ) ; $i++){
    if ($nbscrutin==$scrutin[$i]["nbscrutin"]) {
        echo(json_encode($scrutin[$i]));

    }
}


?>
