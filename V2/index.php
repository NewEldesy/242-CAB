<?php session_start(); ?>
<?php include_once('model.php'); ?>
<?php
    $_SESSION['username'] = "Fortune";
?>
<?php
    if(empty($_SESSION)) {  header('location: app/signin.php');}
    else {
        if(isset($_GET['page'])) {
            // Page Dashboard
            if($_GET['page'] == "dashboard") {
                $nTaxis = CompteTaxis();
                $nChauffeurs = CompteChauffeurs();
                $nPannes = ComptePannes();
                $nVersements = CompteVersements();

                include_once('app/dashboard.php');
            }
            // Page Taxi
            elseif($_GET['page'] == "taxi") {
                if(isset($_GET['action'])) {
                    if($_GET['action'] == "add") {
                        if(isset($_POST) && !empty($_POST)) {
                            addTaxi($_POST);
                            header('location:index.php?page=taxi&action=view');
                        }
                        else {
                            include_once('app/taxi_add.php');
                        }
                    }
                    elseif($_GET['action'] == "update") {
                        if(isset($_POST) && !empty($_POST)) {
                            updateTaxi($_POST);
                            header('location:index.php?page=taxi&action=view');
                        }
                        else {
                            $result = getTaxiById($_GET['id']);
                            include('app/taxi_update.php');
                        }
                    }
                    elseif($_GET['action'] == "view") {
                        $results = getTaxi();
                        include_once('app/taxi_view.php');
                    }
                    elseif($_GET['action'] == "delete") {
                        removeTaxi($_GET['id']);
                        header('location: index.php?page=taxi&action=view');
                    }
                }
            }
            // Chauffeur
            elseif($_GET['page'] == "chauffeur") {
                if(isset($_GET['action'])) {
                    if($_GET['action'] == "add") {
                        if(isset($_POST) && !empty($_POST)) {
                            addChauffeur($_POST);
                            header('location:index.php?page=chauffeur&action=view');
                        }
                        else {
                            include_once('app/chauffeur_add.php');
                        }
                    }
                    elseif($_GET['action'] == "update") {
                        if(isset($_POST) && !empty($_POST)) {
                            updateChauffeur($_POST);
                            header('location:index.php?page=chauffeur&action=view');
                        }
                        else {
                            $result = getChauffeurById($_GET['id']);
                            include('app/chauffeur_update.php');
                        }
                    }
                    elseif($_GET['action'] == "view") {
                        $results = getChauffeur();
                        include_once('app/chauffeur_view.php');
                    }
                    elseif($_GET['action'] == "delete") {
                        removeChauffeur($_GET['id']);
                        header('location: index.php?page=chauffeur&action=view');
                    }
                }
            }
            // Panne
            elseif($_GET['page'] == "panne") {
                if(isset($_GET['action'])) {
                    if($_GET['action'] == "add") {
                        if(isset($_POST) && !empty($_POST)) {
                            addPanne($_POST);
                            header('location:index.php?page=panne&action=view');
                        }
                        else {
                            $taxis = getTaxi();
                            include_once('app/panne_add.php');
                        }
                    }
                    elseif($_GET['action'] == "update") {
                        if(isset($_POST) && !empty($_POST)) {
                            updatePanne($_POST);
                            header('location:index.php?page=panne&action=view');
                        }
                        else {
                            $result = getPanneById($_GET['id']);
                            include('app/panne_update.php');
                        }
                    }
                    elseif($_GET['action'] == "view") {
                        $results = getPanne();
                        include_once('app/panne_view.php');
                    }
                    elseif($_GET['action'] == "delete") {
                        removePanne($_GET['id']);
                        header('location: index.php?page=panne&action=view');
                    }
                }
            }
            // Versement
            elseif($_GET['page'] == "versement") {
                if(isset($_GET['action'])) {
                    if($_GET['action'] == "add") {
                        if(isset($_POST) && !empty($_POST)) {
                            addVersement($_POST);
                            header('location:index.php?page=versement&action=view');
                        }
                        else {
                            $chauffeurs = getChauffeur();
                            $taxis =  getTaxi();
                            include_once('app/versement_add.php');
                        }
                    }
                    elseif($_GET['action'] == "update") {
                        if(isset($_POST) && !empty($_POST)) {
                            updateVersement($_POST);
                            header('location:index.php?page=versement&action=view');
                        }
                        else {
                            $chauffeurs = getChauffeur();
                            $taxis =  getTaxi();
                            $result = getVersementById($_GET['id']);
                            include('app/versement_update.php');
                        }
                    }
                    elseif($_GET['action'] == "view") {
                        $results = getVersement();
                        include_once('app/versement_view.php');
                    }
                    elseif($_GET['action'] == "delete") {
                        removeVersement($_GET['id']);
                        header('location: index.php?page=versement&action=view');
                    }
                }
            }
            // Attribution
            elseif($_GET['page'] == "attribution") {
                if(isset($_GET['action'])) {
                    if($_GET['action'] == "add") {
                        if(isset($_POST) && !empty($_POST)) {
                            addAttribution($_POST);
                            header('location:index.php?page=attribution&action=view');
                        }
                        else {
                            $taxis = getTaxi();
                            $chauffeurs = getChauffeur();
                            include_once('app/attribution_add.php');
                        }
                    }
                    elseif($_GET['action'] == "update") {
                        if(isset($_POST) && !empty($_POST)) {
                            updateAttribution($_POST);
                            header('location:index.php?page=attribution&action=view');
                        }
                        else {
                            $result = getAttributionById($_GET['id']);
                            include('app/attribution_update.php');
                        }
                    }
                    elseif($_GET['action'] == "view") {
                        $results = getAttribution();
                        include_once('app/attribution_view.php');
                    }
                    elseif($_GET['action'] == "delete") {
                        removeAttribution($_GET['id']);
                        header('location: index.php?page=attribution&action=view');
                    }
                }
            }
            else{
                include_once('app/404.php');
            }
        }
    }
?>
