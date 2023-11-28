<?php

include './includes/fonction.php';
include './styles.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteById($id);
}
