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
                    <a class="nav-link" href="dashboard-reviews.php">
                        <i class="fa fa-fw fa-star"></i>
                        <span class="nav-link-text">Reviews</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Appointement">
                    <a class="nav-link " href="dashboard-appointment.php">
                        <i class="fa fa-fw fa-plus-circle"></i>                        
                        <span class="nav-link-text">Add Appointment</span>
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
                            <li class="active">My Profile</li>
                        </ol>
                        <h1 class="font-weight-300">My Profile</h1>
                    </div>
                </div>
                <!-- // Page Title -->
                
                <form action="patient-update-profile.php" method="post" enctype="multipart/form-data">
                    <div class="row margin-tb-45px full-width">
                        <div class="col-md-4">
                            <div class="padding-15px background-white" >
                                <img class="d-block margin-bottom-10px" width="250" height="250" style="object-fit:cover;border-radius:50px;margin:auto;" src="../<?php
                                                                        if($_SESSION['IMG_PATH'] == ''){
                                                                            echo "profile.png";
                                                                        } else {
                                                                            echo "patientPhotos/{$_SESSION['IMG_PATH']}";
                                                                        }
                                                        ?>">
                         
                                <input type="file" id="upload-file" name ='File' class="btn btn-sm btn-primary text-white background-main-color btn-block" >
                            </div>
                        </div>
                        <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 margin-bottom-20px">
                                <label><i class="far fa-user margin-right-10px"></i>Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="name" name='username' value=<?=$patient_Username ?>>
                            </div>
                           
                            <div class="col-md-6 margin-bottom-20px">
                                <label><i class="fas fa-lock margin-right-10px"></i>Password</label>
                                <input type="text" class="form-control form-control-sm" name='password' value=<?=$patient_Password ?>>
                            </div>
                        
                            <div class="col-md-6 margin-bottom-20px">
                                <label><i class="fas fa-lock margin-right-10px"></i>Age</label>
                                <input type="text" class="form-control form-control-sm" placeholder="age" name = 'age' value=<?=$patient_Age ?>>
                            </div>

                            <div class="col-md-6 margin-bottom-20px">
                                <label><i class="fas fa-lock margin-right-10px"></i> Date Of Birth</label>
                                <input type="Date" class="form-control form-control-sm"  name ='dateOfBirth' value=<?=$patient_Dob ?>>
                            </div>

                            <div class="col-md-6 margin-bottom-20px">
                                <label><i class="fas fa-lock margin-right-10px"></i> Phone</label>
                                <input type="text" class="form-control form-control-sm" placeholder="0123456789" name='phone' value=<?=$patient_Phone ?>>
                            </div>

                            <div class="col-md-6 margin-bottom-20px">
                                <label><i class="fas fa-lock margin-right-10px"></i> E-mail</label>
                                <input type="text" class="form-control form-control-sm" placeholder="any@hotmail.com" name='e-mail' value=<?=$patient_Email ?>>
                            </div>

                            <div class="col-md-6 margin-bottom-20px">
                                <label><i class="fas fa-lock margin-right-10px"></i> First Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="first name" name='firstName' value=<?=$patient_First_Name?>>  
                            </div>

                            <div class="col-md-6 margin-bottom-20px">
                                <label><i class="far fa-envelope-open margin-right-10px"></i> Last Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Last Name" name='lastName' value=<?=$patient_Last_Name ?>>
                            </div>
                            
                            <div class="col-md-6">
                                <label><i class="fas fa-link margin-right-10px"></i> Country</label>
                                <input type="text" class="form-control form-control-sm" placeholder="country" name ='country' value=<?=$patient_Country ?>>
                            </div>

                            <div class="col-md-6">
                                <label><i class="fas fa-info margin-right-10px"></i> Address</label>
                                <input type="text" class="form-control form-control-sm" placeholder="address" name ='address' value=<?=$patient_Address ?>>
                            </div>

                            <div class="col-md-6">
                                <label><i class="fas fa-info margin-right-10px margin-top-25px"></i> Gender</label>
                                <select class="form-control form-control-sm" name ='gender'>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                            </div>                         
                            
                        </div>
                        <hr class="margin-tb-40px">
                        
                            <input type="submit" name="subit" value ="Update Profile" class="btn btn-md padding-lr-25px btn-primary text-white background-main-color btn-inline-block">

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
