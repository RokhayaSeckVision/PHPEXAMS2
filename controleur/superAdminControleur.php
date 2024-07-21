<?php
//CLASSE CONTROLEUR DU SUPER ADMIN, fichier "superAdminControleur.php"
require_once "connexion.php";
require_once "modele/personne.php";
require_once "modele/superAdmin.php";
require_once "modele/client.php";

class SuperAdminControleur {
    protected $superAdmin; // qui sera l'objet super admin
    protected $connect ;
    public function __construct($superAdmin,$connect) {
        $this->superAdmin = $superAdmin;
        $this->connect = $connect;
    }


    

}

