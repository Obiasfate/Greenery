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
                            <a class="nav-link" href="product-dashboard.php">Products</a>
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
                <li class="breadcrumb-item active">Contacts</li>
            </ol>
            <h1 class="mt-4 py-3">Contacts</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Contact Database
                </div>
                <div class="card-body">
                    <?php
                    include_once 'includes/dbh.inc.php';
                    $sql = "SELECT * FROM `contact_info`";
                    $result = $conn->query($sql);
                    ?>
                    <table class="table" id="datatablesSimple">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Project</th>
                                <th scope="col">Message</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $row['contact_date']; ?></td>
                                    <td><?php echo $row['contact_name']; ?></td>
                                    <td><?php echo $row['contact_email']; ?></td>
                                    <td><?php echo $row['contact_num']; ?></td>
                                    <td><?php echo $row['contact_company']; ?></td>
                                    <td><?php echo $row['contact_project']; ?></td>
                                    <td><?php echo $row['Message']; ?></td>
                                    <td class="d-flex flex-row">
                                        <a href="updatecontact.php?edit=<?php echo $row['contact_id']; ?>">
                                            <button type="button" class="btn btn-primary ms-3 me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <span class="material-icons" aria-hidden="true">
                                                    edit
                                                </span>
                                            </button>
                                        </a>
                                        <a href="functions.php?delete=<?php echo $row['contact_id']; ?>">
                                            <button type="button" class="btn btn-danger me-3 ms-2" data-toggle=" tooltip" data-placement="top" title="Delete">
                                                <span class="material-icons" aria-hidden="true">
                                                    delete
                                                </span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

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