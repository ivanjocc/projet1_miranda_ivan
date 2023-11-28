<?php
include "./public/header.php";
include './styles.php';
$chats = getChat();
?>

<main>
    <section>
        <h1>Liste des chats</h1>

        <div class="row">
            <?php foreach ($chats as $chat) { ?>

                <div class="col-5">
                    <div class="card " style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $chat['nom'] ?></h5>
                            <p class="card-text"><?php echo $chat['description'] ?></p>
                            <p class="text-info"> Prix : <span class="text-danger"><?php echo $chat['prixUnitaire'] ?></span></p>
                            <p class="text-info"> Quantite en stock :<?php echo $chat['quantite'] ?></p>
                            <a href="chat_detail.php?id=<?php echo $chat['id']; ?>" class="btn btn-primary">Voir</a>
                            <a href="#" class="btn btn-primary">Payer</a>
                        </div>
                    </div>

                <?php } ?>
                </div>
        </div>
    </section>
</main>