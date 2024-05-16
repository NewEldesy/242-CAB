<?php
    session_start();
    include_once('model.php');

    if (!isset($_SESSION['UserID'])) {
        //Si $_Post existe et si il n'est pas vide
        if (isset($_POST) && !empty($_POST)) {
            try {
                //Fonction pour essayer de se connecter
                $user = tryLogin($_POST);
                //Si l'utilisateur existe
                if (!empty($user)) {
                    //Initialisation des session
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
            //Redirection
            include_once('app/signin.php');
        }
    } else {
        if (isset($_GET['page'])) {
            //Initialisation variable page
            $page = $_GET['page'];

            switch ($page) {
                case 'dashboard':
                    //Compte Taxis
                    $nTaxis = CompteTaxis();
                    //Compte chauffeurs
                    $nChauffeurs = CompteChauffeurs();
                    //Compte Pannes
                    $nPannes = ComptePannes();
                    //Compte Versements
                    $nVersements = CompteVersements();

                    $lastV = getLastVersements();
                    $lastP = getLastPannes();

                    include_once('app/dashboard.php');
                    break;

                case 'logout':
                    //Destruction session
                    session_destroy();
                    //redirection
                    header('location: index.php');
                    break;

                case 'taxi':
                    // ... (gestion des taxis)
                    if(isset($_GET['action'])) {
                        //Initialisation variable action
                        $action = $_GET['action'];
                        
                        // Validez et filtrez le paramètre action pour éviter des problèmes de sécurité
                        validationAction();
                    
                        // Gestion de l'ajout de taxi
                        if($action == "add") {
                            // Si $_Post existe et si $_Post n'est pas vide
                            if(isset($_POST) && !empty($_POST)) {
                                //Ajout taxi
                                addTaxi($_POST);
                                //Redirection
                                header('location:index.php?page=taxi&action=view');
                            }
                            else {
                                //Redirection
                                include_once('app/taxi_add.php');
                            }
                        }
                        // Gestion de la mise à jour de taxi
                        elseif($action == "update") {
                            // Si id, $_Post existent et si $_Post n'est pas vide
                            if(isset($_POST) && !empty($_POST) && isset($_GET['id'])) {
                                //Update Taxi by
                                updateTaxi($_POST);
                                //Redirection
                                header('location:index.php?page=taxi&action=view');
                            }
                            else {
                                //Si id existe
                                if(isset($_GET['id'])) {
                                    //Récupération taxi by id
                                    $result = getTaxiById($_GET['id']);
                                    //Redirection
                                    include('app/taxi_update.php');
                                } else {
                                    // Gérer l'absence de l'identifiant dans la requête
                                    echo "Identifiant manquant.";
                                    exit;
                                }
                            }
                        }
                        // Gestion de la vue des taxis
                        elseif($action == "view") {
                            //Récupération Taxi
                            $results = getTaxi();
                            //Redirection
                            include_once('app/taxi_view.php');
                        }
                        // Gestion de la suppression de taxi
                        elseif($action == "delete") {
                            //Si id existe
                            if(isset($_GET['id'])) {
                                //Suppression Taxi par id
                                removeTaxi($_GET['id']);
                                //Redirection
                                header('location: index.php?page=taxi&action=view');
                                exit;
                            } else {
                                // Gérer l'absence de l'identifiant dans la requête
                                echo "Identifiant manquant.";
                                exit;
                            }
                        }
                    }
                    break;

                case 'chauffeur':
                    // ... (gestion des chauffeurs)
                    if(isset($_GET['action'])) {
                        //Initialisation variable action
                        $action = $_GET['action'];
                            
                        // Validez et filtrez le paramètre action pour éviter des problèmes de sécurité
                        validationAction();
                    
                        // Gestion de l'ajout de chauffeur
                        if($action == "add") {
                            // Si $_Post existe et si $_Post n'est pas vide
                            if(isset($_POST) && !empty($_POST)) {
                                //Ajout Chauffeur
                                addChauffeur($_POST);
                                //Redirection
                                header('location:index.php?page=chauffeur&action=view');
                            }
                            else {
                                //Récupération Taxis
                                $taxis = getTaxi();
                                //Redirection
                                include_once('app/chauffeur_add.php');
                            }
                        }
                        // Gestion de la mise à jour de chauffeur
                        elseif($action == "update") {
                            // Si id, $_Post existent et si $_Post n'est pas vide
                            if(isset($_POST) && !empty($_POST) && isset($_GET['id'])) {
                                //Update chauffeur by id
                                updateChauffeur($_POST);
                                //Redirection
                                header('location:index.php?page=chauffeur&action=view');
                            }
                            else {
                                if(isset($_GET['id'])) {
                                    //Recupération chauffeur par id
                                    $result = getChauffeurById($_GET['id']);
                                    //Redirection
                                    include('app/chauffeur_update.php');
                                } else {
                                    // Gérer l'absence de l'identifiant dans la requête
                                    echo "Identifiant manquant.";
                                    exit;
                                }
                            }
                        }
                        // Gestion de la vue des chauffeurs
                        elseif($action == "view") {
                            //Récupération chauffeur
                            $results = getChauffeur();
                            //Redirection
                            include_once('app/chauffeur_view.php');
                        }
                        // Gestion de la suppression de chauffeur
                        elseif($action == "delete") {
                            if(isset($_GET['id'])) {
                                //Suppression Chauffeur by id
                                removeChauffeur($_GET['id']);
                                //Redirection
                                header('location: index.php?page=chauffeur&action=view');
                                exit;
                            } else {
                                // Gérer l'absence de l'identifiant dans la requête
                                echo "Identifiant manquant.";
                                exit;
                            }
                        }
                    }
                    break;

                case 'panne':
                    // ... (gestion des pannes)
                    if(isset($_GET['action'])) {
                        //Initialisation variable action
                        $action = $_GET['action'];
                            
                        // Validez et filtrez le paramètre action pour éviter des problèmes de sécurité
                        validationAction();
                    
                        // Gestion de l'ajout de panne
                        if($action == "add") {
                            // Si $_Post existe et si $_Post n'est pas vide
                            if(isset($_POST) && !empty($_POST)) {
                                //Ajout Panne
                                addPanne($_POST);
                                //Redirection
                                header('location:index.php?page=panne&action=view');
                            }
                            else {
                                //Récupération taxis
                                $taxis = getTaxi();
                                //Redirection
                                include_once('app/panne_add.php');
                            }
                        }
                        // Gestion de la mise à jour de panne
                        elseif($action == "update") {
                            // Si id, $_Post existent et si $_Post n'est pas vide
                            if(isset($_POST) && !empty($_POST) && isset($_GET['id'])) {
                                //Update panne par id
                                updatePanne($_POST);
                                //Redirection
                                header('location:index.php?page=panne&action=view');
                            }
                            else {
                                if(isset($_GET['id'])) {
                                    //Récupération panne par id
                                    $result = getPanneById($_GET['id']);
                                    //Redirection
                                    include('app/panne_update.php');
                                } else {
                                    // Gérer l'absence de l'identifiant dans la requête
                                    echo "Identifiant manquant.";
                                    exit;
                                }
                            }
                        }
                        // Gestion de la vue des pannes
                        elseif($action == "view") {
                            //Récupération des pannes
                            $results = getPanne();
                            //Redirection
                            include_once('app/panne_view.php');
                        }
                        // Gestion de la suppression de panne
                        elseif($action == "delete") {
                            //Si identifiant existe
                            if(isset($_GET['id'])) {
                                //Suppression panne par id
                                removePanne($_GET['id']);
                                //Redirection
                                header('location: index.php?page=panne&action=view');
                                exit;
                            } else {
                                // Gérer l'absence de l'identifiant dans la requête
                                echo "Identifiant manquant.";
                                exit;
                            }
                        }
                    }
                    break;

                case 'versement':
                    // ... (gestion des versements)
                    if(isset($_GET['action'])) {
                        //Initialisation de la variable action
                        $action = $_GET['action'];
                            
                        // Validez et filtrez le paramètre action pour éviter des problèmes de sécurité
                        validationAction();
                    
                        // Gestion de l'ajout de versement
                        if($action == "add") {
                            //Si $_Post existe et s'il est vide
                            if(isset($_POST) && !empty($_POST)) {
                                //Ajout versement
                                addVersement($_POST);
                                //Redirection après ajout
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