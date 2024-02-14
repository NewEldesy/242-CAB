<?php
include_once('conf.php');

if (isset($_POST['confirmation'])) {
    $DateDebut = $_POST['DateDebut'];
    $DateFin = $_POST['DateFin'];
    $taxi = $_POST['TaxiID'];
    $chauffeur = $_POST['ChauffeurID'];

    $query = $connexion->prepare(
        "INSERT INTO attributiontaxichauffeur (TaxiID,ChauffeurID,DateDebut,DateFin) VALUES (?, ?, ? ,?)");
    $query->bind_param('ssss',$taxi,$chauffeur, $DateDebut,$DateFin);
    if ($query->execute()) {
        header("Location: attribution.php");
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

    ?>
    <!-- Créer le code HTML du combobox -->
    <label for="TaxiID">Immatriculation Taxi</label>
    <br>
    <select name="TaxiID" id="TaxiID">
    
    <?php
        // Afficher chaque numéro de plaque dans le combobox
        while($row = $result->fetch_assoc()) {
    ?>
    <option value="<?=$row['TaxiID']?>"> <?= $row['NumeroPlaque']?></option>
        
    <?php
        }
    ?>
    </select>
    <br><br>

    <?php
        } else {
            echo "<br>Aucun taxi trouvé.<br><br>";
        }
    ?>
    <?php
        // Requête pour récupérer les numéros de plaque depuis la table Taxis
        $sql = "SELECT ChauffeurID,Nom,Prenom FROM 	Chauffeurs";
        $result = $connexion->query($sql);

        // Vérifier s'il y a des résultats
        if ($result->num_rows > 0) {
    ?>
    <!-- Créer le code HTML du combobox -->
    <label for="ChauffeurID">Chauffeur</label>
    <br>
    <select name="ChauffeurID" id="chauffeurID">';
    
    <?php
        // Afficher chaque numéro de plaque dans le combobox
        while($row = $result->fetch_assoc()) {
            var_dump($row);
    ?>
    <option value="<?=$row['ChauffeurID']?>"><?=$row['Nom'] . ' ' . $row['Prenom']?></option>
    <?php } ?>
    
    </select>
    <br><br>
    <?php
        } else {
            echo "<br>Aucun taxi trouvé.<br><br>";
        }

        // Fermer la connexion à la base de données
        $connexion->close();
    ?>

    <label for="">Début contrat</label>
    <br>
    <input type="date" name="DateDebut">
    <br><br>
    <label for="">Fin contrat</label>
    <br>
    <input type="date" name="DateFin">
    <br><br>
    <input type="submit" value="Apply" name="confirmation">
</form>