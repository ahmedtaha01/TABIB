<?php
session_start();
require_once '../queryHandlerclass/query.php';

if(isset($_POST['subit'])){       // age is int
    $patient_id = $_SESSION['PATIENT_ID'];
    $patient_name = filter_input( INPUT_POST , 'username' , FILTER_SANITIZE_STRING );
    $patient_password = filter_input( INPUT_POST , 'password' , FILTER_SANITIZE_STRING );
    $patient_age = filter_input( INPUT_POST , 'age' , FILTER_SANITIZE_STRING );
    $patient_dob = filter_input( INPUT_POST , 'dateOfBirth' , FILTER_SANITIZE_STRING );
    $patient_phone = filter_input( INPUT_POST , 'phone' , FILTER_SANITIZE_STRING );
    $patient_email = filter_input( INPUT_POST , 'e-mail' , FILTER_SANITIZE_EMAIL );
    $patient_first_name = filter_input( INPUT_POST , 'firstName' , FILTER_SANITIZE_STRING );
    $patient_last_name = filter_input( INPUT_POST , 'lastName' , FILTER_SANITIZE_STRING );
    $patient_country = filter_input( INPUT_POST , 'country' , FILTER_SANITIZE_STRING );
    $patient_address = filter_input( INPUT_POST , 'address' , FILTER_SANITIZE_STRING );
    $patient_gender = $_POST['gender'];
    $patient_image_array = $_FILES['File'];
    $patient_image_tmp_file = $patient_image_array['tmp_name'];
    $patient_image_name = $patient_image_array['name'];
    //conversion
    $patient_age = (int)$patient_age;
    /////////////
    
    $boolean = queryHandler::UpdateData('patients',"username = '$patient_name',password = '$patient_password',
                                        age = '$patient_age',dob = '$patient_dob',phone = '$patient_phone',
                                        email = '$patient_email',first_name = '$patient_first_name',
                                        last_name = '$patient_last_name',country = '$patient_country',
                                        address = '$patient_address',gender = '$patient_gender',
                                        img_path = '$patient_image_name'","id = '$patient_id' ");
    unlink("../patientPhotos/{$_SESSION['IMG_PATH']}");                                    
    if($patient_image_name != ''){
        move_uploaded_file($patient_image_tmp_file,"../patientPhotos/".$patient_image_name);
    } 


    if($boolean == true){
        $_SESSION['PATIENT_USERNAME'] = $patient_name;
        $_SESSION['PATIENT_PASSWORD'] = $patient_password;       //collect data
        $_SESSION['PATIENT_AGE'] = $patient_age;
        $_SESSION['PATIENT_PHONE'] = $patient_phone;
        $_SESSION['PATIENT_EMAIL'] = $patient_email;
        $_SESSION['PATIENT_GENDER'] = $patient_gender;   
        $_SESSION['PATIENT_COUNTRY'] = $patient_country;
        $_SESSION['PATIENT_DOB'] = $patient_age;
        $_SESSION['PATIENT_ADDRESS'] = $patient_address;
        $_SESSION['PATIENT_FIRST_NAME'] = $patient_first_name;
        $_SESSION['PATIENT_LAST_NAME'] = $patient_last_name;
        $_SESSION['IMG_PATH'] = $patient_image_name;    
    }
    
    
    header('location:dashboard-my-profile.php');
    exit;
    
} else {
    header('location:dashboard-home.php');
    exit;
}


?>