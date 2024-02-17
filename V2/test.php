<?php session_start(); ?>
<?php include_once('model.php'); ?>
<?php
    $_SESSION['username'] = "Fortune";
?>
<?php
    if(empty($_SESSION)) {
        header('location: index.php');
    }
    else {
        if(isset($_GET['page'])) {
            if($_GET['page'] == "taxi") {
                if(isset($_GET['choix'])) {
                    // Page Taxi
                    if($_GET['choix'] == "add") {
                        if(isset($_POST) && !empty($_POST)) {
                            addTaxi($_POST);
                            header('location:test.php?page=taxi&choix=view');
                        }
                        else {
                            include_once('app/taxi_add.php');
                        }
                    }
                    elseif($_GET['choix'] == "update") {
                        if(isset($_POST) && !empty($_POST)) {
                            updateTaxi($_POST);
                            header('location:test.php?page=taxi&choix=view');
                        }
                        else {
                            // Fonction pour récupérer le taxi correspondant à l'id
                            $result = getTaxiById($_GET['id']);
                            //var_dump($result); die();
                            include('app/taxi_update.php');
                        }
                    }
                    elseif($_GET['choix'] == "view") {
                        // Fonction pour afficher les taxis
                        $results = getTaxi();
                        include_once('app/taxi_view.php');
                    }
                    elseif($_GET['choix'] == "delete") {
                        removeTaxi($_GET['id']);
                        header('location: test.php?page=taxi&choix=view');
                    }
                }
            }
            // Autres pages (Chauffeur, Panne, Versement, Attribution)
            // ...
        }
    }
?>
