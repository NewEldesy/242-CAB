<?php

function dbConnect() {
    $database = new PDO('mysql:host=localhost;dbname=Taxi;charset=utf8', 'admin', 'Admin1234!');

    return $database;
}

function CompteTaxis() {
    $database = dbConnect();
    $stmt = $database->query("SELECT COUNT(*) FROM Taxis");
    $compte = $stmt->execute();

    return $compte;
}

function CompteChauffeur() {
    $database = dbConnect();
    $stmt = $database->query("SELECT COUNT(*) FROM 	Chauffeurs");
    $compte = $stmt->execute();

    return $compte;
}

function ComptePanne() {
    $database = dbConnect();
    $stmt = $database->query("SELECT COUNT(*) FROM Pannes");
    $compte = $stmt->execute();

    return $compte;
}

function CompteVersement() {
    $database = dbConnect();
    $stmt = $database->query("SELECT COUNT(*) FROM 	Versements");
    $compte = $stmt->execute();

    return $compte;
}


function getTaxi() {
    $database = dbConnect();
    $statement = $database->query("SELECT * FROM Taxis");
    $posts = [];
    while (($row = $statement->fetch())) {
        $post = [
            'id' => $row['TaxiID'],
            'Marque' => $row['Marque'],
            'NumeroPlaque' => $row['NumeroPlaque'],
            'DateMiseEnCirculation' => $row['DateMiseEnCirculation'],
        ];
        $posts[] = $post;
    }

    return $posts;
}

function getVersement() {
    $database = dbConnect();
    //
    $statement = $database->query("SELECT * FROM Taxis");
    $posts = [];
    while (($row = $statement->fetch())) {
        $post = [
            'id' => $row['TaxiID'],
            'Marque' => $row['Marque'],
            'NumeroPlaque' => $row['NumeroPlaque'],
            'DateMiseEnCirculation' => $row['DateMiseEnCirculation'],
        ];
        $posts[] = $post;
    }

    return $posts;
}

function getPanne() {
    $database = dbConnect();
    //
    $statement = $database->query("SELECT * FROM Taxis");
    $posts = [];
    while (($row = $statement->fetch())) {
        $post = [
            'id' => $row['TaxiID'],
            'Marque' => $row['Marque'],
            'NumeroPlaque' => $row['NumeroPlaque'],
            'DateMiseEnCirculation' => $row['DateMiseEnCirculation'],
        ];
        $posts[] = $post;
    }

    return $posts;
}

function getChauffeur() {
    $database = dbConnect();
    //
    $statement = $database->query("SELECT * FROM Taxis");
    $posts = [];
    while (($row = $statement->fetch())) {
        $post = [
            'id' => $row['TaxiID'],
            'Marque' => $row['Marque'],
            'NumeroPlaque' => $row['NumeroPlaque'],
            'DateMiseEnCirculation' => $row['DateMiseEnCirculation'],
        ];
        $posts[] = $post;
    }

    return $posts;
}

function getAttribution() {
    $database = dbConnect();
    //
    $statement = $database->query("SELECT * FROM Taxis");
    $posts = [];
    while (($row = $statement->fetch())) {
        $post = [
            'Id' => $row['TaxiID'],
            'Marque' => $row['Marque'],
            'NumeroPlaque' => $row['NumeroPlaque'],
            'DateMiseEnCirculation' => $row['DateMiseEnCirculation'],
        ];
        $posts[] = $post;
    }

    return $posts;
}

function addTaxi($data) {
    $database = dbConnect();
    $stmt = $database->prepare("INSERT INTO Taxis SET Marque=:Marque, NumeroPlaque=:NumeroPlaque, DateMiseEnCirculation=:DateMiseEnCirculation");
    $stmt->bindParam(":Marque", $data['Marque']);
    $stmt->bindParam(":NumeroPlaque", $data['NumeroPlaque']);
    $stmt->bindParam(":DateMiseEnCirculation", $data['DateMiseEnCirculation']);
    $stmt->execute();
}

function addChauffeur($data) {
    $database = dbConnect();
    $stmt = $database->prepare("INSERT INTO Chauffeurs SET Nom=:Nom, Prenom=:Prenom");
    $stmt->bindParam(":NumeroPlaque", $data['NumeroPlaque']);
    $stmt->bindParam(":Prenom", $data['Prenom']);
    $stmt->execute();
}	

function addPanne($data) {
    $database = dbConnect();
    $stmt = $database->prepare("INSERT INTO Pannes SET TaxiID=:TaxiID, DatePanne=:DatePanne, Description=:Description");
    $stmt->bindParam(":TaxiID", $data['TaxiID']);
    $stmt->bindParam(":DatePanne", $data['DatePanne']);
    $stmt->bindParam(":Description", $data['Description']);
    $stmt->execute();
}

function addVersement($data) {
    $database = dbConnect();
    $stmt = $database->prepare("INSERT INTO Versements SET ChauffeurID=:ChauffeurID, Montant=:Montant, DateVersement=:DateVersement, TaxiID=:TaxiID");
    $stmt->bindParam(":ChauffeurID", $data['ChauffeurID']);
    $stmt->bindParam(":Montant", $data['Montant']);
    $stmt->bindParam(":DateVersement", $data['DateVersement']);
    $stmt->bindParam(":TaxiID", $data['TaxiID']);
    $stmt->execute();
}

function addAttribution($data) {
    $database = dbConnect();
    $stmt = $database->prepare("INSERT INTO AttributionTaxiChauffeur SET TaxiID=:TaxiID, ChauffeurID=:ChauffeurID, DateDebut=:DateDebut, DateFin=:DateFin");
    $stmt->bindParam(":TaxiID", $data['TaxiID']);
    $stmt->bindParam(":ChauffeurID", $data['ChauffeurID']);
    $stmt->bindParam(":DateDebut", $data['DateDebut']);
    $stmt->bindParam(":DateFin", $data['DateFin']);
    $stmt->execute();
}

function removeTaxi($id) {
    $database = dbConnect();
    $query = "DELETE FROM Taxis WHERE TaxiID=" . $id;
    $stmt = $connexion->prepare($query);
    $stmt->execute();
}

function removeChauffeur($id) {
    $database = dbConnect();
    $query = "DELETE FROM Chauffeurs WHERE ChauffeurID=" . $id;
    $stmt = $connexion->prepare($query);
    $stmt->execute();
}

function removePanne($id) {
    $database = dbConnect();
    $query = "DELETE FROM Pannes WHERE PanneID=" . $id;
    $stmt = $connexion->prepare($query);
    $stmt->execute();
}

function removeVersement($id) {
    $database = dbConnect();
    $query = "DELETE FROM Versements WHERE VersementID=" . $id;
    $stmt = $connexion->prepare($query);
    $stmt->execute();
}

function removeAttribution($id) {
    $database = dbConnect();
    $query = "DELETE FROM 	AttributionTaxiChauffeur WHERE id=" . $id;
    $stmt = $connexion->prepare($query);
    $stmt->execute();
}