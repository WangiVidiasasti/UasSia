<?php
session_start();

// Check jika pengguna sudah login, redirect ke dashboard jika sudah login
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit;
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Konfigurasi koneksi ke database
    $host = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "uas_sia";

    // Buat koneksi ke database
    $conn = mysqli_connect($host, $db_username, $db_password, $database);

    // Memeriksa koneksi
    if (!$conn) {
        die("Koneksi Gagal : " . mysqli_connect_error());
    }

    // Query untuk memeriksa data pengguna
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Memeriksa hasil query
    if (mysqli_num_rows($result) == 1) {
        // Jika data pengguna ditemukan, set session dan redirect ke dashboard
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        // Jika data pengguna tidak ditemukan, tampilkan pesan error
        $error = "Username atau Password salah.";
    }

    // Tutup koneksi ke database
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Login | Sistem Informasi Desa Kucur</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="../assets/images/icon.png" />

  <!-- preloader css -->
  <link rel="stylesheet" href="../assets/css/preloader.min.css" type="text/css" />

  <!-- Bootstrap Css -->
  <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

  <!-- Icons Css -->
  <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

  <!-- CSS Custom by SI UMC -->
  <link rel="stylesheet" href="../assets/css/customcss.css" type="text/css">

  <!-- Boostrap new -->
  <link rel="stylesheet" href="../assets/css/newstyle.css" />
</head>

<body>
  <!-- <body data-layout="horizontal"> -->
  <div class="auth-page">
    <div class="container-fluid p-0">
      <div class="row g-0">
        <div class="col-xxl-3 col-lg-4 col-md-5">
          <div class="auth-full-page-content d-flex p-sm-5 p-4">
            <div class="w-100">
              <div class="d-flex flex-column h-100">
                <div class="mb-4 mb-md-5 text-center">
                  <a href="login.php" class="d-block auth-logo">
                    <img src="../assets/images/icon.png" alt="" height="28" />
                    <span class="logo-txt">Sistem Informasi Desa Kucur</span>
                  </a>
                </div>
                <div class="auth-content my-auto">
                  <div class="text-center">
                    <h5 class="mb-0">Selamat datang di Sistem Informasi Desa Kucur!</h5>
                  </div>
                  <form class="mt-4 pt-2" method="POST">
                    <?php
                    if (isset($_SESSION['register'])) {
                      echo "<div class='alert alert-success' id='tes'>" . $_SESSION['register'] . "</div>";
                      unset($_SESSION['register']);
                    }
                    if (isset($_SESSION['error'])) {
                      echo "<div class='alert alert-danger' id='gagal_login'>" . $_SESSION['error'] . "</div>";
                      unset($_SESSION['error']);
                    }

                    ?>

                    <div class="mb-3">
                      <label class="form-label">Username</label>
                      <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" required />
                    </div>
                    <div class="mb-3">
                      <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                          <label class="form-label">Password</label>
                        </div>
                        <div class="flex-shrink-0">
                          <div class="">
                            <a href="auth-recoverpw.html" class="text-muted">Lupa password?</a>
                          </div>
                        </div>
                      </div>

                      <div class="input-group auth-pass-inputgroup">
                        <input name="password" type="password" class="form-control" placeholder="Masukkan password" aria-label="Password" aria-describedby="password-addon" required />
                        <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon">
                          <i class="mdi mdi-eye-outline"></i>
                        </button>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col">
                        <div class="form-check">
                          <input class="form-check-input" name="remember" type="checkbox" id="remember-check" />
                          <label class="form-check-label" for="remember-check">
                            Remember me
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <button class="btn btn-primary w-100 waves-effect waves-light" name="login" type="submit" ;>
                        Log In
                      </button>
                    </div>
                  </form>

                  <div class="mt-5 text-center">
                    <p class="text-muted mb-0">
                      Belum punya akun?
                      <a href="register.php" class="text-primary fw-semibold">
                        Daftar sekarang
                      </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end auth full page content -->
        </div>
        <!-- end col -->
        <div class="col-xxl-9 col-lg-8 col-md-7">
          <div class="auth-bg pt-md-5 p-4 d-flex">
            <div class="bg-overlay bg-primary"></div>
            <ul class="bg-bubbles">
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>
            <!-- end bubble effect -->
            <div class="row justify-content-center align-items-center">
              <div class="col-xl-7">
                <div class="p-0 p-sm-4 px-xl-0">
                  <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                    <!-- end carouselIndicators -->
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="testi-contain text-white">
                          <i class="bx bxs-quote-alt-left text-success display-6"></i>
                          <h4 class="mt-4 fw-medium lh-base text-white">
                            SELAMAT DATANG DI WEBSITE RESMI SISTEM INFORMASI
                            DESA KUCUR
                          </h4>
                        </div>
                      </div>
                    </div>
                    <!-- end carousel-inner -->
                  </div>
                  <!-- end review carousel -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container fluid -->
  </div>

  <!-- JAVASCRIPT -->
  <script src="../assets/libs/jquery/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/metismenu/metisMenu.min.js"></script>
  <script src="../assets/libs/simplebar/simplebar.min.js"></script>
  <script src="../assets/libs/node-waves/waves.min.js"></script>
  <script src="../assets/libs/feather-icons/feather.min.js"></script>
  <!-- pace js -->
  <script src="../assets/libs/pace-js/pace.min.js"></script>
  <!-- password addon init -->
  <script src="../assets/js/pages/pass-addon.init.js"></script>

  <!-- Gagal login -->
  <?php
  ?>
</body>

</html>