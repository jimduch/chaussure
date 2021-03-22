<?php
include_once "header.php";
?>
    <?php
include_once "connexion_bdd.php";
// J'établis la connexion à la bdd formationphp
$connexion = connexionbdd('chausseur');
// j'écris ma requête
$requete = "SELECT id, modele, prix, pointure, description FROM chaussure;";

// J'envoie ma demande
$resultat = $connexion->query($requete);
if (!$resultat) {
    $erreurs = $connexion->errorInfo();
    echo "Problème lors de l'exécution de la requête : " . $erreurs[2];

} else {
    // Nombre de résultats de la requête - compter le nombre de lignes
    $nbChaussures = $resultat->rowCount();
    // Donne moi tous les résultats et mets les dans un tableau associatif
    $integraliteResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);

    echo "<h3>Il y a $nbChaussures chaussures dans la boutique</h3>";

}
// Fermeture de la connexion
$conn1 = null;

?>
<table border=\"1\"><thead><tr>
<th>Nom du modèle</th>
<th>Description</th>
<th>Description</th>
<th>Pointure</th>
<th>Prix</th>
<th>action</th>
<th>action</th>
</tr>
<?php foreach ($integraliteResultat as $ligneTableau): ?>
            <tr>
                <td><?=$ligneTableau['modele']?></td>
                <td><?=$ligneTableau['description']?></td>
                <td><?=substr($ligneTableau['description'], 0, 20)?>...</td> <!-- <fonction pour demander les 20 premier caractere-->
                <td><?=$ligneTableau['pointure']?></td>
                <td><?=$ligneTableau['prix']?>€</td>
                <td><a href="detail_chaussure.php?id=<?=$ligneTableau['id']?>">Détail</a></td>
                <td><a href="modif.php?id=<?=$ligneTableau['id']?>">Modifier</a></td>    
            </tr>
<?php endforeach;?>
</table>
<form action="ajouter_chaussure.php" method="post">
    <input type="submit" value="ajouter une chaussure" name="ajouter">
</form>

</body>
</html>
