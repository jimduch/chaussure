<?php
// Si aucun code n'est saisi, on redirige vers la page de saisie du code
if (empty($_POST['code'])) {header("Location:modif.html");}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .mylabel {
            min-width: 100px;
            display: inline-block;
        }
    </style>
    <title>Modifier agent</title>
</head>

<body>
<?php
include_once "connexion_bdd.php";
$conn1 = connexionbdd('formationphp');

if (!isset($_POST['modif'])) {
    $code = $_POST['code'];
    // Requete
    $requete = "SELECT * FROM agents WHERE AGENT_CODE = $code";
    $resultat = $conn1->query($requete);
    $donnees_agent = $resultat->fetch(PDO::FETCH_NUM);

} elseif (!empty($_POST['code']) && !empty($_POST['nom']) && !empty($_POST['ville']) && !empty($_POST['commission']) && !empty($_POST['telephone'])) {
    $code_agent = $conn1->quote($_POST['code']);
    $nom_agent = $conn1->quote($_POST['nom']);
    $ville_agent = $conn1->quote($_POST['ville']);
    $comm_agent = $conn1->quote($_POST['commission']);
    $tel_agent = $conn1->quote($_POST['telephone']);
    $pays_agent = $conn1->quote($_POST['pays']);

    // Requete SQL
    $requete = "UPDATE `formationphp`.`agents` SET `AGENT_NAME` = $nom_agent, `WORKING_AREA` = $ville_agent, `COMMISSION` = $comm_agent, `PHONE_NO` = $tel_agent, `COUNTRY` = $pays_agent WHERE `AGENT_CODE` = $code_agent;";
    $resultat = $conn1->exec($requete);

    if ($resultat != 1) {
        $erreur = $conn1->errorInfo();
        echo "Problème lors de l'insertion : " . $erreur[2] . " - Code : " . $conn1->errorCode();

    } else {
        echo "Modifications enregistrées.<br/>";
        echo "Nombre de lignes en base affectées : " . $resultat;
    }
}
$conn1 = null;

?>

<form action="modif_bis.php" method="post">
<fieldset>
<legend>Modification agent</legend>
<label for="nom" class="mylabel">Nom</label>
<input type="text" name="nom" value="<?=$donnees_agent[1]?>">
<br />
<label for="ville" class="mylabel">Ville</label>
<input type="text" name="ville" value="<?=$donnees_agent[2]?>">
<br />
<label for="commission" class="mylabel">Commission</label>
<input type="text" name="commission" value="<?=$donnees_agent[3]?>">
<br />
<label for="telephone" class="mylabel">Num. téléphone</label>
<input type="text" name="telephone" value="<?=$donnees_agent[4]?>">
<input type="hidden" name="pays" value="<?=$donnees_agent[5]?>">
<input type="hidden" name="code" value="<?=$code?>">
<br />
<input type="submit" name="modif" value="MODIFIER">
</fieldset></form>



</body>

</html>
