<?php
//MODELE, fichier "user.php"
require_once 'connexion.php';
require_once "personne.php";

//UNTILISATEUR DE L'APPLI, l'admin
class User extends Personne {
    protected $prenom;
    protected $pwd;

    public function __construct($id, $prenom, $nom, $email, $numero, $statut, $pwd, $connect) {
        parent::__construct($id, $nom, $email, $numero, $statut, $connect);
        $this->prenom = $prenom;
        $this->pwd = $pwd;
    }


    
    //SETTERS PARAMETRE DE ADMIN
    public function setNom($nom){
        $this->nom = $nom;
        //Modifier dans bd
        $rqt = $this->connect->prepare("UPDATE users SET nom = :nom WHERE id = :id");
        $rqt->bindValue(':nom', $this->nom);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();
    }
    
    public function setPrenom($prenom){
        $this->prenom = $prenom;
        //Modifier dans bd
        $rqt = $this->connect->prepare("UPDATE users SET prenom = :prenom WHERE id = :id");
        $rqt->bindValue(':prenom', $this->prenom);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();
    }
    
    public function setEmail($email){
        $this->email = $email;
        //Modifier dans bd
        $rqt = $this->connect->prepare("UPDATE users SET email = :email WHERE id = :id");
        $rqt->bindValue(':email', $this->email);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();
    }
    
    public function setNumero($numero){
        $this->numero = $numero;
        //Modifier dans bd
        $rqt = $this->connect->prepare("UPDATE users SET numero = :numero WHERE id = :id");
        $rqt->bindValue(':numero', $this->numero);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();
    }
    
    public function setPwd($pwd){
        $this->pwd = $pwd;
        //Modifier dans bd
        $rqt = $this->connect->prepare("UPDATE users SET pwd = :pwd WHERE id = :id");
        $rqt->bindValue(':pwd', $this->nom);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();
    }
    


    //GETTERS

public function getNom(){
    $req = "SELECT nom FROM users WHERE id = :id";
        $rqt = $this->connect->prepare($req);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();
        $resultat = $rqt->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return  $resultat['nom'];
        } else {
            return 0; 
        }
    
}

public function getPrenom(){
    $req = "SELECT prenom FROM users WHERE id = :id";
        $rqt = $this->connect->prepare($req);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();
        $resultat = $rqt->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return  $resultat['prenom'];
        } else {
            return 0; 
        }
    
}

public function getEmail(){
    $req = "SELECT email FROM users WHERE id = :id";
        $rqt = $this->connect->prepare($req);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();
        $resultat = $rqt->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return  $resultat['email'];
        } else {
            return 0; 
        }
    
}

public function getNumero(){
    $req = "SELECT numero FROM users WHERE id = :id";
        $rqt = $this->connect->prepare($req);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();
        $resultat = $rqt->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return  $resultat['numero'];
        } else {
            return 0; 
        }
    
}

public function getPwd(){
    $req = "SELECT pwd FROM users WHERE id = :id";
    $rqt = $this->connect->prepare($req);
    $rqt->bindValue(':id', $this->id);
    $rqt->execute();
    $resultat = $rqt->fetch(PDO::FETCH_ASSOC);
    if ($resultat) {
        return $resultat['pwd'];
    } else {
        return 0; 
    }

}

