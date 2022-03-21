<?php
session_start();
unset($_SESSION);
session_destroy();

header('location:admin-choosing.php');
exit;

?>