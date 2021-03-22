<?php
// Si aucun code n'est saisi, on redirige vers la page de saisie du code
if (empty($_POST['code'])) {header("Location:modif.html");}
?>
<?php
include_once "header.php";
?>
<?php
include_once "connexion_bdd.php";
$conn1 = connexionbdd('chausseur');

if (!isset($_POST['modif'])) {
    $code = $_POST['code'];
    // Requete
    $requete = "SELECT * FROM chaussure WHERE id = $code";
    $resultat = $conn1->query($requete);
    $donnees_chaussure = $resultat->fetch(PDO::FETCH_NUM);
    // Affichage du formulaire avec les informations déjà présentes en base
    echo "<form action=\" " . $_SERVER["PHP_SELF"] . "\" method=\"post\">";
    echo "<fieldset>";
    echo "<legend>Modification chaussure</legend>";
    echo "<label for=\"nom\" class=\"mylabel\">modele</label>";
    echo "<input type=\"text\" name=\"modele\" value=\"$donnees_chaussure[1]\">";
    echo "<br />";
    echo "<label for=\"ville\" class=\"mylabel\">prix</label>";
    echo "<input type=\"text\" name=\"prix\" value=\"$donnees_chaussure[2]\">";
    echo "<br />";
    echo "<label for=\"commission\" class=\"mylabel\">pointure</label>";
    echo "<input type=\"text\" name=\"pointure\" value=\"$donnees_chaussure[3]\">";
    echo "<br />";
    echo "<label for=\"telephone\" class=\"mylabel\">description</label>";
    echo "<input type=\"text\" name=\"description\" value=\"$donnees_chaussure[4]\">";
    echo "<input type=\"hidden\" name=\"id\" value=\"$code\">";
    echo "<br />";
    echo "<input type=\"submit\" name=\"modif\" value=\"MODIFIER\">";
    echo "</fieldset></form>";

} elseif (!empty($_POST['id']) && !empty($_POST['modele']) && !empty($_POST['prix']) && !empty($_POST['pointure']) && !empty($_POST['description'])) {
    $code_chaussure = $conn1->quote($_POST['id']);
    $nom_chaussure = $conn1->quote($_POST['modele']);
    $ville_chaussure = $conn1->quote($_POST['prix']);
    $comm_chaussure = $conn1->quote($_POST['pointure']);
    $tel_chaussure = $conn1->quote($_POST['description']);


    // Requete SQL
    $requete = "UPDATE `chausseur`.`chaussure` SET `modele` = $nom_chaussure, `prix` = $ville_chaussure, `pointure` = $comm_chaussure, `description` = $tel_chaussure WHERE `id` = $code_chaussure;";
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


</body>

</html>
