<?php 

session_start();

include "connect.php";
$email = $_POST['email'];
$password = md5($_POST['password']);

     // check if the user Exist in databse  
     $statment = $connect->prepare("SELECT  
                                    * 
                                FROM 
                                    user_info
                                WHERE 
                                email = ? AND password=? 
                                LIMIT 1"
                                );
$statment->execute(array($email , $password));
$row  = $statment->fetch();

$count = $statment->rowCount(); // reatult of request 
// check if request done or no 
if ($count > 0) {


$_SESSION['user'] = $row['first_name']; // register session name
$_SESSION['id'] = $row['user_id']; // register session id

   header('Location:profile.php');// redirest to dashboard 
 }


?>