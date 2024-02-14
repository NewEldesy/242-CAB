<?php
include_once('conf.php');


if (isset($_POST['confirmation'])) {
    $datepanne = $_POST['datepanne'];
    $description = $_POST['description'];
    $TaxiID = $_POST['TaxiID'];
    $query = $connexion->prepare("INSERT INTO pannes (TaxiID,DatePanne,Description) VALUES (?, ? ,?)");
    $query->bind_param('sss', $TaxiID , $datepanne ,$description);
    if ($query->execute()) {
        header("Location: panne.php");
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

<form action="" method="POST">
    <?php
        // Requête pour récupérer les numéros de plaque depuis la table Taxis
        $sql = "SELECT TaxiID,NumeroPlaque FROM Taxis";
        $result = $connexion->query($sql);

        // Vérifier s'il y a des résultats
        if ($result->num_rows > 0) {
            // Créer le code HTML du combobox
            echo '<label for="TaxiID"> ID DU TAXI</label>
            <br>
            <select name="TaxiID" id="TaxiID">';
            
            // Afficher chaque numéro de plaque dans le combobox
            while($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["TaxiID"] . '">' . $row["NumeroPlaque"] . '</option>';
            }
            echo '</select><br><br>';
        } else {
            echo "Aucun taxi trouvé.<br><br>";
        }

        // Fermer la connexion à la base de données
        $connexion->close();
    ?>

    <label for="">Date Panne</label>
    <br>
    <input type="date" name="datepanne">
    <br><br>
    <label for="">Description Panne</label>
    <br>
    <input type="text" name="description">
    <br><br>
    <input type="submit" value="Apply" name="confirmation">
</form>