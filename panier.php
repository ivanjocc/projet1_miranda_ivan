<?php

include './public/header.php';
include './styles.php';
$paniers = getAllPanier();
if (isset($_POST['modifierProduit'])) {
    $id = $_POST['id_chat'];
    $quantiteDemander = $_POST['quantiterDemander'];
    ajoutPanier($id, $quantiteDemander);
}
?>

<main>
    <section>
        <h1>Mon Panier</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix Unitaire</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantiter Demander</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($paniers as $idchat => $quantiterDemander) {
                    $chat = getChatById($idchat);
                ?>
                    <form method="post">
                        <tr>
                            <th scope="row"><input type="hidden" name="id_chat" value="<?php echo $idchat; ?>"></th>
                            <td><?php echo $chat['nom']; ?></td>
                            <td><?php echo $chat['prixUnitaire']; ?></td>
                            <td><?php echo $chat['description']; ?></td>
                            <td><input min="1" max="<?php echo $chat['quantite']; ?>" type="number" value="<?php echo $quantiterDemander ?>" name="quantiterDemander"></td>
                            <td>
                                <button type="submit" class="btn btn-info" name="modifierProduit">
                                    <i class="bi bi-pencil-square">
                                    </i>
                                </button>
                                <a href="supprimerPanier.php?id=<?php echo $chat['id']; ?>" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </form>
                <?php } ?>

            </tbody>
        </table>

        <div id="paypal-payment-button"></div>
    </section>
</main>

<script src="https://www.paypal.com/sdk/js?client-id=AWGSEJUMQgafy_eNVxzN22Yuh45Gr4MKGGCV6lDnNZ_FFAhVPsBfJ2sdPMlChn1GHEPUdQO98Vs6t9hV&currency=CAD"></script>
<script src="./public/paypal.js"></script>