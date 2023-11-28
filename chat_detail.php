<?php
include './public/header.php';
include './styles.php';
$id = $_GET['id'];
$chat = getChatById($id);
if (isset($_POST['ajoutPanier'])) {

    $quantite = $_POST['quantiteDemander'];

    if ($quantite > 0) {
        ajoutPanier($id, $quantite);
    }
}
?>

<main>
    <section>
        <h1>Detail Chat</h1>

        <form method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" value="<?php echo $chat['nom']; ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="prixU" class="form-label">Prix Unitaire</label>
                <input type="number" value="<?php echo $chat['prixUnitaire']; ?>" class="form-control" name="prixU" min=0 disabled>
            </div>
            <div class="mb-3">
                <label for="quantite" class="form-label">Quantite</label>
                <input type="number" value="<?php echo $chat['quantite']; ?>" class="form-control" name="quantite" min=0 disabled>
            </div>
            <div class="mb-3">
                <label for="quantiteDemander" class="form-label">Quantite Demander</label>
                <input type="number" class="form-control" name="quantiteDemander" min=0 max=<?php echo $chat['quantite']; ?>>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3" disabled><?php echo $chat['description']; ?></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" name="ajoutPanier" value="Ajouter au Panier" class="btn btn-success">
                <input type="submit" name="acheter" value="Acheter le produit" class="btn btn-success">
            </div>
        </form>
    </section>
</main>