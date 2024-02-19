<?php session_start(); ?>
<?php include_once('model.php'); ?>
<?php
    $_SESSION['username'] = "Fortune";
?>
<?php
    if(empty($_SESSION)) {  header('location: index.php');}
    else {
        if(isset($_GET['page'])) {
            // Page Taxi
            if($_GET['page'] == "taxi") {
                if(isset($_GET['choix'])) {
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
                            $result = getTaxiById($_GET['id']);
                            include('app/taxi_update.php');
                        }
                    }
                    elseif($_GET['choix'] == "view") {
                        $results = getTaxi();
                        include_once('app/taxi_view.php');
                    }
                    elseif($_GET['choix'] == "delete") {
                        removeTaxi($_GET['id']);
                        header('location: test.php?page=taxi&choix=view');
                    }
                }
            }
            // Chauffeur
            elseif($_GET['page'] == "chauffeur") {
                if(isset($_GET['choix'])) {
                    if($_GET['choix'] == "add") {
                        if(isset($_POST) && !empty($_POST)) {
                            addChauffeur($_POST);
                            header('location:test.php?page=chauffeur&choix=view');
                        }
                        else {
                            include_once('app/chauffeur_add.php');
                        }
                    }
                    elseif($_GET['choix'] == "update") {
                        if(isset($_POST) && !empty($_POST)) {
                            updateChauffeur($_POST);
                            header('location:test.php?page=chauffeur&choix=view');
                        }
                        else {
                            $result = getChauffeurById($_GET['id']);
                            include('app/chauffeur_update.php');
                        }
                    }
                    elseif($_GET['choix'] == "view") {
                        $results = getChauffeur();
                        include_once('app/chauffeur_view.php');
                    }
                    elseif($_GET['choix'] == "delete") {
                        removeChauffeur($_GET['id']);
                        header('location: test.php?page=chauffeur&choix=view');
                    }
                }
            }
            // Panne
            elseif($_GET['page'] == "panne") {
                if(isset($_GET['choix'])) {
                    if($_GET['choix'] == "add") {
                        if(isset($_POST) && !empty($_POST)) {
                            addPanne($_POST);
                            header('location:test.php?page=panne&choix=view');
                        }
                        else {
                            include_once('app/panne_add.php');
                        }
                    }
                    elseif($_GET['choix'] == "update") {
                        if(isset($_POST) && !empty($_POST)) {
                            updatePanne($_POST);
                            header('location:test.php?page=panne&choix=view');
                        }
                        else {
                            $result = getPanneById($_GET['id']);
                            include('app/panne_update.php');
                        }
                    }
                    elseif($_GET['choix'] == "view") {
                        $results = getPanne();
                        include_once('app/panne_view.php');
                    }
                    elseif($_GET['choix'] == "delete") {
                        removePanne($_GET['id']);
                        header('location: test.php?page=panne&choix=view');
                    }
                }
            }
            // Versement
            elseif($_GET['page'] == "versement") {
                if(isset($_GET['choix'])) {
                    if($_GET['choix'] == "add") {
                        if(isset($_POST) && !empty($_POST)) {
                            // var_dump($_POST); die();
                            addVersement($_POST);
                            header('location:test.php?page=versement&choix=view');
                        }
                        else {
                            $chauffeurs = getChauffeur();
                            $taxis =  getTaxi();
                            include_once('app/versement_add.php');
                        }
                    }
                    elseif($_GET['choix'] == "update") {
                        if(isset($_POST) && !empty($_POST)) {
                            updateVersement($_POST);
                            header('location:test.php?page=versement&choix=view');
                        }
                        else {
                            $chauffeurs = getChauffeur();
                            $taxis =  getTaxi();
                            $result = getVersementById($_GET['id']);
                            include('app/versement_update.php');
                        }
                    }
                    elseif($_GET['choix'] == "view") {
                        $results = getVersement();
                        include_once('app/versement_view.php');
                    }
                    elseif($_GET['choix'] == "delete") {
                        removeVersement($_GET['id']);
                        header('location: test.php?page=versement&choix=view');
                    }
                }
            }
            // Attribution
            elseif($_GET['page'] == "attribution") {
                if(isset($_GET['choix'])) {
                    if($_GET['choix'] == "add") {
                        if(isset($_POST) && !empty($_POST)) {
                            addAttribution($_POST);
                            header('location:test.php?page=attribution&choix=view');
                        }
                        else {
                            include_once('app/attribution_add.php');
                        }
                    }
                    elseif($_GET['choix'] == "update") {
                        if(isset($_POST) && !empty($_POST)) {
                            updateAttribution($_POST);
                            header('location:test.php?page=attribution&choix=view');
                        }
                        else {
                            $result = getAttributionById($_GET['id']);
                            include('app/attribution_update.php');
                        }
                    }
                    elseif($_GET['choix'] == "view") {
                        $results = getAttribution();
                        include_once('app/attribution_view.php');
                    }
                    elseif($_GET['choix'] == "delete") {
                        removeAttribution($_GET['id']);
                        header('location: test.php?page=attribution&choix=view');
                    }
                }
            }
            else{
                include_once('app/404.php');
            }
        }
    }
?>
