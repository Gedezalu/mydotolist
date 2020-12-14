<?php
$route= (isset($_GET["route"]))? $_GET["route"]: "accueil";
var_dump($_GET);
switch($route){
case "accueil" : $template = "accueil.html";
break;
case "nouveauclient" : $template = "nouveauclient.html";
break;
default : $template = "accueil.html";
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