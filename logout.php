<?php
// i will keep yelling this 
//dont forget to start the session !!
session_start();
session_destroy();

//if the user is logged in, unset the session
//if(isset($_SESSION['basic_is_logged_in'])){
//	unset($_SESSION['basic_is_logged_in']);
//}

//now that user is logged in
//go to login page
header('Location: login1.php');
?>