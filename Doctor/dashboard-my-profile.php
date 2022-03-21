<?php
session_start();
require_once "../queryHandlerclass/query.php";

if (!isset($_SESSION['DOCTOR_ID'])){
    header("location:../login/index.php");
    exit();
}

if (isset($_SESSION['alert'])){
    ?>
    <script>
        window.onload = function () {
            window.alert("<?=$_SESSION['alert']?>");
            //dom not only ready, but everything is loaded
        }
    </script>
    <?php
    unset($_SESSION['alert']);
}

if (isset($_SESSION['updatedone'])){
    ?>
    <script>
        window.onload = function () {
            window.alert("Your profile has been updated successfully");
            //dom not only ready, but everything is loaded
        }
    </script>
    <?php
    unset($_SESSION['updatedone']);
}
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Tabib HTML5 Health Directory Template</title>
    <meta name="author" content="Nile-Theme">
    <meta name="robots" content="index follow">
    <meta name="googlebot" content="index follow">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="directory, doctor, doctor directory, Health directory, listing, map, medical, medical directory, professional directory, reservation, reviews">
    <meta name="description" content="Health Care & Medical Services Directory">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CPoppins:300i,300,400,700,400i,500%7CDancing+Script:700%7CDancing+Script:700" rel="stylesheet">
    <!-- animate -->
    <link rel="stylesheet" href="../assets/css/animate.css" />
    <!-- owl Carousel assets -->
    <link href="../assets/css/owl.carousel.css" rel="stylesheet">
    <link href="../assets/css/owl.theme.css" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- hover anmation -->
    <link rel="stylesheet" href="../assets/css/hover-min.css">
    <!-- flag icon -->
    <link rel="stylesheet" href="../assets/css/flag-icon.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- colors -->
    <link rel="stylesheet" href="../assets/css/colors/main.css">
    <!-- elegant icon -->
    <link rel="stylesheet" href="../assets/css/elegant_icon.css">
    <!-- admin style -->
    <link rel="stylesheet" href="../assets/css/sb-admin.css">
    <!-- jquery library  -->
    <script  src="../assets/js/jquery-3.2.1.min.js"></script>
    <!-- fontawesome  -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>


</head>

