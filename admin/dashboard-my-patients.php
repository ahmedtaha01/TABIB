<?php
session_start();
require_once '../queryHandlerclass/query.php';
if(isset($_SESSION['ADMIN_NAME'])){
   $admin_name = $_SESSION['ADMIN_NAME'];
}
else if(isset($_GET['id'])){
    $admin_boolean = queryHandler::getData('admins','*',"id = {$_GET['id']}");
    $data_of_admin = $admin_boolean->fetch(PDO::FETCH_ASSOC);
    $_SESSION['ADMIN_NAME'] = $data_of_admin['username'];
    $admin_name = $_SESSION['ADMIN_NAME'];
}else {
    header('location:admin-choosing.php');
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
                        <a href="dashboard-my-profile.php" class="margin-top-15px d-inline-block text-grey-3 margin-right-15px"><img src="" class="height-30px border-radius-30" width="30px" alt="">  <?= $admin_name ?></a>
                    </div>
                    <div class="nav-item float-left">
                        <a href="admin-logout.php" class="nav-link margin-top-10px" data-toggle="modal" data-target="#exampleModal">
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
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Doctors">
                    <a class="nav-link" href="dashboard-my-doctors.php">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">My Doctors</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My patients">
                    <a class="nav-link active" href="dashboard-my-patients.php">
                        <i class="fa fa-fw fa-heart"></i>
                        <span class="nav-link-text">My Patients</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
                    <a class="nav-link" href="dashboard-bookings.php">
                        <i class="far fa-fw fa-bookmark"></i>
                        <span class="nav-link-text">Bookings</span>
                    </a>    
                </li>
                
               
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
                    <a class="nav-link" href="dashboard-reviews.php">
                        <i class="fa fa-fw fa-star"></i>
                        <span class="nav-link-text">Reviews</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add doctor">
                    <a class="nav-link" href="dashboard-add-doctor.php">
                        <i class="fa fa-fw fa-plus-circle"></i>
                        <span class="nav-link-text">Add Doctor</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Admin">
                    <a class="nav-link " href="dashboard-add-admin.php">
                        <i class="fa fa-fw fa-plus-circle"></i>
                        <span class="nav-link-text">Add Admin</span>
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
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="sign Out">
                    <a class="nav-link" href="admin-logout.php" data-toggle="modal" data-target="#exampleModal">
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
                            <li class="active">My Patients</li>
                        </ol>
                        <h1 class="font-weight-300">My Patients</h1>
                    </div>
                </div>
                <!-- // Page Title -->
                <div class="margin-tb-45px full-width">
                <?php
                   
                   require_once 'admin-pagination-f-patients.php';  //exist in patient folder
                  
                   $patients_boolean = queryHandler::getData('patients','*',"1 ORDER BY id LIMIT $offset,$limit");
                   if($patients_boolean){
                       $data_for_patients = $patients_boolean->fetchALL(PDO::FETCH_ASSOC);
                       if(!empty($data_for_patients)){
                           foreach($data_for_patients as $one_row){ ?>
                               <div class="background-white thum-hover box-shadow hvr-float full-width margin-bottom-45px" style="width: 600px;">
                                   <div class="float-lg-left margin-right-30px sm-mr-0px text-center sm-mt-35px">
                                       <img src="../<?php
                                                                        if($one_row['img_path'] == ''){
                                                                            echo "profile.png";
                                                                        } else {
                                                                            echo "patientPhotos/{$one_row['img_path']}";
                                                                        }
                                                        ?>" style="border-radius:5px; width: 250px; height:270px">
                                   </div>
                                   <div class="padding-lr-25px padding-tb-45px" >
                                       <h2>
                                           <h2 class="d-inline-block text-dark text-capitalize text-medium margin-tb-15px" style="margin: 1px;"><?="Name : ".$one_row['username']?></h2><br>
                                           <span class="text-grey-2"><i class="far fa-map"></i> <?="Password : ". $one_row['password'] ?> </span><br>
                                       </h2>
                                       <span class="text-grey-2"><i class="far fa-map"></i> <?= "Age : ". $one_row['age'] ?> </span><br>
                                       <span class="text-grey-2"><i class="far fa-map"></i> <?="Address : " . $one_row['address']?></span><br>
                                       <span class="text-grey-2"><i class="far fa-map"></i> <?= "Phone : ". $one_row['phone'] ?> </span><br>
                                       <span class="text-grey-2"><i class="far fa-map"></i> <?= "Email : ". $one_row['email'] ?> </span><br>
                                       <span class="text-grey-2"><i class="far fa-map"></i> <?= "First Name : ". $one_row['first_name'] ?> </span><br>
                                       <span class="text-grey-2"><i class="far fa-map"></i> <?= "Last Name : ". $one_row['last_name'] ?> </span><br>
                                       <span class="text-grey-2"><i class="far fa-map"></i> <?= "Date Of Birth : ". $one_row['dob'] ?> </span><br>
                                       <span class="text-grey-2"><i class="far fa-map"></i> <?= "Gender : ". $one_row['gender'] ?> </span><br>
                                       <a href="admin-delete-patient.php?id=<?=$one_row['id'] ?>" class="d-inline-block margin-lr-30px text-grey-2 text-up-small" style="margin-left: 400px;margin-top: 10px"><i class="far fa-window-close"></i> Delete</a>
                                    </div>
                                   
                                   <div class="clearfix"></div>
                               </div>
                           <?php }
                       } else { ?>
                               <div class="background-white thum-hover box-shadow hvr-float full-width margin-bottom-45px" style="width: 600px;">
                                   <div class="padding-lr-25px padding-tb-45px" >
                                       <h2 class="font-weight-300" style="margin-left: 60px;color:dodgerblue">No Patients To Show</h2>   
                                   </div>
                               </div>
                      <?php
                       }
                   }
                   ?> 

                   <!-- // clinic -->
                   <!-- pagination -->
                   <?php
                       if(!empty($data_for_patients)){ ?>
                           <ul class="pagination pagination-md ">
                               <li class="page-item "><a class="page-link rounded-0" href="dashboard-my-patients.php?state=previous">Previous</a></li>
                               <?php 
                                   for($i = 1; $i <= $number_of_pages;$i++){ ?>
                                       <li class="page-item"><a class="page-link" href="dashboard-my-patients.php?num=<?= $i ?>"><?= $i ?></a></li>    
                               <?php } ?>
                               <li class="page-item"><a class="page-link rounded-0" href="dashboard-my-patients.php?state=next">Next</a></li>
                           </ul>
                      <?php }
                   ?>

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
                        <a class="btn btn-primary" href="admin-logout.php">Logout</a>
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
