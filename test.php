<?php
function dbConnect() {
    $database = new PDO('mysql:host=mysql-javacrud.alwaysdata.net;dbname=javacrud_taxi;charset=utf8', 'javacrud', 'Javacrud.mysql');

    return $database;
}

// function dbConnect() {
//     $database = new PDO('mysql:host=localhost;dbname=Taxi;charset=utf8', 'admin', 'Admin1234!');

//     return $database;
// }


//ajoutes un versement
function addVersement($data) {
    $database = dbConnect();
    $stmt = $database->prepare("INSERT INTO Versements SET ChauffeurID=:ChauffeurID, Montant=:Montant, DateVersement=:DateVersement, TaxiID=:TaxiID");
    $stmt->bindParam(":ChauffeurID", $data['ChauffeurID']);
    $stmt->bindParam(":Montant", $data['Montant']);
    $stmt->bindParam(":DateVersement", $data['DateVersement']);
    $stmt->bindParam(":TaxiID", $data['TaxiID']);
    $stmt->execute();
}

$data['ChauffeurID'] = 1;
$data['Montant'] = 1234;
$data['DateVersement'] = '12/04/2022';
$data['TaxiID'] = 1;

addVersement($data);