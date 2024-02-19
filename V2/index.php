<?php
session_start();
include_once('model.php');

function redirectToDashboard() {
    // Fonction pour rediriger vers le tableau de bord
    header('location: index.php?page=dashboard');
    exit;
}

function handleDatabaseError($errorMessage) {
    // Fonction pour gérer les erreurs de base de données
    echo "Erreur de base de données : " . $errorMessage;
    exit;
}

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
                    if (!in_array($action, ['add', 'update', 'view', 'delete'])) {
                        header('location:index.php?page=dashord');
                        exit;
                    }
                
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
                    if (!in_array($action, ['add', 'update', 'view', 'delete'])) {
                        header('location:index.php?page=dashord');
                        exit;
                    }
                
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
                    if (!in_array($action, ['add', 'update', 'view', 'delete'])) {
                        header('location:index.php?page=dashord');
                        exit;
                    }
                
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
                    if (!in_array($action, ['add', 'update', 'view', 'delete'])) {
                        header('location:index.php?page=dashord');
                        exit;
                    }
                
                    // Gestion de l'ajout de versement
                    if($action == "add") {
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
                    // Gestion de la mise à jour de versement
                    elseif($action == "update") {
                        if(isset($_POST) && !empty($_POST) && isset($_GET['id'])) {
                            updateVersement($_POST);
                            header('location:index.php?page=versement&action=view');
                        }
                        else {
                            if(isset($_GET['id'])) {
                                $chauffeurs = getChauffeur();
                                $taxis =  getTaxi();
                                $result = getVersementById($_GET['id']);
                                include('app/versement_update.php');
                            } else {
                                // Gérer l'absence de l'identifiant dans la requête
                                echo "Identifiant d'utilisateur manquant.";
                                exit;
                            }
                        }
                    }
                    // Gestion de la vue des versements
                    elseif($action == "view") {
                        $results = getVersement();
                        include_once('app/versement_view.php');
                    }
                    // Gestion de la suppression de versement
                    elseif($action == "delete") {
                        if(isset($_GET['id'])) {
                            removeVersement($_GET['id']);
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
                    $action = $_GET['action'];
                        
                    // Validez et filtrez le paramètre action pour éviter des problèmes de sécurité
                    if (!in_array($action, ['add', 'update', 'view', 'delete'])) {
                        header('location:index.php?page=dashord');
                        exit;
                    }
                
                    // Gestion de l'ajout d'attribution
                    if($action == "add") {
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
                    // Gestion de la mise à jour d'attribution
                    elseif($action == "update") {
                        if(isset($_POST) && !empty($_POST) && isset($_GET['id'])) {
                            updateAttribution($_POST);
                            header('location:index.php?page=attribution&action=view');
                        }
                        else {
                            if(isset($_GET['id'])) {
                                $result = getAttributionById($_GET['id']);
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
                        $results = getAttribution();
                        include_once('app/attribution_view.php');
                    }
                    // Gestion de la suppression d'attribution
                    elseif($action == "delete") {
                        if(isset($_GET['id'])) {
                            removeAttribution($_GET['id']);
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
                    $action = $_GET['action'];
                        
                    // Validez et filtrez le paramètre action pour éviter des problèmes de sécurité
                    if (!in_array($action, ['add', 'update', 'view', 'delete'])) {
                        header('location:index.php?page=dashord');
                        exit;
                    }
                
                    // Gestion de l'ajout d'utilisateur
                    if($action == "add") {
                        if(isset($_POST) && !empty($_POST)) {
                            addUser($_POST);
                            header('location:index.php?page=user&action=view');
                        }
                        else {
                            include_once('app/user_add.php');
                        }
                    }
                    // Gestion de la mise à jour d'utilisateur
                    elseif($action == "update") {
                        if(isset($_POST) && !empty($_POST) && isset($_GET['id'])) {
                            updateUser($_POST);
                            header('location:index.php?page=user&action=view');
                        }
                        else {
                            if(isset($_GET['id'])) {
                                $result = getUserById($_GET['id']);
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
                        $results = getUser();
                        include_once('app/user_view.php');
                    }
                    // Gestion de la suppression d'utilisateur
                    elseif($action == "delete") {
                        if(isset($_GET['id'])) {
                            removeUser($_GET['id']);
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
                include_once('app/404.php');
                break;
        }
    }
}
?>