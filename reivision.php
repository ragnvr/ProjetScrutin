<?php
//  $jour = $_REQUEST['x'];
$nom = $_REQUEST['nom'];
$id = $_REQUEST['id'];


//  $jourfunction = $_REQUEST['jour'];
//  $jour = $jour + 1;
//echo "voici les jours  <b>y</b> : ".$jour;
echo "Vous êtes : " . $nom;

// echo "voici les jours  <b>y</b> : ".$jourfunction;
echo "<br>";
///$textauthentification = "select* from client where nom=".$nom." AND idc=".$id;


$textauthentification = "select * from client where idc = ".$id."and nom = ".$nom;
               
               
$c = ocilogon("c##ldahala_a", "ldahala_a", "dbinfo");
if ($c == true) echo "Connexion réussie";
else  echo "Connexion pas réussie";

//$p_traitement3 = "begin traitement3(".$jour."); end;";

//$text = "delete Sejour where jour<=".$jour;
$ordre = ociparse($c, $textauthentification);
ociexecute($ordre);
echo "<br>";

if (ocifetchinto($ordre, $ligne))
    echo "bienvenue, " . $ligne[0] . ", " . $ligne[1];
else
    echo "tu n'existe pas";
//  echo "Nombre de jour détruit = ".oci_num_rows($ordre);
ocilogoff($c);
echo "<br>";

echo "Fin de la connexion";
?>