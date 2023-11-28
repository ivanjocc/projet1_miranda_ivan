<?php
include './public/header.php';
include './styles.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $chat = getChatById($id);
    if (isset($_POST['save'])) {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $prixU = $_POST['prixU'];
        $quantite = $_POST['quantite'];
        if (empty($nom) || empty($prixU) || empty($quantite)) {
            echo 'Remplir tous les champs';
        } else {
            updateChatById($id, $nom, $quantite, $description, $prixU);
        }
    }
}
?>


<main>
    <section>
        <h1>Modifier Chat</h1>

        <form method="post">
            <img src="<?php echo $chat['chemin']; ?>" width="200" height="200" alt="">
            <div class="mb-3">
                <label for="image" class="form-label">Importer Une Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" value="<?php echo $chat['nom']; ?>">
            </div>
            <div class="mb-3">
                <label for="prixU" class="form-label">Prix Unitaire</label>
                <input type="number" value="<?php echo $chat['prixUnitaire']; ?>" class="form-control" name="prixU" min=0>
            </div>
            <div class="mb-3">
                <label for="quantite" class="form-label">Quantite</label>
                <input type="number" value="<?php echo $chat['quantite']; ?>" class="form-control" name="quantite" min=0>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3"><?php echo $chat['description']; ?></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" name="save" value="Enregistrer Chat" class="btn btn-success">
            </div>
        </form>

    </section>

</main>