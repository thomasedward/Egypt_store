<?php



ini_set('display_errors' , 'On');
error_reporting(E_ALL);
// defintion variables
// include for file connect to database

include "connect.php";


$sessionUser = '';
if(isset($_SESSION['user']))
{
    $sessionUser = $_SESSION['user'];
}
// Routes 
$tpl = "includes/templates/";  // template 
$css = "layouts/css/";         // css Directory
$js  = "layouts/js/";          // js Directory
$lang = "includes/lang/";      // lang Directory  
$fun = "includes/functions/";  // functions Directory  


// include the important file 
include $fun . "functions.php";
include $lang .  "en.php";
include $tpl . "header.php";
include $tpl . "navbar.php";
