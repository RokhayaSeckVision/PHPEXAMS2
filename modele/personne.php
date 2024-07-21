<?php
require_once 'connexion.php';

// CLASSE MERE DE USER ET CLIENT
class Personne {
    protected $id;
    protected $nom;
    protected $email;
    protected $numero;
    protected $statut; //cela va définir les droits d'accès s'il est admin et le statut(actif/inactif) s'il est client
    protected $connect;

    // CONSTRUCTEUR
    public function __construct( $id,$nom, $email, $numero, $statut,$connect) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->numero = $numero; 
        $this->statut = $statut; 
        $this->connect = $connect; 
    }
}
?>
