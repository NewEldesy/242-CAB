<?php
include_once('conf.php');

if (isset($_POST['envoyer'])) {
    $marque = $_POST['marque'];
    $numeroplaque = $_POST['Numeroplaque'];
    $date = $_POST['date'];
    $query = $connexion->prepare("INSERT INTO taxis (marque,NumeroPlaque,DateMiseEnCirculation) VALUES (?, ? ,?)");
    $query->bind_param('sss', $marque , $numeroplaque ,$date);
    if ($query->execute()) {
        header("Location: index.php");
        exit();
    }else{
        die("Erreur dans la requête : " . $connexion->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion_de_taxi</title>
</head>
<body>
    <!-- Start Menu -->
    <ul>
        <li><a href="index.php">Acceuil</a></li>
        <li><a href="chauffeur.php">Chauffeur</a></li>
        <li><a href="attribution.php">Gestion Taxi</a></li>
        <li><a href="panne.php">Panne</a></li>
        <li><a href="versement.php">Versement</a></li>
    </ul>
    <!-- End Menu -->

    <form action="index.php" method="POST">
        <label for="marque">Marque voiture</label>
        <br>
        <input type="text" name="marque">
        <br><br>
        <label for="Numeroplaque">Numero de plaque</label>
        <br>
        <input type="text" name="Numeroplaque">
        <br><br>
        <label for="date">Date Ajout</label>
        <br>
        <input type="date" name="date" >
        <br><br>
        <input type="submit" value="Apply" name="envoyer">
    </form>
</body>
</html>