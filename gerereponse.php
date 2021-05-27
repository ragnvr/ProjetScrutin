<?php
$data = $_POST["data"];

$fichiersrcutin = file_get_contents('scrutin.json', true);
$fichiersrcutin = json_decode($fichiersrcutin, true);

//echo (json_encode($fichiersrcutin[1]["participant"][4][2]));

//Parcours le fichier scrutin
for ($i = 0; $i < sizeof($fichiersrcutin); $i++) {

    //Si on trouve le numéro du scrutin
    if ($fichiersrcutin[$i]["nbscrutin"] == $data['numeroscrutin']) {
        //Parcours les participants du scrutin
        for ($j = 0; $j < sizeof($fichiersrcutin[$i]["participant"]); $j++) {
            //Si on trouve l'email de celui qui vote
            if (trim($fichiersrcutin[$i]["participant"][$j][0]) == $data["email"]) {
                //Si son nombre de orcuration est inférieur ou egale a 0
                if ($fichiersrcutin[$i]["participant"][$j][1] <= 0 || $fichiersrcutin[$i]["participant"][$j][1] == "" ) {
                    //On met a true donc il pet
                    $fichiersrcutin[$i]["participant"][$j][2] = "true";
                    //On change ça réponse
                    $fichiersrcutin[$i]["participant"][$j][3] = $data["reponse"];
                }
                //On decrement son nombre de procuration
                $fichiersrcutin[$i]["participant"][$j][1] -= 1;
                //le taux de participation est mis a jour
                $fichiersrcutin[$i]["tauxdeparticiaption"] = (($fichiersrcutin[$i]["tauxdeparticiaption"] + 1) / sizeof($fichiersrcutin[$i]["participant"])) * 100;
                //nomnbre de vote est incrementé
                $fichiersrcutin[$i]["nbvote"] += 1;
                //nb de vote d'une réponse est incrémenté
                $fichiersrcutin[$i]["nbreponse"][$data["nbreponse"]] += 1;
                //$fichiersrcutin[$i]["nbreponse"][$a] /= $fichiersrcutin[$i]["nbvote"];
                echo json_encode("yess");

            }
        }
    }


}

file_put_contents("scrutin.json", json_encode($fichiersrcutin));