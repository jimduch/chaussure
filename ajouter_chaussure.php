<?php
include_once "header.php";
?>
  <?php

  if (isset($_POST['submit'])) {
      // CONTROLE DES DONNEES
      if (!empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['pointure']) && !empty($_POST['prix'])) {

          if (is_numeric($_POST['pointure']) && is_numeric($_POST['prix'])) {
              echo "Contrôles OK<br/>";
          } else {
              echo "La pointure et le prix doivent être des valeurs numériques <br/>";
          }

      } else {
          echo "Veuillez remplir tous les champs<br/>";
      }
  }

  ?>

<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
    <fieldset>
        <legend>Formulaire d' ajout de chaussure </legend>
          <label for="modele">nom du modèle</label>
        <input name="modele" type="text" placeholder="Entrez le modèle de chaussure"
        maxlength="100" size="40" value="<?php if (isset($_POST["modele"])) {echo $_POST["modele"];}?>">

        <br/>
            <label for="pointure">pointure</label>
        <input name="pointure" type="number" placeholder="pointure FR" size="50" value="<?php if (isset($_POST["pointure"])) {echo $_POST["pointure"];}?>">
      <br/>
        <label for="prix">prix</label>
    <input name="prix" type="number" placeholder="prix en €" size="50" value="<?php if (isset($_POST["prix"])) {echo $_POST["prix"];}?>">

      <br/>
      <br /><br />
      <label for="description" class="mylabel">Description</label><br />
      <textarea name="description" rows="4" cols="50">
          <?php if (isset($_POST['description'])) {
echo $_POST['description'];
}?>

</textarea><br />
      <br />
        <input type="submit" name="submit"value="enregistrer">
    </fieldset>
</form>
<?php
include_once "connexion_bdd.php";
$conn1 = connexionbdd('chausseur');

if (!empty($_POST['modele']) && !empty($_POST['pointure']) && !empty($_POST['prix']) && !empty($_POST['description'])) {
$modele_chaussure = $conn1->quote($_POST['modele']);
$pointure_chaussure = $conn1->quote($_POST['pointure']);
$prix_chaussure = $conn1->quote($_POST['prix']);
$commentaire = $conn1->quote($_POST['description']);
// Requete SQL
$requete = "INSERT INTO `chausseur`.`chaussure` (`modele`, `prix`, `pointure`, `description`) VALUES ($modele_chaussure,$prix_chaussure, $pointure_chaussure, $commentaire);"; // pas besoin de guillements si on applique la méthode quote() aux variables
$nbLignes = $conn1->exec($requete);

if ($nbLignes != 1) {
    $erreur = $conn1->errorInfo();
    echo "Problème lors de l'insertion : " . $erreur[2] . " - Code : " . $conn1->errorCode();
} else {
    echo "Nouvel chaussure enregistré, ID : " . $conn1->lastInsertId();
     // Last insert ID renvoie l'ID si elle est en mode auto_increment
     header("location:index2.php");
}
}

// Fermeture de la connexion
$conn1=null;

?>



</body>

</html>
