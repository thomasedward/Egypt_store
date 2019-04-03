<?php
session_start();

$title = 'Egypt Store';

if(!isset($_SESSION['user']))
{
    header('Location:index.php');// redirest to dashboard 
    exit();
}

include "init.php";
?>
 </ul>
 </div>
 </div>
 </nav>

<div class="container-fluid pt-5 pb-5">

    <div class="row">

        <div class="col-md-2"></div>
          <div class="col-md-8">
                                     
                                <div class="card  " style="min-height:500px;" >
                                 
                                <div class="card-header bg-gradient-info">
                                  Thank You 
                                </div>
                                 
                                <div class="card-body mt-5">

                                    <div class="row">

                                        <div class="col-md-6">

                                                 <img src="layouts/images/5.jpg" alt="Prodact" class="img-thumbnail"style="width:100%;height:250px;" >


                                        </div>
                                        <div class="col-md-6 " >

                                            <p>Hello <?php echo $_SESSION['user'] ?>,
                                            Your payment process is successfully completed you
                                            and your transaction id is xxxx xxxxx xxx <br>
                                            you can continue your Shopping
                                            </p>
                                            <a href="index.php" class="btn btn-success"> Contiune Shoping </a>
                                        </div>


                                    </div>
                               
                                </div>
                           
                                <div class="card-footer text-center">

    

                                </div>
                                </div>
                          
           </div>
        <div class="col-md-2"></div>

    </div>

</div>

<?php
include $tpl .  "footer.php";
?>
suc