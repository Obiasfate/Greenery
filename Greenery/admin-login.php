<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin-Login</title>

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


</head>
<body>
    <main id="main">
    <section id="admin-login" class="admin-login">        
        <div class="admin-login-container">

            <div class="container">

                <div class="row">
                    <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 25rem;">
                        <div class="card-body">
                        <h5 class="card-img-top pb-3" >Admin Login</h5>
                        <form  method="post" role="form">
                           
                                <div class="col-lg-10 form-group">
                                <input type="text" name="adminuser" class="form-control" id="adminuser" placeholder="Username" required>
                                </div>
                                
                                <div class="col-lg-10 pt-3 form-group">
                                <input type="password" name="adminpass" class="form-control"  id="adminpass" placeholder="Password" required>
                                </div>
                                <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                                <input type="submit" name="login" class="btn btn-primary" data-bs-target="#loginModal" data-bs-toggle="modal" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

<?php
    include_once 'includes/dbh.inc.php';
    session_start();
    if(isset($_POST['login']))
    {
        $username = $_POST['adminuser'];
        $password = $_POST['adminpass'];

        $sql= " SELECT * FROM admin_info WHERE admin_username = '$username' AND admin_password = '$password' ";
        $result = mysqli_query($conn, $sql);

        if($result->num_rows > 0)
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: admin-dashboard.php");
        }
        else
        {
            echo
            '
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Error</h5>
                        </div>
                        <div class="modal-body">
                            <p>Username or Password is Wrong. Please try again!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
    }
?>