<?php
require_once 'personne.php';

// CLASSE CLIENT
class Client extends Personne {
    protected $adresse;
    protected $sexe;

    // CONSTRUCTEUR
    public function __construct( $id,$nom, $email, $numero, $adresse, $sexe, $statut,$connect) {
        Personne::__construct($id, $nom, $email, $numero, $statut,$connect); 
        $this->sexe = $sexe;
        $this->adresse = $adresse;
    }
    //Modification du nom
    public function setNomClient($nom){
        $this->nom = $nom;
        //Modifier dans bd
        $rqt = $this->connect->prepare("UPDATE clients SET nom = :nom WHERE id = :id");
        $rqt->bindValue(':nom', $this->nom);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();

          
    }
    

    public function setAdresseClient($adresse){
        $this->adresse = $adresse;
        //Modifier dans bd
        $rqt = $this->connect->prepare("UPDATE clients SET adresse = :adresse WHERE id = :id");
        $rqt->bindValue(':adresse', $this->adresse);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();

    }
    
    public function setEmailClient($email){
        $this->email = $email;
        //Modifier dans bd
        $rqt = $this->connect->prepare("UPDATE clients SET email = :email WHERE id = :id");
        $rqt->bindValue(':email', $this->email);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();
        
    }
    
    public function setNumeroClient($numero){
        $this->numero = $numero;
        //Modifier dans bd
        $rqt = $this->connect->prepare("UPDATE clients SET numero = :numero WHERE id = :id");
        $rqt->bindValue(':numero', $this->numero);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();

    }
    
    public function setSexeClient($sexe){
        $this->sexe = $sexe;
        //Modifier dans bd
        $rqt = $this->connect->prepare("UPDATE clients SET sexe = :sexe WHERE id = :id");
        $rqt->bindValue(':sexe', $this->sexe);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();

        
    }

    public function setStatutClient($statut){
        $this->statut = $statut;
        //Modifier dans bd
        $rqt = $this->connect->prepare("UPDATE clients SET statut = :statut WHERE id = :id");
        $rqt->bindValue(':statut', $this->statut);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();

        
    }


   
}
?>