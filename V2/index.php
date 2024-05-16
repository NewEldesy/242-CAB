<?php
    session_start();
    include_once('model.php');

    if (!isset($_SESSION['UserID'])) {
        if (isset($_POST) && !empty($_POST)) {
            try {
                $user = tryLogin($_POST);
                if (!empty($user)) {
                    $_SESSION["UserID"] = $user['UserID'];
                    $_SESSION["Email"] = $user['Email'];
                    $_SESSION["Nom"] = $user['Nom'];
                    $_SESSION["Prenom"] = $user['Prenom'];
                    redirectToDashboard();
                } else {
                    echo 'Identifiants invalides.';
                }
            } catch (PDOException $e) {
                handleDatabaseError($e->getMessage());
            }
        } else {
            include_once('app/signin.php');
        }
    } else {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
                case 'dashboard':
                    // ... (fonctionnalités du tableau de bord)
                    $nTaxis = CompteTaxis();
                    $nChauffeurs = CompteChauffeurs();
                    $nPannes = ComptePannes();
                    $nVersements = CompteVersements();

                    $lastV = getLastVersements();
                    $lastP = getLastPannes();

                    include_once('app/dashboard.php');
                    break;

                case 'logout':
                    session_destroy();
                    header('location: index.php');
                    break;

                case 'taxi':
                    // ... (gestion des taxis)
                    if(isset($_GET['action'])) {
                        $action = $_GET['action'];
                        
                        // Validez et filtrez le paramètre action pour éviter des problèmes de sécurité
                        validationAction();
                    
                        // Gestion de l'ajout de taxi
                        if($action == "add") {
                            if(isset($_POST) && !empty($_POST)) {
                                addTaxi($_POST);
                                header('location:index.php?page=taxi&action=view');
                            }
                            else {
                                include_once('app/taxi_add.php');
                            }
                        }
                        // Gestion de la mise à jour de taxi
                        elseif($action == "update") {
                            if(isset($_POST) && !empty($_POST) && isset($_GET['id'])) {
                                updateTaxi($_POST);
                                header('location:index.php?page=taxi&action=view');
                            }
                            else {
                                if(isset($_GET['id'])) {
                                    $result = getTaxiById($_GET['id']);
                                    include('app/taxi_update.php');
                                } else {
                                    // Gérer l'absence de l'identifiant dans la requête
                                    echo "Identifiant d'utilisateur manquant.";
                                    exit;
                                }
                            }
                        }
                        // Gestion de la vue des taxis
                        elseif($action == "view") {
                            $results = getTaxi();
                            include_once('app/taxi_view.php');
                        }
                        // Gestion de la suppression de taxi
                        elseif($action == "delete") {
                            if(isset($_GET['id'])) {
                                removeTaxi($_GET['id']);
                                header('location: index.php?page=taxi&action=view');
                                exit;
                            } else {
                                // Gérer l'absence de l'identifiant dans la requête
                                echo "Identifiant d'utilisateur manquant.";
                                exit;
                            }
                        }
                    }
                    break;

                case 'chauffeur':
                    // ... (gestion des chauffeurs)
                    if(isset($_GET['action'])) {
                        $action = $_GET['action'];
                            
                        // Validez et filtrez le paramètre action pour éviter des problèmes de sécurité
                        validationAction();
                    
                        // Gestion de l'ajout de chauffeur
                        if($action == "add") {
                            if(isset($_POST) && !empty($_POST)) {
                                addChauffeur($_POST);
                                header('location:index.php?page=chauffeur&action=view');
                            }
                            else {
                                $taxis = getTaxi();
                                include_once('app/chauffeur_add.php');
                            }
                        }
                        // Gestion de la mise à jour de chauffeur
                        elseif($action == "update") {
                            if(isset($_POST) && !empty($_POST) && isset($_GET['id'])) {
                                updateChauffeur($_POST);
                                header('location:index.php?page=chauffeur&action=view');
                            }
                            else {
                                if(isset($_GET['id'])) {
                                    $result = getChauffeurById($_GET['id']);
                                    include('app/chauffeur_update.php');
                                } else {
                                    // Gérer l'absence de l'identifiant dans la requête
                                    echo "Identifiant d'utilisateur manquant.";
                                    exit;
                                }
                            }
                        }
                        // Gestion de la vue des chauffeurs
                        elseif($action == "view") {
                            $results = getChauffeur();
                            include_once('app/chauffeur_view.php');
                        }
                        // Gestion de la suppression de chauffeur
                        elseif($action == "delete") {
                            if(isset($_GET['id'])) {
                                removeChauffeur($_GET['id']);
                                header('location: index.php?page=chauffeur&action=view');
                                exit;
                            } else {
                                // Gérer l'absence de l'identifiant dans la requête
                                echo "Identifiant d'utilisateur manquant.";
                                exit;
                            }
                        }
                    }
                    break;

                case 'panne':
                    // ... (gestion des pannes)
                    if(isset($_GET['action'])) {
                        $action = $_GET['action'];
                            
                        // Validez et filtrez le paramètre action pour éviter des problèmes de sécurité
                        validationAction();
                    
                        // Gestion de l'ajout de panne
                        if($action == "add") {
                            if(isset($_POST) && !empty($_POST)) {
                                addPanne($_POST);
                                header('location:index.php?page=panne&action=view');
                            }
                            else {
                                $taxis = getTaxi();
                                include_once('app/panne_add.php');
                            }
                        }
                        // Gestion de la mise à jour de panne
                        elseif($action == "update") {
                            if(isset($_POST) && !empty($_POST) && isset($_GET['id'])) {
                                updatePanne($_POST);
                                header('location:index.php?page=panne&action=view');
                            }
                            else {
                                if(isset($_GET['id'])) {
                                    $result = getPanneById($_GET['id']);
                                    include('app/panne_update.php');
                                } else {
                                    // Gérer l'absence de l'identifiant dans la requête
                                    echo "Identifiant d'utilisateur manquant.";
                                    exit;
                                }
                            }
                        }
                        // Gestion de la vue des pannes
                        elseif($action == "view") {
                            $results = getPanne();
                            include_once('app/panne_view.php');
                        }
                        // Gestion de la suppression de panne
                        elseif($action == "delete") {
                            if(isset($_GET['id'])) {
                                removePanne($_GET['id']);
                                header('location: index.php?page=panne&action=view');
                                exit;
                            } else {
                                // Gérer l'absence de l'identifiant dans la requête
                                echo "Identifiant d'utilisateur manquant.";
                                exit;
                            }
                        }
                    }
                    break;

                case 'versement':
                    // ... (gestion des versements)
                    if(isset($_GET['action'])) {
                        $action = $_GET['action'];
                            
                        // Validez et filtrez le paramètre action pour éviter des problèmes de sécurité
                        validationAction();
                    
                        // Gestion de l'ajout de versement
                        if($action == "add") {
                            if(isset($_POST) && !empty($_POST)) {
                                addVersement($_POST);
                                header('location:index.php?page=versement&action=view');
                            }
                            else {
                                //Récupérer chauffeurs
                                $chauffeurs = getChauffeur();
                                //Récupérer taxis
                                $taxis =  getTaxi();
                                include_once('app/versement_add.php');
                            }
                        }
                        // Gestion de la mise à jour de versement
                        elseif($action == "update") {
                            if(isset($_POST) && !empty($_POST) && isset($_GET['id'])) {
                                //Update versement par id
                                updateVersement($_POST);
                                //Redirection
                                header('location:index.php?page=versement&action=view');
                            }
                            else {
                                //Vérification de l'existence de id
                                if(isset($_GET['id'])) {
                                    //Récupération chauffeur par id
                                    $chauffeurs = getChauffeur();
                                    //Récupération taxi par id
                                    $taxis =  getTaxi();
                                    //Récupération versement par id
                                    $result = getVersementById($_GET['id']);
                                    //ajout de la vue
                                    include('app/versement_update.php');
                                } else {
                                    // Gérer l'absence de l'identifiant dans la requête
                                    echo "Identifiant manquant.";
                                    exit;
                                }
                            }
                        }
                        // Gestion de la vue des versements
                        elseif($action == "view") {
                            //Récupération des versements par id
                            $results = getVersement();
                            //Redirection
                            include_once('app/versement_view.php');
                        }
                        // Gestion de la suppression de versement
                        elseif($action == "delete") {
                            if(isset($_GET['id'])) {
                                //Suppression versement par id
                                removeVersement($_GET['id']);
                                //Redirection
                                header('location: index.php?page=versement&action=view');
                                exit;
                            } else {
                                // Gérer l'absence de l'identifiant dans la requête
                                echo "Identifiant d'utilisateur manquant.";
                                exit;
                            }
                        }
                    }
                    break;

                case 'attribution':
                    // ... (gestion des attributions)
                    if(isset($_GET['action'])) {
                        //Initialisation de la variable action
                        $action = $_GET['action'];
                            
                        // Validez et filtrez le paramètre action pour éviter des problèmes de sécurité
                        validationAction();
                    
                        // Gestion de l'ajout d'attribution
                        if($action == "add") {
                            if(isset($_POST) && !empty($_POST)) {
                                //Ajout attribution
                                addAttribution($_POST);
                                //Redirection
                                header('location:index.php?page=attribution&action=view');
                            }
                            else {
                                $taxis = getTaxi();
                                $chauffeurs = getChauffeur();
                                include_once('app/attribution_add.php');
                            }
                        }
                        // Gestion de la mise à jour d'attribution
                        elseif($action == "update") {
                            if(isset($_POST) && !empty($_POST) && isset($_GET['id'])) {
                                //Update des attribution par id
                                updateAttribution($_POST);
                                //Redirection
                                header('location:index.php?page=attribution&action=view');
                            }
                            else {
                                if(isset($_GET['id'])) {
                                    //Récupération attribution par id
                                    $result = getAttributionById($_GET['id']);
                                    //Redirection
                                    include('app/attribution_update.php');
                                } else {
                                    // Gérer l'absence de l'identifiant dans la requête
                                    echo "Identifiant d'utilisateur manquant.";
                                    exit;
                                }
                            }
                        }
                        // Gestion de la vue des attributions
                        elseif($action == "view") {
                            //Récupération des attributions
                            $results = getAttribution();
                            //Redirection
                            include_once('app/attribution_view.php');
                        }
                        // Gestion de la suppression d'attribution
                        elseif($action == "delete") {
                            if(isset($_GET['id'])) {
                                //Suppression d'une attribution
                                removeAttribution($_GET['id']);
                                //Redirection
                                header('location: index.php?page=attribution&action=view');
                                exit;
                            } else {
                                // Gérer l'absence de l'identifiant dans la requête
                                echo "Identifiant d'utilisateur manquant.";
                                exit;
                            }
                        }
                    }
                    break;

                case 'user':
                    // ... (gestion des utilisateurs)
                    if(isset($_GET['action'])) {
                        //Initialisation de la variable action
                        $action = $_GET['action'];
                            
                        // Validez et filtrez le paramètre action pour éviter des problèmes de sécurité
                        validationAction();
                    
                        // Gestion de l'ajout d'utilisateur
                        if($action == "add") {
                            // Vérification si $_Post existe et s'il n'est pas vide
                            if(isset($_POST) && !empty($_POST)) {
                                //Ajout d'utilisateur
                                addUser($_POST);
                                //Rédirection
                                header('location:index.php?page=user&action=view');
                            }
                            else {
                                //Redirection
                                include_once('app/user_add.php');
                            }
                        }
                        // Gestion de la mise à jour d'utilisateur
                        elseif($action == "update") {
                            if(isset($_POST) && !empty($_POST) && isset($_GET['id'])) {
                                //Update de l'utilisateur par id
                                updateUser($_POST);
                                //Redirection 
                                header('location:index.php?page=user&action=view');
                            }
                            else {
                                if(isset($_GET['id'])) {
                                    //Récupération de l'utilisateur par id
                                    $result = getUserById($_GET['id']);
                                    //Redirection
                                    include('app/user_update.php');
                                } else {
                                    // Gérer l'absence de l'identifiant dans la requête
                                    echo "Identifiant d'utilisateur manquant.";
                                    exit;
                                }
                            }
                        }
                        // Gestion de la vue des utilisateurs
                        elseif($action == "view") {
                            //Récupération des utilisateurs
                            $results = getUser();
                            //Redirection
                            include_once('app/user_view.php');
                        }
                        // Gestion de la suppression d'utilisateur
                        elseif($action == "delete") {
                            if(isset($_GET['id'])) {
                                //Suppression de l'utilisateur par id
                                removeUser($_GET['id']);
                                //Redirection
                                header('location: index.php?page=user&action=view');
                            } else {
                                // Gérer l'absence de l'identifiant dans la requête
                                echo "Identifiant d'utilisateur manquant.";
                                exit;
                            }
                        }
                    }
                    break;

                default:
                    //Si la page n'existe pas il affiche 404 error
                    include_once('app/404.php');
                    break;
            }
        }
    }
?>