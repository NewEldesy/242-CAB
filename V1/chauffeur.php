<?php
include_once('conf.php');


if (isset($_POST['envoyer'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $query = $connexion->prepare("INSERT INTO chauffeurs (nom,prenom) VALUES (?, ?)");
    $query->bind_param('ss', $nom,$prenom);
    if ($query->execute()) {
        header("Location: chauffeur.php");
        exit();
    }else{
        die("Erreur dans la requête : " . $connexion->error);
    }     
}
?>

<!-- Start Menu -->
<ul>
    <li><a href="index.php">Acceuil</a></li>
    <li><a href="chauffeur.php">Chauffeur</a></li>
    <li><a href="attribution.php">Gestion Taxi</a></li>
    <li><a href="panne.php">Panne</a></li>
    <li><a href="versement.php">Versement</a></li>
</ul>
<!-- End Menu -->

<form action="" method="post">
    <label for="nom">Nom</label>
    <br>
    <input type="text" name="nom">
    <br><br>
    <label for="prenom">Prénom</label>
    <br>
    <input type="text" name="prenom">
    <br><br>
    <input type="submit" value="Apply" name="envoyer">
</form>