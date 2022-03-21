<?php
session_start();
require_once "../queryHandlerclass/query.php";
if (isset($_POST['register']))
{
    $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
    $GET_statement = queryHandler::getData("patients","username","");
    $GET_array=$GET_statement->fetchAll(PDO::FETCH_COLUMN);
    if(in_array($username,$GET_array)){
        $_SESSION['alert'] = "Duplicated Entry ,Choose another username";
        header("location:index.php");
        exit();
    }
    $age = filter_input(INPUT_POST,'age',FILTER_SANITIZE_NUMBER_INT);
    $firstname  = filter_input(INPUT_POST,'first_name',FILTER_SANITIZE_STRING);
    $lastname  = filter_input(INPUT_POST,'last_name',FILTER_SANITIZE_STRING);
    $password  = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
    $confirmPass = filter_input(INPUT_POST,'confirm_pass',FILTER_SANITIZE_STRING);
    if($password != $confirmPass){
        $_SESSION['alert'] = "two passwords doesn't match ";
        header("location:index.php");
        exit();
    }
    $encryptedpass = $password;    // md5
    $dob =date('Y-m-d', strtotime($_POST['dob']));
    $gender = filter_input(INPUT_POST,'gender',FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST,'address',FILTER_SANITIZE_STRING);
    $additionalinfo = filter_input(INPUT_POST,'additional',FILTER_SANITIZE_STRING);
    $country = filter_input(INPUT_POST,'country',FILTER_SANITIZE_STRING);
    $phonecode = filter_input(INPUT_POST,'countrycode',FILTER_SANITIZE_STRING);
    $phonenumber = filter_input(INPUT_POST,'phone',FILTER_SANITIZE_STRING);
    $phone = $phonecode.$phonenumber ;
    $email = filter_input(INPUT_POST,'your_email',FILTER_VALIDATE_EMAIL);
    $add_sql = queryHandler::AddData('patients',
                                    "username,age,password,phone,email,gender,country,dob,address,first_name,last_name"
                                     ,"'$username','$age','$encryptedpass','$phone','$email','$gender','$country','$dob','$address','$firstname','$lastname'");

     if ($add_sql){
         $boolean = queryHandler::getData('patients','id',"username = '$username'");
         $id_array = $boolean->fetch(PDO::FETCH_ASSOC);
         $id = $id_array['id'];
         $_SESSION['PATIENT_ID'] = $id ;
         $_SESSION['PATIENT_USERNAME'] = $username;
         $_SESSION['PATIENT_PASSWORD'] = $encryptedpass;
         $_SESSION['PATIENT_AGE'] = $age;
         $_SESSION['PATIENT_PHONE'] = $phone;
         $_SESSION['PATIENT_EMAIL'] = $email;
         $_SESSION['PATIENT_GENDER'] = $gender;
         $_SESSION['PATIENT_COUNTRY'] = $country;
         $_SESSION['PATIENT_DOB'] = $dob;
         $_SESSION['PATIENT_ADDRESS'] = $address;
         $_SESSION['PATIENT_FIRST_NAME'] = $firstname;
         $_SESSION['PATIENT_LAST_NAME'] = $lastname;
         header("location:../patient/dashboard-home.php");
        exit();
    }
}
?>

