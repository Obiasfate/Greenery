<?php

include 'includes/dbh.inc.php';
require_once 'functions.php';

if (!isset($_SESSION['admin_username'])) {
    header("Location:admin_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin-Dashboard</title>

    <!-- Favicons -->
    <link href="assets/img/greenery_logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Additional Design for Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script>
        $(document).ready(function() {
            $('#datatablesSimple').DataTable();
        });
    </script>
</head>

<body>
    <header class="d-flex flex-wrap justify-content-center py-4 mb-4 border-bottom">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="admin-dashboard.php"><img src="assets/img/greenery_logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">Greenery</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="admin-dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product-dashboard.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="contact-dashboard.php">Contact</a>
                        </li>
                    </ul>
                    <li class="nav-item d-flex pe-3">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </div>
            </div>
        </nav>
    </header>
    <main>

        <div class="container-fluid px-4 py-2">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Contact</li>
                <li class="breadcrumb-item active">Update Contacts</li>
            </ol>
            <h1 class="mt-4 py-3">Update Contacts</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Contact Database
                </div>

                <div class="card-body">
                    <form method="post">
                        <div class="card card-body">
                            <div class="row py-3">
                                <input type="hidden" name=contact_id value="<?php echo $id ?>">
                                <div class="input-group col">
                                    <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="Name" value="<?php echo $nameTemp ?>" name="name" required>
                                </div>
                                <div class="input-group col">
                                    <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="Email" value="<?php echo $emailTemp ?>" name="email" required>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="input-group col">
                                    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11" class="form-control" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="Phone Number" value="<?php echo $phoneNumberTemp ?>" name="phone" required>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="input-group col">
                                    <input type="text" class="form-control" placeholder="Company Name" aria-label="Company Name" aria-describedby="Company Name" value="<?php echo $companyNameTemp ?>" name="company">
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="input-group col">
                                    <input type="text" class="form-control" placeholder="Project" aria-label="Project" aria-describedby="Project" value="<?php echo $projectTemp ?>" name="project" required>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col">
                                    <textarea class="form-control" placeholder="Message" name="message" required><?php echo $messageTemp ?></textarea>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-auto me-auto"></div>
                                <div class="col-auto">
                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    <a href="contact-dashboard.php">
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </main>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>