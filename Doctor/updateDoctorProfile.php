<?php
session_start();
require_once "../queryHandlerclass/query.php";
$oldusername = $_SESSION['DOCTOR_USERNAME'];
if (isset($_POST['submit']))
{
    $docusername = filter_input(INPUT_POST,'docUsername',FILTER_SANITIZE_STRING);
    $GET_statement_doctors = queryHandler::getData("doctors","username","");
    $GET_statement_patients = queryHandler::getData("patients","username","");
    $GET_array_doctors = $GET_statement_doctors->fetchAll(PDO::FETCH_COLUMN);
    $GET_array_patients = $GET_statement_patients->fetchAll(PDO::FETCH_COLUMN);
    $res = array_merge($GET_array_doctors,$GET_array_patients);
    $key = array_search ($oldusername, $res);
    unset($res[$key]);
    if(in_array($docusername,$res)){
        $_SESSION['alert'] = "Duplicated Entry ,Choose another username";
        header("location:dashboard-my-profile.php");
        exit();
    }
    $firstname  = filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING);
    $lastname  = filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING);
    $password  = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
    $confirmPass = filter_input(INPUT_POST,'confpassword',FILTER_SANITIZE_STRING);
    if($password != $confirmPass){
        $_SESSION['alert'] = "two passwords doesn't match ";
        header("location:dashboard-my-profile.php");
        exit();
    }
    $encryptedpass = md5($password);
    $address = filter_input(INPUT_POST,'address',FILTER_SANITIZE_STRING);
    $specialization = filter_input(INPUT_POST,'specialization',FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST,'phone',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $timeOfArrival = filter_input(INPUT_POST,'timepres');
    $timeOfstay = filter_input(INPUT_POST,'staytime',FILTER_SANITIZE_NUMBER_INT);
    $update_sql = queryHandler::UpdateData('doctors',"username = '$docusername',address='$address',phone='$phone',email='$email',
          password='$password',specialization='$specialization',time_of_presense='$timeOfArrival',stay_time='$timeOfstay',first_name='$firstname',
          last_name='$lastname'","id='{$_GET['docid']}'");

    if ($update_sql) {
        $_SESSION['updatedone'] = 1;
        $_SESSION['DOCTOR_USERNAME'] = $docusername;
        $_SESSION['DOCTOR_PASSWORD'] = $password;
        $_SESSION['DOCTOR_PHONE'] = $phone;
        $_SESSION['DOCTOR_EMAIL'] = $email;
        $_SESSION['DOCTOR_SPECIALIZATION'] = $specialization;
        $_SESSION['DOCTOR_TIME_OF_PRESENSE'] = $timeOfArrival;
        $_SESSION['DOCTOR_address'] = $address;
        $_SESSION['DOCTOR_STAY_TIME'] = $timeOfstay;
        $_SESSION['DOCTOR_FIRSTNAME'] = $firstname;
        $_SESSION['DOCTOR_LASTNAME'] = $lastname;
        header("location:dashboard-my-profile.php");
        exit();

    }
}
?>

