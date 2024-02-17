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
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">242 CAB</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-taxi me-2"></i>Taxi</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="taxi_view.php" class="dropdown-item">View</a>
                            <a href="taxi_add.php" class="dropdown-item">Add</a>
                            <a href="taxi_update.php" class="dropdown-item">Update</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user-slash me-2"></i>Chauffeur</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="chauffeur_view.php" class="dropdown-item">View</a>
                            <a href="chauffeur_add.php" class="dropdown-item">Add</a>
                            <a href="chauffeur_update.php" class="dropdown-item">Update</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-users-cog me-2"></i>Attribution</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="attribution_view.php" class="dropdown-item">View</a>
                            <a href="attribution_add.php" class="dropdown-item">Add</a>
                            <a href="attribution_update.php" class="dropdown-item">Update</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-receipt me-2"></i>Versement</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="versement_view.php" class="dropdown-item">View</a>
                            <a href="versement_add.php" class="dropdown-item">Add</a>
                            <a href="versement_update.php" class="dropdown-item">Update</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-wrench me-2"></i>Panne</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="panne_view.php" class="dropdown-item">View</a>
                            <a href="panne_add.php" class="dropdown-item">Add</a>
                            <a href="panne_update.php" class="dropdown-item">Update</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>User</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="user_view.php" class="dropdown-item">View</a>
                            <a href="user_add.php" class="dropdown-item">Add</a>
                            <a href="user_update.php" class="dropdown-item">Update</a>
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
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->