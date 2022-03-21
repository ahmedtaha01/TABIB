<?php
 session_start();
 require_once '../queryHandlerclass/query.php';


if(isset($_POST['subit'])){
    $username = filter_input( INPUT_POST , 'username' , FILTER_SANITIZE_STRING );
    $password = filter_input( INPUT_POST , 'password' , FILTER_SANITIZE_STRING );
    //$password = md5($password);
    $type = $_POST['type'];
    $tablename = ($type == 'Doctor')? 'doctors' : 'patients';
    
    $sql_statment = queryHandler::getData("$tablename","*","username='$username' AND password='$password'");
    $data = $sql_statment->fetch(PDO::FETCH_ASSOC);
    if(!empty($data)){
        if($tablename == 'patients') {
            $_SESSION['PATIENT_ID'] = $data['id'];
            $_SESSION['PATIENT_USERNAME'] = $data['username'];
            $_SESSION['PATIENT_PASSWORD'] = $data['password'];       //collect data
            $_SESSION['PATIENT_AGE'] = $data['age'];
            $_SESSION['PATIENT_PHONE'] = $data['phone'];
            $_SESSION['PATIENT_EMAIL'] = $data['email'];
            $_SESSION['PATIENT_GENDER'] = $data['gender'];   
            $_SESSION['PATIENT_COUNTRY'] = $data['country'];
            $_SESSION['PATIENT_DOB'] = $data['dob'];
            $_SESSION['PATIENT_ADDRESS'] = $data['address'];
            $_SESSION['PATIENT_FIRST_NAME'] = $data['first_name'];   
            $_SESSION['PATIENT_LAST_NAME'] = $data['last_name'];
            $_SESSION['IMG_PATH'] = $data['img_path'];
            header('location:../patient/dashboard-home.php');
            exit();
        }
        elseif ($tablename == 'doctors'){
            $_SESSION['DOCTOR_ID'] = $data['id'];
            $_SESSION['DOCTOR_USERNAME'] = $data['username'];
            $_SESSION['DOCTOR_PASSWORD'] = $data['password'];
            $_SESSION['DOCTOR_PHONE'] = $data['phone'];
            $_SESSION['DOCTOR_EMAIL'] = $data['email'];
            $_SESSION['DOCTOR_SPECIALIZATION'] = $data['specialization'];
            $_SESSION['DOCTOR_TIME_OF_PRESENSE'] = $data['time_of_presense'];
            $_SESSION['DOCTOR_address'] = $data['address'];
            $_SESSION['DOCTOR_STAY_TIME'] = $data['stay_time'];
            $_SESSION['DOCTOR_FIRSTNAME'] = $data['first_name'];
            $_SESSION['DOCTOR_LASTNAME'] = $data['last_name'];
            header('location:../Doctor/dashboard-home.php');
            exit();
        }
    } else {
        $_SESSION['NOT_EXIST'] = "wrong username or password";       // wrong username or password
        header('location:index.php');
        exit;
    }

} else {
    header('location:index.php');      // no submit
    exit;
}
?>