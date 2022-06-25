<?php

session_start();
if(isset($_SESSION['username']) && $_SESSION['username']!=''){
    include "config.php";
} else {
    header("Location: /dashboard-admin/login.php?msg=Session expired. Please login again !!!");
}

?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Add Branch | Phasor Academy - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="The Debug Arena" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"default","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            
            <?php require_once('sidebar.php'); ?>
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    
                    <?php require_once('topbar.php'); ?>
                    
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Phasor Academy</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Branches</a></li>
                                            <li class="breadcrumb-item active">Add Branch</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Branch</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="insert_branch.php" method="POST" enctype= "multipart/form-data">
                                            <div class="row">
                                                <div class="col-xl-6">    
                                                    <div class="mb-3">
                                                        <label for="branch_name" class="form-label">Branch Name</label>
                                                        <input type="text" id="branch_name" name="branch_name" class="form-control" placeholder="Enter course name">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="mb-3">
                                                        <label for="branch_mobile" class="form-label">Branch Contact</label>
                                                        <input type="number" name="branch_mobile" id="branch_mobile" class="form-control" required />
                                                    </div>
                                                </div> <!-- end col-->
                                                <div class="col-xl-6">
                                                    <div class="mb-3">
                                                        <label for="branch_address" class="form-label">Branch Address</label>
                                                        <textarea class="form-control" id="branch_address" name="branch_address" rows="5" placeholder="Enter some brief about course.."></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="mb-0">
                                                        <button type="submit" class="btn btn-primary" id="add_branch" name="add_branch">Add Branch</button>
                                                    </div>                                                    
                                                </div> <!-- end col-->
                                                
                                            </div>
                                            <!-- end row -->
                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

                <?php require_once('footer.php'); ?>

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <?php require_once('endbar.php'); ?>

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

        <!-- plugin js -->
        <script src="assets/js/vendor/dropzone.min.js"></script>
        <!-- init js -->
        <script src="assets/js/ui/component.fileupload.js"></script>
        <!-- end demo js-->

    </body>
</html>