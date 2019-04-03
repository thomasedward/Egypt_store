<?php
ob_start(); // output Bufering start

$title = '';
session_start();


if (isset($_SESSION['username']))
 {
    include "init.php";
    // statment for get requeset page  empty or not 
    $do = '';
    if(isset($_GET['do']))
    {
        $do = $_GET['do'];
    }
    else
    { 
        $do = 'Manage';
    }
   // statment for get requeset page  types
   if ( $do == 'Manage' )
   {
    }
   elseif ( $do == 'Add' )
   {
     }
   elseif ( $do == 'Insert' )
   { 
    }

   elseif ( $do == 'Edit' )
   { 
   }
   elseif($do == 'Update')
   { 
   }
   elseif($do == 'Delete')
   {
       
   }
   elseif($do = 'Active')
   {
   }
      else
   { 
       ?>  
    <h1 class="text-center pb-5 font-weight-bold text-secondary"></h1>
                <div class="container">
                
                <?php redirectpage('There Is No Such ID Or Not Allow for you this Account Or you Enter error url ',7); ?>
               
                </div>
   <?php }

    
    include $tpl .  "footer.php";
}
else
{

    header('Location: dashboard.php');// redirest to dashboard 

}



?>

<?php 
ob_end_flush();

?>
