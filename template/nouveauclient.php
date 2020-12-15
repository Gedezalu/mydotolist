<?php
?>
<h1> S'enregistrer en tant que nouveau membre</h1>
<!-- Action="index.php?route=ajoutUser va permettre de rediriger les données du formulaire faire la fonction d'ajout d'utilisateur -->
    <form method="post" action="index.php?route=ajoutUser">
    <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudonyme"><br>
    <input type="text" id="motdepasse" name="motdepasse" placeholder="Entrez votre mot de passe"><br>
    <input type="text" id="motdepasse2" name="motdepasse2" placeholder="Confirmez votre mot de passe"><br>
    <input type="submit" value="Validez votre inscription">
    </form>
    <button><a href="index.php?route=accueil">Retour à l'écran de connexion</a> </button>