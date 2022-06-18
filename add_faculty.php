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
        <title>Add Faculty | Phasor Academy - Responsive Bootstrap 5 Admin Dashboard</title>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Faculty</a></li>
                                            <li class="breadcrumb-item active">Add Faculty</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Faculty</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <form action="insert_faculty.php" method="POST">
                                                    <input type="hidden" name="c_doc_data" id="c_doc_data">
                                                    <input type="hidden" name="c_doc_name" id="c_doc_name">
                                                    <div class="mb-3">
                                                        <label for="faculty_name" class="form-label">Faculty Name</label>
                                                        <input type="text" id="faculty_name" name="faculty_name" class="form-control" placeholder="Enter project name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="faculty_desc" class="form-label">Faculty Description</label>
                                                        <textarea class="form-control" id="faculty_desc" name="faculty_desc" rows="5" placeholder="Enter some brief about project.."></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="faculty_cat" class="form-label">Faculty Subject</label>
                                                        <input type="text" id="faculty_cat" name="faculty_cat" class="form-control" placeholder="Enter project name">
                                                    </div>

                                                    <!-- <div class="mb-3">
                                                        <label for="course_cat" class="form-label">Category</label>
                                                        
                                                        <select class="form-control select2" data-toggle="select2" id="course_cat" name="course_cat">
                                                            <option>Select Category</option>
                                                            <option value="Engineering">Engineering</option>
                                                            <option value="Medical">Medical</option>
                                                        </select>
                                                    </div> -->

                                                    <div class="mb-0 d-none">
                                                        <button type="submit" class="btn btn-primary" id="add_course" name="add_course">Add Faculty</button>
                                                    </div>
                                                    <div class="mb-0">
                                                        <button type="button" class="btn btn-primary" id="submit_course" name="submit_course">Add Faculty</button>
                                                    </div>
                                                </form>
                                            </div> <!-- end col-->

                                            <div class="col-xl-6">
                                                <div class="mb-3 mt-3 mt-xl-0">
                                                    <label for="course_photo" class="mb-0">Faculty Profile</label>
                                                    <!-- <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p> -->

                                                    <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                                        <div class="fallback">
                                                            <input name="file" type="file" id="course_photo">
                                                        </div>

                                                        <div class="dz-message needsclick">
                                                            <i class="h3 text-muted dripicons-cloud-upload"></i>
                                                            <h4>Drop files here or click to upload.</h4>
                                                        </div>
                                                    </form>

                                                    <!-- Preview -->
                                                    <div class="dropzone-previews mt-3" id="file-previews"></div>

                                                    <!-- file preview template -->
                                                    <div class="d-none" id="uploadPreviewTemplate">
                                                        <div class="card mt-1 mb-0 shadow-none border">
                                                            <div class="p-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto">
                                                                        <img data-dz-thumbnail="" src="#" class="avatar-sm rounded bg-light" alt="">
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name=""></a>
                                                                        <p class="mb-0" data-dz-size=""></p>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <!-- Button -->
                                                                        <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove="">
                                                                            <i class="dripicons-cross"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end file preview template -->
                                                </div>
                                            </div> <!-- end col-->

                                        </div>
                                        <!-- end row -->

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

        <script>
            $("#submit_course").click(function() {
                if($('#file-previews .avatar-sm').length > 0) {
                    var img = $('#file-previews .avatar-sm').attr('src');
                    var img_name = $('#file-previews .text-muted').html().trim();
                    $("#c_doc_data").val(img);
                    $("#c_doc_name").val(img_name);
                    $("#add_course").click();
                }  else {
                    alert("Please upload an image.");
                }
            });
            
        </script>
    </body>
</html>