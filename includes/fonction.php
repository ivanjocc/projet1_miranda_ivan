<?php
session_start();
if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] =array();
}

/**
 * Connexion avec la base de donnee
 *
 * @return mysqli | false
 */
function connexionDB(){
    $dbhost = "localhost";
    $dbuser="root";
    $dbpassword="";
    $dbname ="final_ecom1";
    $dbport = 3306;

    $conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname,$dbport);

    if (!$conn) {
        die("Erreur de connexion => ".mysqli_connect_error());
    }
    return $conn;
}

function afficheFichierFonction(){
    echo 'Je suis dans mon fichier fonction';
}

/**
 * Ajout produit
 *
 * @param string $nom
 * @param float $prix
 * @param int $quantite
 * @param string $description
 * @return bool
 */

function ajoutChat($nom,$prix,$quantite,$description="",$chemin=""){
    $connexion = connexionDB();

    $sql = "INSERT INTO produit(nom,prixUnitaire,description,quantite) values(?,?,?,?)";
    $stmt = $connexion->prepare($sql);
    // s =>string , d => double|float, i => int, b => bool
    $stmt->bind_param("sdsi",$nom,$prix,$description,$quantite);
    $resultat = $stmt->execute();
    $id_chat = $connexion->insert_id;
    $stmt->close();
    $connexion->close();
   
    if($resultat){
        if(!empty($chemin)){
            enregistrerImage($id_chat,$chemin);
        }
       header('Location: ./gestionChat.php');
       
    }else{
        echo "Une erreur lors de l'ajout du chat";
    }
    $stmt->close();
    $connexion->close();

}

/**
 * getChat
 * Fonction qui vas dans la base de donnee et recherche tous les chats puis les retournes
 * @return array de chat
 */
function getChat(){
    // connexion a la base de donnee
    $conn = connexionDB();
    $sql = "SELECT p.id, p.nom,p.description,p.prixUnitaire,p.quantite, i.chemin FROM produit p 
    JOIN Image i ON p.id = i.id_produit; ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // retourne le resultats de la requete sql et stocke la dans la variable resultats
    $resultats = $stmt->get_result();
    // creation d'un tableau vide pour stocker mes chats
    $chats = array();
    foreach ($resultats as $chat) {
        $chats[] = $chat;
    }
    return $chats;
}

function deleteById($id){
    $conn = connexionDB();
    // recherche element 
    $chat = getChatById($id);
   //
    if($chat){
        $sql = 'delete from produit where id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$id);
        $result = $stmt->execute();
    if ($result) {
        header('Location: ./gestionChat.php');
    }
    }
    else{
        echo "Erreur de suppression";
    }
}

function getChatById($id){

    $conn = connexionDB();
    $sql = 'SELECT p.id, p.nom,p.description,p.prixUnitaire,p.quantite, i.chemin FROM produit p 
    JOIN Image i ON p.id = i.id_produit where p.id =?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $resultat = $stmt->get_result();
    $chat = $resultat->fetch_assoc();

    return $chat;
}
function updateChatById($id,$nom,$quantite,$description,$prix){
    $conn = connexionDB();

    $sql = 'Update produit set nom = ?, quantite = ?, description = ?, prixUnitaire = ? where id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sisdi',$nom,$quantite,$description,$prix,$id);
    $result =$stmt->execute();
    
    if ($result) {
        header('Location: ./gestionChat.php');
    }


}
function ajoutPanier($id,$quantite){
    $_SESSION['panier'][$id]= $quantite;
   header('Location: ./chat_client.php');
}
function quantiterPanier(){
    $compteElement = count($_SESSION['panier']);
    
    return $compteElement;
}
function getAllPanier(){
    return $_SESSION['panier'];  
}

function enregistrerImage($id_chat,$chemin){
    $connexion = connexionDB();
    $sql ="INSERT INTO Image(id_produit,chemin) values(?,?)";
    $stmt =  $connexion->prepare($sql);
    $stmt->bind_param('is',$id_chat,$chemin);
    $resultat = $stmt->execute();
    if($resultat){
        // header("Location: ./gestionChat.php");
    }
    else{
         echo "Une erreur c' est produit";
    }
}






?>