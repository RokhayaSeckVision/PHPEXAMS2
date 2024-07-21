<?php
//CLASSE CONTROLEUR, fichier "controleurConnexions.php"
require_once "connexion.php";
require_once "modele/connexions.php";
require_once "modele/user.php";
require_once "modele/client.php";

class ControleurConnexions {
    protected $connexions; //objet du modele connexions
    protected $connect ;
    public function __construct($connexions,$connect) {
        $this->connexions = $connexions;
        $this->connect = $connect;
    }


    public function connexionSuperAdmin(){
        include 'vue/connexionSuperAdmin.php';
        //on récupère les valeurs du formulaire
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            if($this->connexions->connexionSuperAdmin($_POST)){
                header("Location:gestionDuSuperAdmin.php"); //on lui ouvre sa page de gestion , il poura gerer les admins et les clients
                exit();

            }

            
        }
    }
}