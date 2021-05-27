<?php

$etudiant  = htmlspecialchars($_GET["etudiant"]);
$infojsonstring = file_get_contents('etudiantINFO.json');
if ($etudiant == "etudiantinfo")
echo $infojsonstring;
else echo"pas trouvé";


?>
