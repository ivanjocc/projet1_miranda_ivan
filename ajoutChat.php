<?php
include './public/header.php';
include './styles.php';

if (isset($_POST['save'])) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prixU = $_POST['prixU'];
    $quantite = $_POST['quantite'];
    if (empty($nom) || empty($prixU) || empty($quantite)) {
        echo 'Remplir tous les champs';
    } else {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $image_name = $_FILES["image"]["name"];
            $image_tmp = $_FILES["image"]["tmp_name"];
            $image_destination = "images/" . basename($image_name); // Chemin de destination du fichier sur le serveur

            // Vérifier que le fichier est une image (facultatif mais recommandé)
            $image_type = strtolower(pathinfo($image_destination, PATHINFO_EXTENSION));
            if (!in_array($image_type, array("jpg", "jpeg", "png", "gif"))) {
                echo "Seules les images JPG, JPEG, PNG et GIF sont autorisées.";
                exit();
            }

            // Déplacer l'image téléchargée vers le dossier spécifié
            if (move_uploaded_file($image_tmp, $image_destination)) {
                ajoutChat($nom, $prixU, $quantite, $description, $image_destination);
            }
        } else {
            ajoutChat($nom, $prixU, $quantite, $description);
        }
    }
}
?>

<main>
    <section>
        <h1>Ajout chat</h1>

        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="image" class="form-label">Importer Une Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom">
            </div>
            <div class="mb-3">
                <label for="prixU" class="form-label">Prix Unitaire</label>
                <input type="number" class="form-control" name="prixU" min=0>
            </div>
            <div class="mb-3">
                <label for="quantite" class="form-label">Quantite</label>
                <input type="number" class="form-control" name="quantite" min=0>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" name="save" value="Enregistrer Chat" class="btn btn-success">
            </div>
        </form>

    </section>

</main>