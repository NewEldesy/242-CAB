<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Base Url -->
    <base href="http://localhost/242-CAB/V2/">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php?page=dashboard" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">242 CAB</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="index.php?page=dashboard" class="nav-item nav-link <?php if($_GET['page'] == "dashboard"){echo 'active';}?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if($_GET['page'] == "taxi"){echo 'active';}?>" data-bs-toggle="dropdown"><i class="fas fa-taxi me-2"></i>Taxi</a>
                        <div class="dropdown-menu bg-transparent border-0  <?php if($_GET['page'] == "taxi"){echo 'show';}?>">
                            <a href="index.php?page=taxi&action=view" class="dropdown-item <?php if($_GET['page'] == "taxi" && $_GET['action'] == "view"){echo 'active';}?>">View</a>
                            <a href="index.php?page=taxi&action=add" class="dropdown-item <?php if($_GET['page'] == "taxi" && $_GET['action'] == "add"){echo 'active';}?>">Add</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if($_GET['page'] == "chauffeur"){echo 'active';}?>" data-bs-toggle="dropdown"><i class="fas fa-user-slash me-2"></i>Chauffeur</a>
                        <div class="dropdown-menu bg-transparent border-0  <?php if($_GET['page'] == "chauffeur"){echo 'show';}?>">
                            <a href="index.php?page=chauffeur&action=view" class="dropdown-item <?php if($_GET['page'] == "chauffeur" && $_GET['action'] == "view"){echo 'active';}?>">View</a>
                            <a href="index.php?page=chauffeur&action=add" class="dropdown-item <?php if($_GET['page'] == "chauffeur" && $_GET['action'] == "add"){echo 'active';}?>">Add</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if($_GET['page'] == "attribution"){echo 'active';}?>" data-bs-toggle="dropdown"><i class="fas fa-users-cog me-2"></i>Attribution</a>
                        <div class="dropdown-menu bg-transparent border-0  <?php if($_GET['page'] == "attribution"){echo 'show';}?>">
                            <a href="index.php?page=attribution&action=view" class="dropdown-item <?php if($_GET['page'] == "attribution" && $_GET['action'] == "view"){echo 'active';}?>">View</a>
                            <a href="index.php?page=attribution&action=add" class="dropdown-item <?php if($_GET['page'] == "attribution" && $_GET['action'] == "add"){echo 'active';}?>">Add</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if($_GET['page'] == "versement"){echo 'active';}?>" data-bs-toggle="dropdown"><i class="fas fa-receipt me-2"></i>Versement</a>
                        <div class="dropdown-menu bg-transparent border-0  <?php if($_GET['page'] == "versement"){echo 'show';}?>">
                            <a href="index.php?page=versement&action=view" class="dropdown-item <?php if($_GET['page'] == "versement" && $_GET['action'] == "view"){echo 'active';}?>">View</a>
                            <a href="index.php?page=versement&action=add" class="dropdown-item <?php if($_GET['page'] == "versement" && $_GET['action'] == "add"){echo 'active';}?>">Add</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if($_GET['page'] == "panne"){echo 'active';}?>" data-bs-toggle="dropdown"><i class="fas fa-wrench me-2"></i>Panne</a>
                        <div class="dropdown-menu bg-transparent border-0  <?php if($_GET['page'] == "panne"){echo 'show';}?>">
                            <a href="index.php?page=panne&action=view <?php if($_GET['page'] == "panne" && $_GET['action'] == "view"){echo 'active';}?>" class="dropdown-item">View</a>
                            <a href="index.php?page=panne&action=add <?php if($_GET['page'] == "panne" && $_GET['action'] == "add"){echo 'active';}?>" class="dropdown-item">Add</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if($_GET['page'] == "user"){echo 'active';}?>" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>User</a>
                        <div class="dropdown-menu bg-transparent border-0  <?php if($_GET['page'] == "user"){echo 'show';}?>">
                            <a href="index.php?page=user&action=view" class="dropdown-item <?php if($_GET['page'] == "user" && $_GET['action'] == "view"){echo 'active';}?>">View</a>
                            <a href="index.php?page=user&action=add" class="dropdown-item <?php if($_GET['page'] == "user" && $_GET['action'] == "add"){echo 'active';}?>">Add</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fas fa-car-alt"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?= $_SESSION["Nom"]." ".$_SESSION["Prenom"];?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="index.php?page=logout" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->