<?php

?>

<?php
if (isset($_GET['link'])) {
    if (($_GET['link']) == 'dashboard') {
        $title = "Dashboard | ";
    } elseif (($_GET['link']) == 'login') {
        $title = "Form Login | ";
    } elseif (($_GET['link']) == 'karyawan') {
        $title = "Master Karyawan | ";   
    } elseif (($_GET['link']) == 'data_jabatan') {
        $title = "Master Jabatan | ";
    } elseif (($_GET['link']) == 'data_barang') {
        $title = "Master Barang | ";
    } elseif (($_GET['link']) == 'data_katalog') {
        $title = "Master Katalog | ";
    } elseif (($_GET['link']) == 'data_pengiriman') {
        $title = "Master Pengiriman | ";
    } elseif (($_GET['link']) == 'data_status') {
        $title = "Master Status | ";
    } elseif (($_GET['link']) == 'data_supplier') {
        $title = "Master Supplier | ";
    }
    
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        <?= $title; ?>Sistem Informasi Desa Kucur
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- app favicon -->
    <link rel="icon" href="assets/images/icon.png">

    <!-- plugin css -->
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
        type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Dropzone css -->
    <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <!-- CSS Sweet alert -->
    <link href="assets/css/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <!-- app Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- choices css -->
    <link href="assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />

    <!-- color picker css -->
    <link rel="stylesheet" href="assets/libs/@simonwep/pickr/themes/classic.min.css" /> <!-- 'classic' theme -->
    <link rel="stylesheet" href="assets/libs/@simonwep/pickr/themes/monolith.min.css" /> <!-- 'monolith' theme -->
    <link rel="stylesheet" href="assets/libs/@simonwep/pickr/themes/nano.min.css" /> <!-- 'nano' theme -->

    <!-- datepicker css -->
    <link rel="stylesheet" href="assets/libs/flatpickr/flatpickr.min.css">

    <!-- CSS Custom by SI UMC -->
    <link rel="stylesheet" href="assets/css/customcss.css" type="text/css">
    <link rel="stylesheet" href="assets/css/iconstyle.css" type="text/css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css" type="text/css">

    <!-- JQUERY -->
    <script src="assets/libs/jquery/jquery.min.js"></script>

    <!-- Jquery Customm by SI UMC -->
    <script src="lib/jsFunction.js"></script>



</head>

<body>
    <?php
    // $link=($_GET['link'])
    
    if (isset($_GET['link'])) {
        include 'menu/sidebar.php';
        include 'menu/header.php';
        // menampilkan page dashboard
        if (($_GET['link']) == 'dashboard') {
            include "dashboard.php";
            header("Location: " . $baseURL . "/index.php?link=dashboard");
            // menampilkan page data penambahan penduduk
        } 
        elseif (($_GET['link']) == 'karyawan') {
            include "pages/add/master/karyawan.php";
            header("Location: " . $baseURL . "/index.php?link=karyawan");
        } elseif (($_GET['link']) == 'laporan') {
            include "laporan.php";
            header("Location: " . $baseURL . "/index.php?link=laporan");
        } elseif (($_GET['link']) == 'data_karyawan') {
            include "datakaryawan.php";
            header("Location: " . $baseURL . "/index.php?link=data_karyawan");
        }elseif (($_GET['link']) == 'data_jabatan') {
            include "pages/add/master/jabatan.php";
            header("Location: " . $baseURL . "/index.php?link=data_jabatan");
        }elseif (($_GET['link']) == 'data_barang') {
            include "pages/add/master/barang.php";
            header("Location: " . $baseURL . "/index.php?link=data_barang");
        }elseif (($_GET['link']) == 'data_katalog') {
            include "pages/add/master/katalog.php";
            header("Location: " . $baseURL . "/index.php?link=data_katalog");
        }elseif (($_GET['link']) == 'data_pengiriman') {
            include "pages/add/master/pengiriman.php";
            header("Location: " . $baseURL . "/index.php?link=data_pengiriman");
        }elseif (($_GET['link']) == 'data_status') {
            include "pages/add/master/status.php";
            header("Location: " . $baseURL . "/index.php?link=data_status");
        }elseif (($_GET['link']) == 'data_supplier') {
            include "pages/add/master/supplier.php";
            header("Location: " . $baseURL . "/index.php?link=data_supplier");
        }
    } else {
        include 'login.php';
        header("Location: " . $baseURL . "/index.php?link=login");
    }

    // include 'menu/footer.php';
    ?>
</body>

</html>

<!-- JaVASCRIPT -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script>
    feather.replace()
</script>

<!-- choices js -->
<script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

<!-- init js -->
<script src="assets/js/pages/form-advanced.init.js"></script>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- apexcharts init -->
<script src="assets/js/pages/apexcharts.init.js"></script>

<!-- Calendar init -->
<script src="assets/js/pages/calendar.init.js"></script>

<!-- Plugins js-->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- dashboard init -->
<script src="assets/js/pages/dashboard.init.js"></script>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/js/pages/sweetalert.init.js"></script>


<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<!-- pace js -->
<script src="assets/libs/pace-js/pace.min.js"></script>

<script src="assets/libs/@fullcalendar/core/main.min.js"></script>
<script src="assets/libs/@fullcalendar/bootstrap/main.min.js"></script>
<script src="assets/libs/@fullcalendar/daygrid/main.min.js"></script>
<script src="assets/libs/@fullcalendar/timegrid/main.min.js"></script>
<script src="assets/libs/@fullcalendar/interaction/main.min.js"></script>

<!-- Sweet alert 2 -->
<script src="assets/js/pages/sweetalert2.all.min.js"></script>

<!-- Chart JS -->
<script src="assets/libs/chart.js/Chart.bundle.min.js"></script>
<!-- chartjs init -->
<script src="assets/js/pages/chartjs.init.js"></script>

<!-- ehartjs init -->
<script src="assets/js/pages/echarts.min.js"></script>
<script src="assets/js/pages/echarts.init.js"></script>

<!-- dropzone js -->
<script src="assets/libs/dropzone/min/dropzone.min.js"></script>

<!-- twitter-bootstrap-wizard js -->
<script src="assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/libs/twitter-bootstrap-wizard/prettify.js"></script>

<!-- form wizard init -->
<script src="assets/js/pages/form-wizard.init.js"></script>

<script src="assets/js/app.js"></script>
<script>
    $('#tablecustom').DataTable({
        dom: 'Bfrtip',
        "scrollX": true,
    });
</script>