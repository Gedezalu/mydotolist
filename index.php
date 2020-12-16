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
session_start();
function ajoutUser() {
    require_once "model/Utilisateur.php";
    $users = json_decode(file_get_contents("datas/utilisateurs.json"));
    $count = count($users);
    $erreurinscription = "Une erreur est survenue pendant la saisie. Verifiez que tous les champs aient été saisie et que le mot de passe et sa confirmation soient bien identiques.";
    $validationpseudo = false;

    //condition permettant d'ajouter un id_utilisateur unique à chaque ajout de nouveau utilisateur.
   if (count($users) > 0 ){
        $nouvelleID = $users[array_key_last($users)]->id_utilisateur + 1;
    }else {
        $nouvelleID = 0; 
    };
    //Fin de la condition de nouvel utilisateur

// Utilisation d'une boucle for pour verifier que les pseudos soient differents'
    for ($i = 0; $i < $count; $i++){
        var_dump($users[$i]->pseudo);
        var_dump($_POST["pseudo"]);
        
        if($_POST["pseudo"] == $users[$i]->pseudo){
        $validationpseudo = 1;
          }else {
              $validationpseudo = true;
          }

    };
    // verification que les champs ont été rempli et que les mots de passes sont bien identiques
    if (!empty($_POST["pseudo"]) && !empty($_POST["motdepasse"]) && !empty($_POST["motdepasse2"]) && $_POST["motdepasse"] === $_POST["motdepasse2"] &&  $validationpseudo = true ){

    $user = new Utilisateur($_POST["pseudo"], $_POST["motdepasse"], $nouvelleID);
    $user->save_user();

    //Si les conditions de verifications sont validées, redirection de l'utilisateur vers la page d'accueil. (actuellment id_utilisateur =1, en attente d'implementation)
    header("Location:index.php?route=accueil");
    exit;
}else{
    $_SESSION["newsession"] =  $erreurinscription;
    header("Location:index.php?route=nouveauclient");
    var_dump( $_SESSION["newsession"]);
    echo $_SESSION["newsession"];
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