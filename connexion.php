<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "final_ecom1";
$dbport = 3306;
include './styles.php';


if (isset($_POST['connexion'])) {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    if (!empty($email) && !empty($mot_de_passe)) {
        $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
        if (!$conn) {
            die("Connexion echoue => " . mysqli_connect_error());
        }

        $sql = 'SELECT * FROM utilisateur WHERE email= ?';

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s", $email);

        $resultat = $stmt->execute();
        $resultat = $stmt->get_result();
        $resultatUtilisateur  = $resultat->fetch_assoc();
        var_dump($resultatUtilisateur);

        mysqli_close($conn);
    }
}


?>

<?php include "./public/header.php"; ?>
<main>

    <!-- début template listechats -->
    <section>
        <h1>Connexion</h1>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="mot_de_passe" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
        </form>

    </section>


</main>
</body>

</html>