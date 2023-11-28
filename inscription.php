<?php
include './styles.php';

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "final_ecom1";
$dbport = 3306;

if (isset($_POST['envoyer'])) {
    // recuperation des elements de mon formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $date_naissance = $_POST['date_naissance'];
    $password = $_POST['password'];
    $c_password = $_POST['c-password'];
    if ($password === $c_password) {
        // creation du mysqli pour annuler les attaque par injection sql niveau 1 
        $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
        $nom = mysqli_real_escape_string($conn, $nom);
        $prenom = mysqli_real_escape_string($conn, $prenom);
        $email = mysqli_real_escape_string($conn, $email);
        $telephone = mysqli_real_escape_string($conn, $telephone);
        $date_naissance = mysqli_real_escape_string($conn, $date_naissance);
        $password = mysqli_real_escape_string($conn, $password);

        //   crypter le mot de passe
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Utilisateur(nom,email,prenom,mot_de_passe,telephone,date_naissance) 
      values (?,?,?,?,?,?)";
        // vas dans le conn qui est un object et utilise la methode(fonction) prepare   
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ssssss", $nom, $email, $prenom, $password, $telephone, $date_naissance);

        $resultat = $stmt->execute();
        if ($resultat) {
            echo "Utilisateur enregistre";
        } else {
            echo "Une erreur est survenue";
        }
    }
}

?>


<?php include "./public/header.php"; ?>
<main>

    <!-- début template listechats -->
    <section>
        <h1>Inscription</h1>

        <form method="post">
            <div class="container">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom">
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Courriel</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label for="telephone" class="form-label">Numero de telephone</label>
                    <input type="text" name="telephone" class="form-control" id="telephone">

                </div>
                <div class="mb-3">
                    <label for="date_naissance" class="form-label">Date de Naissance</label>
                    <input type="date" name="date_naissance" class="form-control" id="date_naissance">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirmer Mot de passe</label>
                    <input type="password" name="c-password" class="form-control" id="exampleInputPassword1">
                </div>
                <br>
                <div class="d-grid gap-2">
                    <button type="submit" name="envoyer" class="btn btn-primary">Inscription</button>
                </div>

            </div>
        </form>

    </section>


</main>
</body>

</html>