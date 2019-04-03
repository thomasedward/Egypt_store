<?php 

session_start();

include "connect.php";
$fname = $_POST['first'];
$lname = $_POST['last'];
$email = $_POST['email'];
$password1 = md5($_POST['password']);
$password2 = md5($_POST['password2']);
$mobile = $_POST['mobile'];
$adress1 = $_POST['address'];
$adress2 = $_POST['address2'];
//validation
$name ="/^[A-Z][a-zA-Z]+$/";
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-])*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";
           $formErrors  = array();
           $massages    = array();
           if(empty($fname) || empty($lname) || empty($email) || empty($password1) 
           || empty($password2) || empty($mobile) || empty($adress1) || empty($adress2) )
           {
            $formErrors[] = 'Please Fill All  fields';
          
           
           }
           else{
               /*
           if(!preg_match($name,$fname) && !empty($fname))
           {
            $formErrors[] = $fname . 'is not valid (first name)';
            
           }
           if(!preg_match($name,$lname)  && !empty($lname))
           {
            $formErrors[] = $lname . 'is not valid (Last Name)';
           
           }
           */
           if(!preg_match($emailValidation,$email)  && !empty($email))
           {
            $formErrors[] = $email . 'is not valid (Email)';
            
           }
           if(!preg_match($number,$mobile)  && !empty($mobile))
           {
            $formErrors[] = $mobile . 'is not valid (mobile)';
           
           }
           if(strlen($_POST['password']) < 8)
           {
            $formErrors[] = 'Password can\'t less than 8 ';
           }
           if(strlen($_POST['password']) > 20)
           {
            $formErrors[] = 'Password can\'t larger than 20 ';
           }
           if($password1 !== $password2)
           {
            $formErrors[] = 'Password must be match ';
           }
           if(!(strlen($mobile) == 11) )
         {
            $formErrors[] = $mobile . 'must be 10 digit (mobile)';
           }


             // check if the user Exist in databse  
             $statment = $connect->prepare("SELECT user_id FROM user_info WHERE email = ? ");
$statment->execute(array( $email ));
$count = $statment->rowCount(); // reatult of request 
// check if request done or no 

if ($count > 0) {
    $formErrors[] = 'Email can\'t be deblicat ';
 }


        }
           if(!empty($formErrors))
           {
               foreach($formErrors as $error ) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $error;?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <?php }}
           else
           {

           
           // check if the user Exist in databse  
           $statment = $connect->prepare("
                                        INSERT INTO 
                                        user_info(   first_name ,  last_name ,  email ,  password ,  mobile ,  address1 ,  address2 ) 
                                        VALUES (:zfirst,:zlast,:zemail,:zpass , :zmobile , :zaddress ,:zaddress2  )
                                        "
                );
            $statment->execute(array(

            "zfirst"             =>  $fname,
            "zlast"              =>  $lname,
            "zemail"             =>  $email,
            "zpass"              =>  $password1,
            "zmobile"            =>  $mobile,
            "zaddress"           =>  $adress1,
            "zaddress2"          =>  $adress2
            ));
            $count = $statment->rowCount(); // reatult of request 
            // check if request done or no 

            if ($count > 0) {
               
            
                ?>
                 <div class="alert alert-info alert-dismissible fade show" role="alert">
                 Your register Now And Your Waiting admain active mail
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php }
         
        }
?>