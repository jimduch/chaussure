<?php
// Ouverture de session
session_start();
// Vérification login et mot de passe
if (isset($_POST['login']) == "chausseur" && $_POST['password'] == 'chaussure') {
    $_SESSION['is_connected'] = true;
    $_SESSION['user'] = $_POST['login'];
    header("Location:index1.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 9.1</title>
</head>
<body>

<!--
1. Câbler le formulaire d'authentification login / mot de passe ci-dessous dans un fichier 9_1.php
 Le couple login / mot de passe autorisé est "formation" / "motdepasse"
 Si la vérification du login / mot de passe est OK, l'utilisateur est redirigé vers une page 9_2.php
-->
  <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
<fieldset><legend>Connexion</legend>
<label for="login">Login :</label>
<input type="text" name="login">
<label for="password">Mot de passe :</label>
<input type="password" name="password">
<input type="submit" name="authent" value="Se connecter">
</fieldset>
</form>
</body>
</html>