<body>
<?php
$doctid = $_SESSION['DOCTOR_ID'];
$sql_statement = queryHandler::getData("doctors","img_path","id='$doctid'");
$img_path = $sql_statement->fetch(PDO::FETCH_ASSOC);
$img = $img_path['img_path'];
?>


    <header class="background-white box-shadow fixed-top z-index-99">
        <nav class="container-fluid header-in">
            <div class="row">
                <div class="col-xl-2 col-lg-2">
                    <a id="logo" href="index.html" class="d-inline-block margin-tb-15px"><img src="../assets/img/logo-1.png" alt=""></a>
                    <a class="mobile-toggle padding-13px background-main-color" href="#"><i class="fas fa-bars"></i></a>
                </div>
                
                <div class="col-xl-4 d-none d-xl-block">
                    <hr class="margin-bottom-0px d-block d-sm-none">

                    <div class="nav-item dropdown float-left">
                        <a href="dashboard-my-profile.php" class="margin-top-15px d-inline-block text-grey-3 margin-right-15px"><img src="imgs/<?=isset($img_path)? $img:""?>" class="height-30px border-radius-30" alt=""><?="   ".$_SESSION['DOCTOR_FIRSTNAME']."  ".$_SESSION['DOCTOR_LASTNAME']?></a>
                    </div>

                    <div class="nav-item float-left">
                        <a href="../logout/logout.php" class="nav-link margin-top-10px" data-toggle="modal" data-target="#exampleModal">
                            <div class="text-grey-3"><i class="fa fa-fw fa-sign-out-alt"></i>Logout</div>
                        </a>
                    </div>

                </div>
            </div>
        </nav>
    </header>
    <!-- // Header  -->

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark z-index-9  fixed-top" id="mainNav">

        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav navbar-sidenav background-main-color admin-nav" id="admin-nav">
                <li class="nav-item">
                    <span class="nav-title-text">Main</span>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="dashboard-home.php">
                        <i class="fas fa-fw fa-home"></i><span class="nav-link-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Favorites">
                    <a class="nav-link" href="dashboard-my-patients.php">
                        <i class="fa fa-fw fa-heart"></i>
                        <span class="nav-link-text">My Patients</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
                    <a class="nav-link" href="dashboard-messages.php">
                        <i class="fa fa-fw fa-star"></i>
                        <span class="nav-link-text">Messages</span>
                    </a>
                </li>

                <li class="nav-item">
                    <span class="nav-title-text">User Area</span>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Profile">
                    <a class="nav-link active" href="dashboard-my-profile.php">
                        <i class="fa fa-fw fa-user-circle"></i>
                        <span class="nav-link-text">My Profile</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sing Out">
                    <a class="nav-link" href="../logout/logout.php" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out-alt"></i>
                        <span class="nav-link-text">Sign Out</span>
                    </a>
                </li>
            </ul>

        </div>
    </nav>
    <div class="content-wrapper">
        <div class="container-fluid overflow-hidden">
            <div class="row margin-tb-90px margin-lr-10px sm-mrl-0px">
                <!-- Page Title -->
                <div id="page-title" class="padding-30px background-white full-width">
                    <div class="container">
                        <ol class="breadcrumb opacity-5">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">My Profile</li>
                        </ol>
                        <h1 class="font-weight-300">My Profile</h1>
                    </div>
                </div>
                <!-- // Page Title -->

                <div class="row margin-tb-45px full-width">
                    <div class="col-md-4">
                        <div class="padding-15px background-white">

                            <form action="imgProcess.php?docid=<?=$_SESSION['DOCTOR_ID']?>" method="post" enctype="multipart/form-data">
                                <a href="#" class="d-block margin-bottom-10px"><img src="imgs/<?=isset($img_path)? $img:""?>" alt=""></a>
                                <input type="file" name="img" class="d-block margin-bottom-10px">
                                <input style="cursor: pointer" type="submit" value="Upload Image" name="submit" class="btn btn-sm  text-white background-main-color btn-block">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form action="updateDoctorProfile.php?docid=<?=$_SESSION['DOCTOR_ID']?>" method="post">
                        <div class="row">
                          <div class="col-md-6 margin-bottom-20px">
                              <label><i class="far fa-user margin-right-10px"></i>Doc. UserName</label>
                              <input type="text" name="docUsername" value="<?=$_SESSION['DOCTOR_USERNAME']?>" class="form-control form-control-sm" placeholder="name" required>
                          </div>
                          <div class="col-md-6 margin-bottom-20px">
                              <label><i class="fas fa-lock margin-right-10px"></i> Password</label>
                              <input type="password" name="password" value="<?=$_SESSION['DOCTOR_PASSWORD']?>" class="form-control form-control-sm" placeholder="password" required>
                          </div>
                          <div class="col-md-6 margin-bottom-20px">
                              <label><i class="fas fa-lock margin-right-10px"></i>Confirm Password</label>
                              <input type="password"  name="confpassword" value="<?=$_SESSION['DOCTOR_PASSWORD']?>" class="form-control form-control-sm" placeholder="Confirm password" required>
                          </div>
                          <div class="col-md-6 margin-bottom-20px">
                              <label><i class="far fa-user margin-right-10px"></i>First Name</label>
                              <input type="text" name="firstname" value="<?=$_SESSION['DOCTOR_FIRSTNAME']?>" class="form-control form-control-sm" placeholder="first name" required>
                          </div>
                          <div class="col-md-6 margin-bottom-20px">
                              <label><i class="fas fa-user margin-right-10px"></i> Last Name</label>
                              <input type="text" name="lastname" value="<?=$_SESSION['DOCTOR_LASTNAME']?>" class="form-control form-control-sm" placeholder="last name" required>
                          </div>
                          <div class="col-md-6 margin-bottom-20px">
                              <label><i class="far fa-envelope-open margin-right-10px"></i> Specialization</label>
                              <input type="text" name="specialization" value="<?=$_SESSION['DOCTOR_SPECIALIZATION']?>" class="form-control form-control-sm" placeholder="any spec" required>
                          </div>
                          <div class="col-md-6 margin-bottom-20px">
                              <label><i class="fas fa-mobile-alt margin-right-10px"></i> Address</label>
                              <input type="text" name="address" value="<?=$_SESSION['DOCTOR_address']?>" class="form-control form-control-sm" placeholder="any address" required>
                          </div>
                          <div class="col-md-6">
                              <label><i class="fas fa-link margin-right-10px"></i> Phone</label>
                              <input type="text" name="phone" value="<?=$_SESSION['DOCTOR_PHONE']?>" class="form-control form-control-sm" placeholder="0123456789" required>
                          </div>
                          <div class="col-md-6">
                              <label><i class="fas fa-info margin-right-10px"></i> Email</label>
                              <input type="text" name="email" value="<?=$_SESSION['DOCTOR_EMAIL']?>" class="form-control form-control-sm" placeholder="any@hotmail.com" required>
                          </div>
                          <div class="col-md-6">
                            <label><i class="fas fa-info margin-right-10px"></i> Time Of Presence</label>
                            <input type="time"  name="timepres" value="<?=$_SESSION['DOCTOR_TIME_OF_PRESENSE']?>" class="form-control form-control-sm" placeholder="H:M:S" required>
                        </div>
                        <div class="col-md-6">
                            <label><i class="fas fa-info margin-right-10px"></i> stay time</label>
                            <input type="number" name="staytime" value="<?=$_SESSION['DOCTOR_STAY_TIME']?>" class="form-control form-control-sm" placeholder="number of hours" required>
                        </div>
                        </div>
                            <hr class="margin-tb-40px">
                            <input style="cursor: pointer" type="submit" name="submit" value="Update Profile" class="btn btn-md padding-lr-25px  text-white background-main-color btn-inline-block">
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <span>© 2018 tabib Health Directory | All Right Reserved <a class="text-grey-2 margin-left-15px" href="https://themeforest.net/user/nile-theme/portfolio" target="_blank">Powered by : Nile Theme</a></span>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="../logout/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script  src="../assets/js/sticky-sidebar.js"></script>
    <script  src="../assets/js/YouTubePopUp.jquery.js"></script>
    <script  src="../assets/js/owl.carousel.min.js"></script>
    <script  src="../assets/js/imagesloaded.min.js"></script>
    <script  src="../assets/js/wow.min.js"></script>
    <script  src="../assets/js/custom.js"></script>
    <script  src="../assets/js/popper.min.js"></script>
    <script  src="../assets/js/bootstrap.min.js"></script>


</body>

</html>
