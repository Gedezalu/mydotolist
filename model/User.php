<?php
class Utilisateur{
private $id_utilisateur;
private $pseudo;
private $motdepasse;


function __construct(int $id_utilisateur, string $pseudo, string $motdepasse) {
    $this->id_utilisateur = $id_utilisateur;
    $this->pseudo = $pseudo;
    $this->motdepasse = $motdepasse;
}
    
}