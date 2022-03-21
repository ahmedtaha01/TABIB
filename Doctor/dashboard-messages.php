<?php
session_start();
require_once "../queryHandlerclass/query.php";

if (!isset($_SESSION['DOCTOR_ID'])){
    header("location:../login/index.php");
    exit();
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
    <header class="background-white box-shadow fixed-top z-index-99">
        <nav class="container-fluid header-in">
            <div class="row">
                <div class="col-xl-2 col-lg-2">
                    <a id="logo" href="index.html" class="d-inline-block margin-tb-15px"><img src="../assets/img/logo-1.png" alt=""></a>
                    <a class="mobile-toggle padding-13px background-main-color" href="#"><i class="fas fa-bars"></i></a>
                </div>
                
                <div class="col-xl-4 d-none d-xl-block">
                    <hr class="margin-bottom-0px d-block d-sm-none">
                    <?php
                    $doctid = $_SESSION['DOCTOR_ID'];
                    $sql_statement = queryHandler::getData("doctors","img_path","id='$doctid'");
                    $img_path = $sql_statement->fetch(PDO::FETCH_ASSOC);
                    $img = $img_path['img_path'];
                    ?>
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
                        <span class="nav-link-text">My patients</span>
                    </a>
                </li>

               
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
                    <a class="nav-link active" href="dashboard-messages.php">
                        <i class="fa fa-fw fa-star"></i>
                        <span class="nav-link-text">Messages</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <span class="nav-title-text">User Area</span>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Profile">
                    <a class="nav-link" href="dashboard-my-profile.php">
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
                            <li><a href="dashboard-home.php">Home </a></li>
                            <li><a href="dashboard-home.php">Dashboard </a></li>
                            <li class="active">Messages</li>
                        </ol>
                        <h1 class="font-weight-300">Messages</h1>
                    </div>
                </div>
                <!-- // Page Title -->
                <div class="margin-tb-45px">




                    <?php
                    $DOCTOR_ID = $_SESSION['DOCTOR_ID'];
                    $query  ="SELECT  messages.id,patients.username ,messages._datetime, patients.first_name , patients.last_name , messages.patient_message FROM patients INNER JOIN messages ON messages.patient_id = patients.id where doctor_id =$DOCTOR_ID";
                    $sql_statement = $GLOBALS['connection']->prepare($query);
                    $done = $sql_statement->execute();
                    if ($done){
                    $result = $sql_statement->fetchall(PDO::FETCH_ASSOC);
                    foreach ($result as $index){
                    ?>
                    <div class="background-white thum-hover box-shadow hvr-float full-width margin-bottom-45px">
                        <div class="float-lg-left margin-right-30px sm-mr-0px text-center sm-mt-35px">
                            <img style="margin: 50px 0 50px 20px; " src="http://placehold.it/60x60" class="float-left margin-right-20px border-radius-60 margin-bottom-20px" alt="">
                        </div>
                        <div class="padding-lr-25px padding-tb-45px">
                            <h2>
                                <a href="#" class="d-inline-block text-dark text-capitalize text-medium margin-tb-15px"><?=$index['username']?></a>
                                <a href="deleteMessage.php?messageid=<?=$index['id']?>" class="d-inline-block margin-lr-10px text-grey-2 text-up-small"><i class="far fa-window-close"></i> Delete</a>
                                <p href="#" class="d-inline-block margin-lr-10px text-grey-2 text-up-small"><?=" ".$index['_datetime']?></p>
                            </h2>
                            <p><?=$index['patient_message']?></p>
                            <a href="replyMessage.php?messageid=<?=$index['id']?>" class="d-inline-block margin-lr-10px text-grey-2 text-up-small"><i class="far fa-file-alt"></i> Reply</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                        <?php
                    }
                    }
                    else{?>
                        <div class="background-white thum-hover box-shadow hvr-float full-width margin-bottom-45px">
                            <p class="text-grey-2" style="color: dodgerblue ;margin: 10px 10px 10px 489px;font-size: 22px; ">No Data To Show</p></div>
                    <?php } ?>













                    <!-- pagination -->
                <ul class="pagination pagination-md">
                    <li class="page-item disabled"><a class="page-link rounded-0" href="#" tabindex="-1">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link rounded-0" href="#">Next</a></li>
                </ul>
                <!-- //pagination -->

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
