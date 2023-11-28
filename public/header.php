<?php
    include './includes/fonction.php';
    $quantite = quantiterPanier();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css?v=1.1">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed&display=swap" rel="stylesheet">

</head>
<header>
    <a href="index.php">
        <div id="logo">Le Chaton</div>
    </a>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="prochainement.php">Prochainement</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="gestionChat.php">Gestion des Chats</a></li>
            <li><a href="chat_client.php"> Les Chats</a></li>
            <li><a href="panier.php" class="btn btn-primary"><i class="bi bi-cart4"></i><?php echo $quantite; ?></a></li>
            
        </ul>
    </nav>
</header>
<body>