public function getStatut(){
    $req = "SELECT statut FROM users WHERE id = :id";
    $rqt = $this->connect->prepare($req);
    $rqt->bindValue(':id', $this->id);
    $rqt->execute();
    $resultat = $rqt->fetch(PDO::FETCH_ASSOC);
    if ($resultat) {
        return $resultat['statut'];
    } else {
        return 0; 
    }

}

   // Méthode pour obtenir un client par ID
   public function getClient($id){
    $rqt = $this->connect->prepare("SELECT * FROM clients WHERE id = :id");
    $rqt->execute([":id"=>$id]);
    $resultat = $rqt->fetch(PDO::FETCH_ASSOC);
    if ($resultat) {
        return $resultat;
    } else {
        return false; // Renvoie false si aucun client trouvé
    }
}
     // Méthode pour obtenir un admin par ID
     public function getAdmin($id){
        $rqt = $this->connect->prepare("SELECT * FROM users WHERE id = :id");
        $rqt->execute([":id"=>$id]);
        $resultat = $rqt->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat;
        } else {
            return false; // Renvoie false si aucun admin trouvé
        }
    }
    //methode pour ajouter un client
    public function ajouterClient($data) {
        $q = $this->connect->prepare("INSERT INTO clients (nom, email, adresse, numero, sexe, statut) VALUES (:nom, :email, :adresse, :numero, :sexe, :statut)");
        $q->execute([
            ":nom" => $data["nom"],
            ":email" => $data["email"],
            ":adresse" => $data["adresse"],
            ":numero" => $data["numero"],
            ":sexe" => $data["sexe"],
            ":statut" => $data["statut"]
        ]);
    }

    
 
    //avoir tous les clients
    public function getAllClients() {
        $q = $this->connect->prepare("SELECT * FROM clients");
        $q->execute();
        return $q->fetchAll(); 
    }

    //avoir tous les admins
    public function getAllAdmins() {
        $q = $this->connect->prepare("SELECT * FROM users");
        $q->execute();
        return $q->fetchAll(); 
    }

   //avoir tous les archives
   public function getArchives() {
    $q = $this->connect->prepare("SELECT * FROM archives");
    $q->execute();
    return $q->fetchAll(); 
}

    //Option de filtrage
    public function filtrerClients($criteres) {
        $query = "SELECT * FROM clients WHERE 1=1";
        //ce tableau stocke tous les critère voulus par l'admin
        $params = [];
    
        if (!empty($criteres['nom'])) { //s'il veut trier par nom, cela est concaténé à la requête et le tableau $params reçoit un nouveau critère. c'est de même pour les autres critères
            $query .= " AND nom LIKE :nom";
            $params[':nom'] = "%" . $criteres['nom'] . "%";
        }
        if (!empty($criteres['email'])) {
            $query .= " AND email LIKE :email";
            $params[':email'] = "%" . $criteres['email'] . "%";
        }
        if (!empty($criteres['adresse'])) {
            $query .= " AND adresse LIKE :adresse";
            $params[':adresse'] = "%" . $criteres['adresse'] . "%";
        }
        if (!empty($criteres['numero'])) {
            $query .= " AND numero LIKE :numero";
            $params[':numero'] = "%" . $criteres['numero'] . "%";
        }
        if (!empty($criteres['sexe'])) {
            $query .= " AND sexe LIKE :sexe";
            $params[':sexe'] = "%" . $criteres['sexe'] . "%";
        }
        if (!empty($criteres['statut'])) {
            $query .= " AND statut LIKE :statut";
            $params[':statut'] = "%" . $criteres['statut'] . "%";
        }
    
        $rqt = $this->connect->prepare($query);
        $rqt->execute($params);
        return $rqt->fetchAll();
    }
    
    

    public function getAllClientsTrier($orderBy = 'nom', $orderDir = 'ASC') {
        $allowedColumns = ['nom', 'email', 'adresse', 'numero', 'sexe', 'statut'];
        $orderBy = in_array($orderBy, $allowedColumns) ? $orderBy : 'nom';
        $orderDir = strtoupper($orderDir) === 'DESC' ? 'DESC' : 'ASC';

        $sql = "SELECT * FROM clients ORDER BY $orderBy $orderDir";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    }


    public function ajouterAdmin($data) {
        if($this->getStatut() == "super admin"){
            $q = $this->connect->prepare("INSERT INTO users (prenom, nom, email, numero, pwd, statut) VALUES (:prenom, :nom, :email, :numero, :pwd, :statut)");
            $q->execute([
                ":prenom" => $data["prenom"],
                ":nom" => $data["nom"],
                ":email" => $data["email"],
                ":numero" => $data["numero"],
                ":pwd" => password_hash($data["pwd"], PASSWORD_BCRYPT),
                ":statut" => $data["statut"],
            ]);
        }else {
            header("location: erreurAcces.php"); 
            exit();
        }
       
    }


     // Méthode pour archiver un client
     public function archiverClient($id) {
        $data = $this->getClient($id);
        if ($data) {
            $q = $this->connect->prepare("INSERT INTO archives (id, nom, email, numero, statut) VALUES (:id, :nom, :email, :numero, :statut)");
            $q->execute([
                ":id" => $id,
                ":nom" => $data["nom"],
                ":email" => $data["email"],
                ":numero" => $data["numero"],
                ":statut" => "Client",
            ]);

            $rqt = $this->connect->prepare("DELETE FROM clients WHERE id = :id");
            $rqt->bindValue(':id', $id);
            $rqt->execute();
        } else {
           // echo "Client non trouvé";
        }
    }

  // Méthode pour archiver un admin
  public function archiverAdmin($id) {
    if ($this->getStatut() == "super admin") {
        $data = $this->getAdmin($id);
        if ($data) {
            $nom = $data["prenom"] . " " . $data["nom"];
            if ($data["statut"] == "admin") {
                $q = $this->connect->prepare("INSERT INTO archives (id, nom, email, numero,statut) VALUES (:id, :nom, :email, :numero,:statut)");
                $q->execute([
                    ":id" => $id,
                    ":nom" => $nom,
                    ":email" => $data["email"],
                    ":numero" => $data["numero"],
                    ":statut" => "Admin",
                ]);

                $rqt = $this->connect->prepare("DELETE FROM users WHERE id = :id");
                $rqt->bindValue(':id', $id);
                $rqt->execute();
            } else {
                echo "Vous ne pouvez pas supprimer un super admin";
            }
        } else {
            //echo "Admin non trouvé";
        }
    } else {
        $_SESSION["message"] = "Vous n'êtes pas super admin pour pouvoir assurer cette tâche";
        header("location: erreurAcces.php");
        exit();
    }
}


    public function imprimerListeClients() {
        
        $clients = $this->getAllClients();

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);

        // En-tête du tableau
        $pdf->Cell(20, 10, 'ID', 1);
        $pdf->Cell(40, 10, 'Nom', 1);
        $pdf->Cell(60, 10, 'Email', 1);
        $pdf->Cell(30, 10, 'Numero', 1);
        $pdf->Cell(40, 10, 'Statut', 1);
        $pdf->Ln();

        // Données des clients
        foreach ($clients as $client) {
            $pdf->Cell(20, 10, $client['id'], 1);
            $pdf->Cell(40, 10, $client['nom'], 1);
            $pdf->Cell(60, 10, $client['email'], 1);
            $pdf->Cell(30, 10, $client['numero'], 1);
            $pdf->Cell(40, 10, $client['statut'], 1);
            $pdf->Ln();
        }

        $pdf->Output('D', 'liste_clients.pdf');
    }
   
}
