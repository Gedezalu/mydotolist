<?php
$route= (isset($_GET["route"]))? $_GET["route"]: "accueil";
switch($route){
case "accueil" : $template = "accueil.html";
break;
case "nouveauclient" : $template = "nouveauclient.php";
break;
case "ajoutUser" : ajoutUser();
break;
default : $template = "accueil.html";
}
function ajoutUser() {
    require_once "model/Utilisateur.php";
    $users = json_decode(file_get_contents("datas/utilisateurs.json"));
    // verification que les champs ont été rempli et que les mots de passes sont bien identiques
    if (!empty($_POST["pseudo"]) && !empty($_POST["motdepasse"]) && !empty($_POST["motdepasse2"]) && $_POST["motdepasse"] === $_POST["motdepasse2"] ){

    $user = new Utilisateur($_POST["pseudo"], $_POST["motdepasse"], $id_utilisateur = 1);
    $user->save_user();

    //Si les conditions de verifications sont validées, redirection de l'utilisateur vers la page d'accueil. (actuellment id_utilisateur =1, en attente d'implementation)
    header("Location:index.php?route=accueil");
    exit;
}else{
    header("Location:index.php?route=nouveauclient");
    echo "Une erreur est survenue pendant la saisie. Verifiez que tous les champs aient été saisie et que le mot de passe et sa confirmation soient bien identiques.";
}
};

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php require "template/$template"; ?>
</body>
</html>