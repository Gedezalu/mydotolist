<?php
class Utilisateur{
private $id_utilisateur;
private $pseudo;
private $motdepasse;


function __construct(string $pseudo, string $motdepasse, int $id_utilisateur) {
    $this->id_utilisateur = $id_utilisateur;
    $this->pseudo = $pseudo;
    $this->motdepasse = $motdepasse;
}
function save_user() {
    //json_decode transforme le tableau en tableau et objet php
            $users = json_decode(file_get_contents("datas/utilisateurs.json"));
            //array_push permet d'ajouter à un tableau un nouvel élelment. get_object_vars récupère des données pour créer un tableau associatif
            array_push($users, get_object_vars($this));
    
            $handle = fopen("datas/utilisateurs.json", "w");
            //json_encode permet d'encoder en json
            $json = json_encode($users);
            fwrite($handle, $json);
            fclose($handle);
        }
        //static permet d'appeller diretement depuis la class et non l'objet
        static function getUser(): array{
     $users = json_decode(file_get_contents("datas\utilisateurs.json"));
            return $users;
        }
}