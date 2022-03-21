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

// to get number of appointments

$dataForAppointement = queryHandler::getData('appointment',"COUNT(appointment_id) as num",'');
$number_of_appointement = $dataForAppointement->fetch(PDO::FETCH_ASSOC);


/////////////////////////////////////////

// to get number of doctors

$dataForDoctors = queryHandler::getData('doctors',"COUNT(id) as num",'');
$number_of_doctors = $dataForDoctors->fetch(PDO::FETCH_ASSOC);

//////////////////////////////////

// to get number of patients

$dataForPatients = queryHandler::getData('patients',"COUNT(id) as num",'');
$number_of_patients = $dataForPatients->fetch(PDO::FETCH_ASSOC);


///////////////////////////////////

$dataForReviews = queryHandler::getData('testimonials',"COUNT(id) as num",'');
$number_of_reviews = $dataForReviews->fetch(PDO::FETCH_ASSOC);

///////////////////////////////////


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
                    <a href="dashboard-appointment.php" class="btn btn-sm border-radius-30 margin-tb-15px text-white background-second-color  box-shadow float-right padding-lr-25px margin-left-30px"><i class="fas fa-plus-circle  margin-right-7px"></i>Add Appoint.</a>
                    <div class="nav-item dropdown float-left">
                        <a href="dashboard-my-profile.php" class="margin-top-15px d-inline-block text-grey-3 margin-right-15px"><img src="../<?php
                                                                        if($patient_Image_Path == ''){
                                                                            echo "profile.png";
                                                                        } else {
                                                                            echo "patientPhotos/$patient_Image_Path";
                                                                        }
                                                        ?>" class="height-30px border-radius-30" width="30px" alt="">  <?= $patient_Username ?></a>
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
                    <a class="nav-link active" href="dashboard-home.php">
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
                
                <div class="col-xl-3 col-md-6 margin-bottom-30px">
                    <a class="d-block padding-30px background-main-color box-shadow border-radius-10 hvr-float">
                        <h6 class="text-white margin-0px font-weight-400">
                            <i class="far fa-map text-icon-large margin-bottom-10px opacity-5 d-block"></i>
                            <span class="font-2 text-extra-large"><?= $number_of_appointement['num'] ?> </span>
                            <span class="margin-left-10px">Total Appointements</span>
                        </h6>
                    </a>
                </div>
                
                <div class="col-xl-3 col-md-6 margin-bottom-30px">
                    <a class="d-block padding-30px background-lime box-shadow border-radius-10 hvr-float">
                        <h6 class="text-white margin-0px font-weight-400">
                            <i class="far fa-user text-icon-large margin-bottom-10px opacity-5 d-block"></i>
                            <span class="font-2 text-extra-large"><?= $number_of_doctors['num'] ?></span> 
                            <span class="margin-left-10px">Total Doctors</span>
                        </h6>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 margin-bottom-30px">
                    <a class="d-block padding-30px background-amber box-shadow border-radius-10 hvr-float">
                        <h6 class="text-white margin-0px font-weight-400">
                            <i class="far fa-star text-icon-large margin-bottom-10px opacity-5 d-block"></i>
                            <span class="font-2 text-extra-large"><?= $number_of_patients['num'] ?></span> 
                            <span class="margin-left-10px">Total Patients</span>
                        </h6>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 margin-bottom-30px">
                    <a class="d-block padding-30px background-red box-shadow border-radius-10 hvr-float">
                        <h6 class="text-white margin-0px font-weight-400">
                            <i class="fas fa-chart-line text-icon-large margin-bottom-10px opacity-5 d-block"></i>
                            <span class="font-2 text-extra-large"><?= $number_of_reviews['num'] ?></span> 
                            <span class="margin-left-10px">Total reviews</span>
                        </h6>
                    </a>
                </div>

                <div class="col-12">
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="margin-bottom-30px">
                                <div class="padding-30px background-white border-radius-20 box-shadow">
                                    <h3><i class="far fa-envelope-open margin-right-10px text-main-color"></i>Feedback</h3>
                                    <hr>
                                    <form action="patient-process-feedback.php" method="post">
                                        <textarea name ="textareaContent" class="form-control" placeholder="Enter your Message" id="exampleTextarea" rows="3"></textarea>
                                        <input type="submit" value="send" name = "subit" class="btn btn-md border-0 border-radius-10 background-main-color padding-lr-20px text-white margin-tb-10px">
                                    </form>  
                                </div>    
                            </div>

                            <div class="margin-bottom-30px">
                                <div class="padding-30px background-white border-radius-20 box-shadow">
                                    <h3><i class="far fa-envelope-open margin-right-10px text-main-color"></i>Private Message</h3>
                                    <hr>
                                    <form action="patient-process-doc-message.php" method="post">
                                        <textarea name ="textareaContent" class="form-control" placeholder="Send a Message To Your Doctor" id="exampleTextarea" rows="3"></textarea>
                                        <select  class="form-control form-control-sm margin-top-10px" name="doctor">
                                            <option disabled selected value> -- select a doctor -- </option> <!-- default value -->
                                            <?php
                                                $doctors_boolean = queryHandler::getData('doctors','username','1');
                                                $data_for_doctors_name = $doctors_boolean->fetchAll(PDO::FETCH_ASSOC);
                                                if(!empty($data_for_doctors_name)){
                                                    foreach($data_for_doctors_name as $one_name){ ?>
                                                        <option><?= $one_name['username'] ?></option>
                                                <?php } 
                                                    
                                                } else { ?>
                                                    <option>No Doctors to send tips </option>
                                            <?php }
                                            ?>
                                    
                                        </select>
                                        <input type="submit" value="send" name = "subit" class="btn btn-md border-0 border-radius-10 background-main-color padding-lr-20px text-white margin-tb-10px">
                                        <h4 class=" margin-right-10px text-main-color">
                                            <?php
                                                if(isset($_SESSION['empty_inputs'])){
                                                    echo 'Some Inputs Left Empty';
                                                    unset($_SESSION['empty_inputs']);
                                                }
                                            ?>
                                        </h4>
                                    </form>
                                    
                                </div>
                                
 
                            </div>

                            
                            <div class="margin-bottom-30px">
                                <div class="padding-30px background-white border-radius-20 box-shadow">
                                    <h3><i class="far fa-bell margin-right-10px text-main-color"></i>Latest Appointements </h3>
                                    <hr>
                                    <table>
                                        <tr>
                                            <th>Patient Name</th>
                                            <th>Doctor Name</th>
                                            <th>Cause</th>
                                            <th>time of appointment</th>
                                            <th>time of reservation</th>
                                        </tr>
                                        <?php                   // query based on join
                                         $appointement_boolean = queryHandler::getData("(SELECT id,username FROM patients ) patients join appointment on patients.id = appointment.patient_id JOIN doctors on doctors.id = appointment.doctor_id"
                                         ,"appointment.appointment_id,appointment.patient_id,appointment.time_reservation,appointment.time_appointment,appointment.doctor_id,appointment.cause,patients.username as patient_name,doctors.username as doctor_name",
                                         "1 ORDER BY appointment.time_reservation LIMIT 3");
                                         
                                         if($appointement_boolean){
                                            $data_of_appointement = $appointement_boolean->fetchAll(PDO::FETCH_ASSOC);
                                            if(!empty($data_of_appointement)){
                                                foreach($data_of_appointement as $one_row){ ?>
                                                    <tr>
                                                        <td><?= $one_row['patient_name'] ?></td>
                                                        <td><?= $one_row['doctor_name'] ?></td>
                                                        <td><?= $one_row['cause'] ?></td>
                                                        <td><?= $one_row['time_appointment'] ?></td>
                                                        <td><?= $one_row['time_reservation'] ?></td>
                                                    </tr>
                                                    <?php } 
                                            } else { ?>
                                                    <tr>
                                                        <td colspan='5'><?php echo "No appointments to show" ?> </td>
                                                    </tr>
                                            <?php }
                                         }
                                        ?>
                                       
                                    </table>
                                    
                                </div>
                                
                            </div>
                            
                        </div>

                        <div class="col-lg-6">
                            <div class="margin-bottom-30px">
                                <div class="padding-30px background-white border-radius-20 box-shadow">
                                    <h3><i class="far fa-star margin-right-10px text-main-color"></i> Latest Reviews </h3>
                                    <hr>
                                    <ul class="commentlist padding-0px margin-0px list-unstyled text-grey-3">
                                        <?php
                                            $reviews_boolean = queryHandler::getData('patients join testimonials on testimonials.patient_id = patients.id',
                                            'testimonials.content,testimonials._datetime,testimonials.patient_id ,patients.username,patients.img_path'
                                            ,"patient_id != '$patient_Id' LIMIT 3");
                                            if($reviews_boolean){
                                                $data_Of_Reviews = $reviews_boolean->fetchALL(PDO::FETCH_ASSOC);
                                                if(!empty($data_Of_Reviews)){
                                                    foreach($data_Of_Reviews as $one_row){ ?>
                                                        <li class="border-bottom-1 border-grey-1 margin-bottom-20px">
                                                        <img src="../<?php
                                                                        if($one_row['img_path'] == ''){
                                                                            echo "profile.png";
                                                                        } else {
                                                                            echo "patientPhotos/{$one_row['img_path']}";
                                                                        }
                                                        ?>" class="float-left margin-right-20px border-radius-60 margin-bottom-20px" height="90px" width="70px">
                                                        <div class="margin-left-85px">
                                                            <a class="d-inline-block text-dark text-medium margin-right-20px" href="dashboard-home.php"><?= $one_row['username'] ?> </a>
                                                            <span class="text-extra-small">Date :  <a href="dashboard-home.php" class="text-main-color"><?= $one_row['_datetime'] ?></a></span>
                                                            <div class="rating">
                                                                <ul>
                                                                    <li class="active"></li>
                                                                    <li class="active"></li>
                                                                    <li class="active"></li>
                                                                    <li class="active"></li>
                                                                    <li></li>
                                                                </ul>
                                                            </div>
                                                            <p class="margin-top-15px text-grey-2"><?= $one_row['content'] ?></p>
                                                        </div>
                                                    </li>   
                                         <?php  } 
                                            } else { ?>
                                                <li class="border-bottom-1 border-grey-1 margin-bottom-20px">
                                                      <div class="margin-left-85px">
                                                           <p class="margin-top-15px text-grey-2">No reviews to show</p>
                                                      </div>
                                                </li>
                                           <?php }

                                        } 
                                        ?>
                                        
                                    
                                    </ul>
                                </div>
                            </div>
                            <div class="padding-30px background-white border-radius-20 box-shadow">
                                    <h3><i class="far fa-bell margin-right-10px text-main-color"></i>Doctor Tips </h3>
                                    <hr>
                                    <ul class="commentlist padding-0px margin-0px list-unstyled text-grey-3">
                                        <?php
                                            $tips_boolean = queryHandler::getData('tips join doctors on tips.doctor_id = doctors.id',
                                            'tips.doctor_tip,tips._datetime,doctors.username',"1");
                                            if($tips_boolean){
                                                $data_Of_tips = $tips_boolean->fetchALL(PDO::FETCH_ASSOC);
                                                if(!empty($data_Of_tips)){
                                                    foreach($data_Of_tips as $one_row){ ?>
                                                        <li class="border-bottom-1 border-grey-1 margin-bottom-20px">
                                                        <img src="" class="float-left margin-right-20px border-radius-60 margin-bottom-20px" height="60px" width="50px">
                                                        <div class="margin-left-85px">
                                                            <a class="d-inline-block text-dark text-medium margin-right-20px" href="dashboard-home.php"><?= $one_row['username'] ?> </a>
                                                            <span class="text-extra-small">Date :  <a href="dashboard-home.php" class="text-main-color"><?= $one_row['_datetime'] ?></a></span>
                                                            
                                                            <p class="margin-top-15px text-grey-2"><?= $one_row['doctor_tip'] ?></p>
                                                        </div>
                                                    </li>   
                                         <?php  } 
                                            } else { ?>
                                                <li class="border-bottom-1 border-grey-1 margin-bottom-20px">
                                                      <div class="margin-left-85px">
                                                           <p class="margin-top-15px text-grey-2">No Tips to show</p>
                                                      </div>
                                                </li>
                                           <?php }

                                        } 
                                        ?>
                                        
                                    
                                    </ul>
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>



                </div>
            </div>
            


        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <span>© 2018 tabib Health Directory | All Right Reserved <a class="text-grey-2 margin-left-15px"  target="_blank">Powered by : Nile Theme</a></span>
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
