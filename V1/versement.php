<?php
include_once('conf.php');

if (isset($_POST['excecuter'])) {
    $montant = $_POST['montant'];
    $dateversement = $_POST['dateversement'];
    $taxi = $_POST['TaxiID'];
    $chauffeur = $_POST['ChauffeurID'];

    $query = $connexion->prepare("INSERT INTO versements (ChauffeurID,Montant,DateVersement,TaxiID) VALUES (?, ?, ? ,?)");
    $query->bind_param('ssss',$chauffeur, $montant,$dateversement,$taxi);
    if ($query->execute()) {
        header("Location: versement.php");
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
    <?php
        // Requête pour récupérer les numéros de plaque depuis la table Taxis
        $sql = "SELECT TaxiID,NumeroPlaque FROM Taxis";
        $result = $connexion->query($sql);

        // Vérifier s'il y a des résultats
        if ($result->num_rows > 0) {
            echo '<label for="TaxiID">Immatriculation Taxi</label>
            <br>
            <select name="TaxiID" id="TaxiID">';
            
            // Afficher chaque numéro de plaque dans le combobox
            while($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["TaxiID"] . '">' . $row["NumeroPlaque"] . '</option>';
            }
            echo '</select><br><br>';
        } else {
            echo "<br>Aucun taxi trouvé.<br><br>";
        }

        // Requête pour récupérer les nom et prenom depuis la table chauffeurs
        $sql = "SELECT ChauffeurID,Nom,Prenom FROM Chauffeurs";
        $result = $connexion->query($sql);

        // Vérifier s'il y a des résultats
        if ($result->num_rows > 0) {
            echo '<label for="ChauffeurID">Chauffeur</label>
            <br>
            <select name="ChauffeurID" id="chauffeurID">';
            
            // Afficher chaque numéro de plaque dans le combobox
            while($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["ChauffeurID"] . '">' . $row['Nom'] . ' ' . $row['Prenom'] . '</option>';
            }
            echo '</select><br><br>';
        } else {
            echo "<br>Aucun chauffeur trouvé.<br><br>";
        }

        // Fermer la connexion à la base de données
        $connexion->close();
    ?>

    <label for="">Montant</label>
    <br>
    <input type="text" name="montant">
    <br><br>
    <label for="">Date Versement</label>
    <br>
    <input type="date" name="dateversement">
    <br><br>
    <input type="submit" value="Apply" name="excecuter">
</form>