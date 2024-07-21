<?php
//CLASSE CONTROLEUR, fichier "controleur.php"
require_once "connexion.php";
require_once "modele/personne.php";
require_once "modele/user.php";
require_once "modele/client.php";

class Controleur {
    protected $User;
    protected $connect ;
    public function __construct($User,$connect) {
        $this->User = $User;
        $this->connect = $connect;
    }

    //Methode Ajouter Client
    public function ajouterClient() {
        $_SESSION["message"] = "";
        include 'vue/ajouterClient.php';
        //on récupère les valeurs du formulaire
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->User->ajouterClient($_POST);
            echo  $_POST['nom']." a été ajouté(e) avec succès !";
            
        }
    }

    // Methode pour afficher tous les clients
    public function afficherTousLesClients() {
        
        $clients = $this->User->getAllClients();
        include 'vue/allClients.php';
    }

    // Methode pour afficher tous les admins
    public function afficherTousLesAdmins() {
        
        $admins = $this->User->getAllAdmins();
        include 'vue/allAdmins.php';
    }

    // Methode pour afficher  les archives
    public function afficherArchives() {
        
        $archives = $this->User->getArchives();
        include 'vue/archives.php';
    }

    //application des modif
    public function modifierClient(){
        
        $clients = $this->User->getAllClients();
        
        include 'vue/modifierClient.php';
        
       
        
        //var_dump($client = $this->User->getClient($idClient));
        //include 'vue/appliquerModification.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $client = $this->User->getClient($_POST["id_client_a_modifier"]);
             
             
             //CREATION DE L'OBJET CLIENT 
             $clientt = new Client($client["id"],$client["nom"],$client["email"],$client["adresse"],$client["numero"],$client["sexe"],$client["statut"],$this->connect);
             
             //APPLICATION DES MODIFICATIONS
             
             
             if(isset($_POST["nom"]) && !empty($_POST["nom"])){
                 $clientt->setNomClient($_POST["nom"]);
     
                 //echo "le nouveau nom est ".$client->getNomClient()."<br>";
             }
     
             if(isset($_POST["email"]) && !empty($_POST["email"])){
                 $clientt->setEmailClient($_POST["email"]);
                 ///echo "le nouveau emal est ".$client->getPrenom()."<br>";
             }
     
             if(isset($_POST["adresse"]) && !empty($_POST["adesse"])){
                 $clientt->setEmailClient($_POST["adresse"]);
                // echo "le nouvel email est ".$client->getEmail()."<br>";
             }
     
             if(isset($_POST["numero"]) && !empty($_POST["numero"])){
                 $clientt->setNumeroClient($_POST["numero"]);
                // echo "Votre nouveau numéro est ".$client->getNumero()."<br>";
             }
     
             if(isset($_POST["sexe"]) && !empty($_POST["sexe"])){
                 $clientt->setSexeClient($_POST["sexe"]);
             }
             if(isset($_POST["statut"]) && !empty($_POST["statut"])){
                 $clientt->setStatutClient($_POST["statut"]);
             }
         
             
         }
         
         /*header("Location:gestionDuSuperAdmin.php");
            exit();*/
        }

        //FILTRES

       

        public function filtrer() {
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['filtrer'])) {
                $criteres = [
                    'nom' => $_POST['nom'] ?? '',
                    'email' => $_POST['email'] ?? '',
                    'adresse' => $_POST['adresse'] ?? '',
                    'numero' => $_POST['numero'] ?? '',
                    'sexe' => $_POST['sexe'] ?? '',
                    'statut' => $_POST['statut'] ?? '',
                ];
                $clients = $this->User->filtrerClients($criteres);
            } else {
                $clients = $this->User->getAllClients();
            }
            include 'vue/filtre.php';
        }

         // Méthode pour archiver les clients
    public function archiverClient() {
        session_start();
        include 'vue/archiverClient.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['client_id'])) {
            $clientId = $_POST['client_id'];
            $client = $this->User->getClient($clientId);
            if ($client) {
                $client->setStatutClient('inactif');
                $this->User->updateClient($client);
                //header('Location: index.php');
                //exit();
            } else {
                $error = "Client introuvable.";
            }
        }

        $clients = $this->User->getAllClients();
        
    }

     //Methode pour le triage 
     public function afficherClientsTries() {
        // Récupérer les paramètres de tri
        $orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'nom';
        $orderDir = isset($_GET['orderdir']) ? $_GET['orderdir'] : 'ASC';

        // Récupérer les clients triés
        $clients = $this->User->getAllClientsTrier($orderBy, $orderDir);

        // Inclure la vue
        include 'vue/allClients.php';
    }


     //metode pour ajouter un admin par le super admin

     public function ajouterAdmin(){
        $_SESSION["message"] = " ";
        include 'vue/ajouterAdmin.php';
        //on récupère les valeurs du formulaire
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $this->User->ajouterAdmin($_POST);
            echo $_POST["prenom"]. " " . $_POST["nom"]." a été enregistré avec succès en tant que ". $_POST["statut"];
           
        }
    }

    // Méthode pour appliquer l'archivage
    public function appliquerArchivage() {
        $clients = $this->User->getAllClients();
        
        include "vue/archiverClient.php";
        $message = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $clientId = $_POST['id_client_a_archiver'];
            $this->User->archiverClient($clientId);
            $client = $this->User->getClient($clientId);
            $message = "Client archivé avec succès";
        }
    }

     // Méthode pour appliquer l'archivage de l'admin
     public function appliquerArchivageAdmin() {
        $admins = $this->User->getAllAdmins();
        
        include "vue/archiverAdmin.php";
        $message = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Id = $_POST['id_admin_a_archiver'];
            $this->User->archiverAdmin($Id);
            $client = $this->User->getAdmin($Id);
            $message = "Admin archivé avec succès";
        }
    }

    public function exporterCSV() {
        include 'vue/allClients.php';
        $clients = $this->User->getAllClients();
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="clients.csv"');
        
        $output = fopen('php://output', 'w');
        fputcsv($output, array('ID', 'Prenom & Nom', 'Email', 'Adresse', 'Numero', 'Sexe', 'Statut'));

        foreach ($clients as $client) {
            fputcsv($output, $client);
        }

        fclose($output);
        exit();
    }

    public function genererRapport() {
        
        $clients = $this->User->getAllClients();
        include 'vue/rapportClient.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $clientId = $_POST['id_client'];
            $client = $this->User->getClient($clientId);
            $_SESSION["clientid"] = $client["id"];
            $_SESSION["clientnom"] = $client["nom"];
            $_SESSION["clientemail"] = $client["email"];
            $_SESSION["clientadresse"] = $client["adresse"];
            $_SESSION["clientnum"] = $client["numero"];
            $_SESSION["clientsexe"] = $client["sexe"];
            $_SESSION["clientstatut"] = $client["statut"];
            header("location: clientRapport.php");
            exit();

            
        }
    }
}

   


   
        
    
