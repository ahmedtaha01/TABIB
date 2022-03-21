<?php
require_once "../queryHandlerclass/query.php";
session_start();
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
                                    <a id="logo" href="index.php" class="d-inline-block margin-tb-15px"><img src="../assets/img/logo-1.png" alt=""></a>
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
    
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My patients">
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
                
                <div class="col-xl-3 col-md-6 margin-bottom-30px">
                    <a class="d-block padding-30px background-main-color box-shadow border-radius-10 hvr-float">
                        <h6 class="text-white margin-0px font-weight-400">
                            <i class="far fa-map text-icon-large margin-bottom-10px opacity-5 d-block"></i>
                            <?php
                            $sql_statment = queryHandler::getData("appointment","COUNT(*)","");
                            $result = $sql_statment->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <span class="font-2 text-extra-large"><?=$result['COUNT(*)']?></span>
                            <span class="margin-left-10px">Number Of Appointements</span>
                        </h6>
                    </a>
                </div>
                
                <div class="col-xl-3 col-md-6 margin-bottom-30px">
                    <a class="d-block padding-30px background-lime box-shadow border-radius-10 hvr-float">
                        <h6 class="text-white margin-0px font-weight-400">
                            <i class="far fa-user text-icon-large margin-bottom-10px opacity-5 d-block"></i>
                            <?php
                            $sql_statment = queryHandler::getData("doctors","COUNT(*)","");
                            $result = $sql_statment->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <span class="font-2 text-extra-large"><?=$result['COUNT(*)']?></span>
                            <span class="margin-left-10px">Doctors</span>
                        </h6>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 margin-bottom-30px">
                    <a class="d-block padding-30px background-amber box-shadow border-radius-10 hvr-float">
                        <h6 class="text-white margin-0px font-weight-400">
                            <i class="far fa-star text-icon-large margin-bottom-10px opacity-5 d-block"></i>
                            <?php
                            $sql_statment = queryHandler::getData("patients","COUNT(*)","");
                            $result = $sql_statment->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <span class="font-2 text-extra-large"><?=$result['COUNT(*)']?></span>
                            <span class="margin-left-10px">Total Patients</span>
                        </h6>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 margin-bottom-30px">
                    <a class="d-block padding-30px background-red box-shadow border-radius-10 hvr-float">
                        <h6 class="text-white margin-0px font-weight-400">
                            <i class="fas fa-chart-line text-icon-large margin-bottom-10px opacity-5 d-block"></i>
                            <?php
                            $sql_statment = queryHandler::getData("testimonials","COUNT(*)","");
                            $result = $sql_statment->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <span class="font-2 text-extra-large"><?=$result['COUNT(*)']?></span>
                            <span class="margin-left-10px">Total reviews</span>
                        </h6>
                    </a>
                </div>

                <div class="col-12">
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="margin-bottom-30px">
                                <div class="padding-30px background-white border-radius-20 box-shadow">
                                    <h3><i class="far fa-envelope-open margin-right-10px text-main-color"></i> Doctor Tip </h3>
                                    <hr>
                                    <?php $DOCTOR_ID = $_SESSION['DOCTOR_ID']; ?>
                                    <form method="post" action="addtipToreviews.php?docid=<?=$DOCTOR_ID?>">
                                        <textarea name="doctip" class="form-control" placeholder="Add your tip to latest reviews" id="exampleTextarea" rows="3"></textarea>
                                        <input style="cursor: pointer" type="submit" name="submit" value="Send Now"  class="btn btn-md border-0 border-radius-10 background-main-color padding-lr-20px text-white margin-tb-10px">
                                    </form>
                                </div>
                                <!-- -->
                            </div>
                            <?php
                            $DOCTOR_ID = $_SESSION['DOCTOR_ID'];
                            $query ="SELECT patients.username,appointment.appointment_id, patients.first_name ,appointment.cause ,appointment.time_reservation,
                                      appointment.time_appointment,patients.last_name,patients.email,patients.gender
                                     ,patients.age ,doctors.id FROM appointment
                                     JOIN patients ON patients.id = appointment.patient_id JOIN doctors ON
                                     appointment.doctor_id = doctors.id   where doctors.id = '$DOCTOR_ID' ORDER BY time_reservation DESC LIMIT  3 ";
                            $sql_statement = $GLOBALS['connection']->prepare($query);
                            $sql_statement->execute();
                            $result = $sql_statement->fetchall(PDO::FETCH_ASSOC);
                            ?>
                            <div class="margin-bottom-30px">
                                <div class="padding-30px background-white border-radius-20 box-shadow">
                                    <h3><i class="far fa-bell margin-right-10px text-main-color"></i>Latest Appointements </h3>
                                    <hr>
                                    <table>
                                        <tr>
                                            <th>Username</th>
                                            <th>case</th>
                                            <th>Time.Appointment</th>
                                            <th>Time.Reservation</th>
                                        </tr>
                                        <?php
                                        foreach ($result as $index){
                                        ?>
                                        <tr>

                                            <td><?=$index['username']?></td>
                                            <td><?=$index['cause']?></td>
                                            <td><?=$index['time_appointment']?></td>
                                            <td><?=$index['time_reservation']?></td>

                                        </tr>
                                        <?php } ?>
                                    </table>
                                    
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!-- -->
                            <?php
                            $query = "SELECT patients.username,testimonials.content, testimonials._datetime, patients.first_name , patients.last_name FROM testimonials INNER JOIN patients ON testimonials.patient_id = patients.id LIMIT 3";
                            $sql_statement = $GLOBALS['connection']->prepare($query);
                            $sql_statement->execute();
                            $result = $sql_statement->fetchall(PDO::FETCH_ASSOC);
                            ?>
                            <div class="margin-bottom-30px">
                                <div class="padding-30px background-white border-radius-20 box-shadow">
                                    <h3><i class="far fa-star margin-right-10px text-main-color"></i> Latest Reviews </h3>
                                    <hr>
                                    <ul class="commentlist padding-0px margin-0px list-unstyled text-grey-3">
                                        <li class="border-bottom-1 border-grey-1 margin-bottom-20px">
                                            <img src="http://placehold.it/60x60" class="float-left margin-right-20px border-radius-60 margin-bottom-20px" alt="">
                                            <div class="margin-left-85px">
                                                <a class="d-inline-block text-dark text-medium margin-right-20px" href="#"><?=$result[0]['first_name']." ".$result[0]['last_name']?></a>
                                                <span class="text-extra-small">Date :  <a href="#" class="text-main-color"><?=$result[0]['_datetime']?></a></span>
                                                <div class="rating">
                                                    <ul>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                        <li></li>
                                                    </ul>
                                                </div>
                                                <p class="margin-top-15px text-grey-2"><?=$result[0]['content']?></p>
                                            </div>
                                        </li>
                                        <li class="border-bottom-1 border-grey-1 margin-bottom-20px">
                                            <img src="http://placehold.it/60x60" class="float-left margin-right-20px border-radius-60 margin-bottom-20px" alt="">
                                            <div class="margin-left-85px">
                                                <a class="d-inline-block text-dark text-medium margin-right-20px" href="#"><?=$result[1]['first_name']." ".$result[1]['last_name']?></a>
                                                <span class="text-extra-small">Date :  <a href="#" class="text-main-color"><?=$result[1]['_datetime']?></a></span>
                                                <div class="rating">
                                                    <ul>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                </div>
                                                <p class="margin-top-15px text-grey-2"><?=$result[1]['content']?></p>
                                            </div>
                                        </li>
                                        <li class="border-bottom-1 border-grey-1 margin-bottom-20px">
                                            <img src="http://placehold.it/60x60" class="float-left margin-right-20px border-radius-60 margin-bottom-20px" alt="">
                                            <div class="margin-left-85px">
                                                <a class="d-inline-block text-dark text-medium margin-right-20px" href="#"><?=$result[2]['first_name']." ".$result[2]['last_name']?></a>
                                                <span class="text-extra-small">Date :  <a href="#" class="text-main-color"><?=$result[2]['_datetime']?></a></span>
                                                <div class="rating">
                                                    <ul>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                    </ul>
                                                </div>
                                                <p class="margin-top-15px text-grey-2"><?=$result[2]['content']?></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div><br>


                                <div class="padding-30px background-white border-radius-20 box-shadow">
                                    <h3><i class="far fa-star margin-right-10px text-main-color"></i> Latest Doctors Tips </h3>
                                    <hr>
                                    <?php
                                    $query = "SELECT doctors.img_path,doctors.username,tips.doctor_tip, tips._datetime, doctors.first_name , doctors.last_name FROM tips INNER JOIN doctors ON tips.doctor_id = doctors.id ORDER BY _datetime DESC LIMIT 3";
                                    $sql_statement = $GLOBALS['connection']->prepare($query);
                                    $sql_statement->execute();
                                    $result = $sql_statement->fetchall(PDO::FETCH_ASSOC);
                                    if (!empty($result)){
                                        foreach ($result as $index){
                                            ?>

                                    <ul class="commentlist padding-0px margin-0px list-unstyled text-grey-3">
                                        <li class="border-bottom-1 border-grey-1 margin-bottom-20px">
                                            <img height="70px" width="70px" src="imgs/<?= isset($index['img_path'])? $index['img_path']:"http://placehold.it/60x60"?>" class="float-left margin-right-20px border-radius-60 margin-bottom-20px" alt="">
                                            <div class="margin-left-85px">
                                                <a class="d-inline-block text-dark text-medium margin-right-20px" href="#"><?=$index['first_name']." ".$index['last_name']?></a>
                                                <span class="text-extra-small">Date :  <a href="#" class="text-main-color"><?=$index['_datetime']?></a></span>
                                                <div class="rating">
                                                    <ul>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                        <li class="active"></li>
                                                        <li></li>
                                                    </ul>
                                                </div>
                                                <p class="margin-top-15px text-grey-2"><?=$index['doctor_tip']?></p>
                                            </div>
                                        </li>
                                    </ul>
                                        <?php
                                    }
                                    }else
                                    {?>
                                        <div class="background-white thum-hover box-shadow hvr-float full-width margin-bottom-45px">
                                            <p class="text-grey-2" style="color: dodgerblue ;padding: 10px;font-size: 22px; ">No Data To Show</p></div>
                                    <?php }
                                    ?>
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
