<?php
include './public/header.php';
include './styles.php';
$chats = getChat();

?>

<main>
    <section>
        <h1>Gestion chats</h1>
        <div class="mb-3">
            <a href="ajoutChat.php" class="btn btn-success">Ajouter un nouveau Chat</a>
        </div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix Unitaire</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chats as $chat) { ?>
                    <tr>
                        <th scope="row"><?php echo $chat['id']; ?></th>
                        <th scope="row"><img src="<?php echo $chat['chemin']; ?>" width="100" height="100" alt=""></th>
                        <td><?php echo $chat['nom']; ?></td>
                        <td><?php echo $chat['prixUnitaire']; ?></td>
                        <td><?php echo $chat['quantite']; ?></td>
                        <td><?php echo $chat['description']; ?></td>
                        <td>
                            <a href="modifierChat.php?id=<?php echo $chat['id']; ?>" class="btn btn-info">
                                <i class="bi bi-pencil-square">
                                </i>
                            </a>
                            <a href="supprimerChat.php?id=<?php echo $chat['id']; ?>" class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </section>
</main>