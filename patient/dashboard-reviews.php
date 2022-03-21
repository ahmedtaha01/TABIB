<?php
session_start();
require_once '../queryHandlerclass/query.php';

if(isset($_SESSION['PATIENT_ID'])){
    $patient_Id =  $_SESSION['PATIENT_ID'];
    $patient_Username = $_SESSION['PATIENT_USERNAME'];
    $patient_Password = $_SESSION['PATIENT_PASSWORD'];       //collect data
    $patient_Age = $_SESSION['PATIENT_AGE'];
    $patient_Phone = $_SESSION['PATIENT_PHONE'];
    $patient_Email = $_SESSION['PATIENT_EMAIL'];
    $patient_Gender = $_SESSION['PATIENT_GENDER'];   
    $patient_Country = $_SESSION['PATIENT_COUNTRY'];
    $patient_Dob = $_SESSION['PATIENT_DOB'];
    $patient_Address = $_SESSION['PATIENT_ADDRESS'];
    $patient_First_Name = $_SESSION['PATIENT_FIRST_NAME'];
    $patient_Last_Name = $_SESSION['PATIENT_LAST_NAME'];
    $patient_Image_Path = $_SESSION['IMG_PATH'];

} else {
    header('location:../login/index.php');
    exit;
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
                    <img class="d-inline-block margin-tb-15px" src="../assets/img/logo-1.png" alt="">
                </div>
                
                <div class="col-xl-4 d-none d-xl-block">
                    <hr class="margin-bottom-0px d-block d-sm-none">

                    <div class="nav-item dropdown float-left">
                        <a href="dashboard-my-profile.php" class="margin-top-15px d-inline-block text-grey-3 margin-right-15px"><img src="../<?php
                                                                        if($patient_Image_Path == ''){
                                                                            echo "profile.png";
                                                                        } else {
                                                                            echo "patientPhotos/$patient_Image_Path";
                                                                        }
                                                        ?>" class="height-30px border-radius-30" width="30px" alt=""> <?= $patient_Username ?></a>
                    </div>

                    <div class="nav-item float-left">
                        <a href="../logout/logout.php" class="nav-link margin-top-10px" data-toggle="modal" data-target="#exampleModal">
                            <div class="text-grey-3"><i class="fa fa-fw fa-sign-out-alt"></i>Logout</div>
                        </a>
                    </div>
                    <hr class="margin-bottom-0px d-block d-sm-none">
                    <a href="dashboard-appointment.php" class="btn btn-sm border-radius-30 margin-tb-15px text-white background-second-color  box-shadow float-right padding-lr-25px margin-left-30px"><i class="fas fa-plus-circle  margin-right-7px"></i>Add Appoint.</a>
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

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Doctors">
                    <a class="nav-link" href="dashboard-my-doctors.php">
                        <i class="fa fa-fw fa-heart"></i>
                        <span class="nav-link-text">Doctors</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
                    <a class="nav-link" href="dashboard-bookings.php">
                        <i class="far fa-fw fa-bookmark"></i>
                        <span class="nav-link-text">Bookings</span>
                    </a>     
                </li>
               
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
                    <a class="nav-link active" href="dashboard-reviews.php">
                        <i class="fa fa-fw fa-star"></i>
                        <span class="nav-link-text">Reviews</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Appointement">
                    <a class="nav-link " href="dashboard-appointment.php">
                        <i class="fa fa-fw fa-plus-circle"></i>
                        <span class="nav-link-text">Add appointment</span>
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
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
                    <a class="nav-link" href="dashboard-messages.php">
                        <i class="far fa-fw fa-bookmark"></i>
                        <span class="nav-link-text">Messages</span>
                    </a>    
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sign Out">
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
                            <li><a>Home</a></li>
                            <li><a href="dashboard-home.php">Dashboard</a></li>
                            <li class="active">Reviews</li>
                        </ol>
                        <h1 class="font-weight-300">Reviews</h1>
                    </div>
                </div>
                <!-- // Page Title -->
                <!-- i deleted row from div , real : <div class="row margin-tb-45px"> -->
                <div class=" margin-tb-45px">

                    <!-- Review item -->
                    <?php
                       require_once 'patient-pagination-f-reviews.php';
                       $reviews_boolean = queryHandler::getData('patients join testimonials on testimonials.patient_id = patients.id',
                       'testimonials.content,testimonials._datetime,testimonials.patient_id,testimonials.id ,patients.username,patients.img_path'
                       ,"1 LIMIT $offset,$limit");
                       if($reviews_boolean){
                        $data_for_reviews = $reviews_boolean->fetchALL(PDO::FETCH_ASSOC);
                        if(!empty($data_for_reviews)){
                            foreach($data_for_reviews as $one_row){ ?>
                                <div class="col-lg-6 margin-bottom-45px" >
                                    <div class="background-white thum-hover box-shadow hvr-float" style="width:400px;">
                                        <div class="padding-30px" >
                                            <img src="../<?php
                                                            if($one_row['img_path'] == ''){
                                                                echo "profile.png";
                                                            } else {
                                                                echo "patientPhotos/{$one_row['img_path']}";
                                                            }
                                                        ?>" class="float-left margin-right-20px border-radius-60 margin-bottom-20px" height="90px" width="70px">
                                            <div class="margin-left-85px">
                                                <a class="d-inline-block text-dark text-medium margin-right-20px"><?= $one_row['username'] ?> </a>
                                                <span class="text-extra-small">Date :  <a href="#" class="text-main-color"><?= $one_row['_datetime'] ?></a></span>
                                                <div class="rating">
                                                    <ul>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                        <li></li>
                                                    </ul>
                                                </div>
                                                <p class="margin-top-15px text-grey-2"> <?= $one_row['content'] ?> </p>
                                                <?php
                                                    if($one_row['username'] == $patient_Username){ ?>
                                                       <a href="patient-delete-review.php?id=<?=$one_row['id'] ?>" class="d-inline-block margin-lr-20px text-grey-2 text-up-small"><i class="far fa-window-close"></i> Delete</a>
                                                   <?php } 
                                                ?>
                                                

                                            </div>
                                        </div>
                                    </div>
                                </div>
                           <?php }
                        }
                       }
                    ?>
                    
                    <!-- pagination -->
                    <?php
                        if(!empty($data_for_reviews)){ ?>
                            <ul class="pagination pagination-md ">
                                <li class="page-item "><a class="page-link rounded-0" href="dashboard-reviews.php?state=previous">Previous</a></li>
                                <?php 
                                    for($i = 1; $i <= $number_of_pages;$i++){ ?>
                                        <li class="page-item"><a class="page-link" href="dashboard-reviews.php?num=<?= $i ?>"><?= $i ?></a></li>    
                                <?php } ?>
                                <li class="page-item"><a class="page-link rounded-0" href="dashboard-reviews.php?state=next">Next</a></li>
                            </ul>
                       <?php }
                    ?>
                
                <!-- //pagination -->
                </div>
              
            </div>
          
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <span>© 2018 tabib Health Directory | All Right Reserved <a class="text-grey-2 margin-left-15px" target="_blank">Powered by : Nile Theme</a></span>
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
