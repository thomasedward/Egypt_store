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
                                  Customer Order Details 
                                </div>
                                 
                                <div class="card-body mt-5">

                                    <div class="row">

                                        <div class="col-md-6">

                                                 <img src="layouts/images/5.jpg" alt="Prodact" class="img-thumbnail"style="width:100%;height:250px;" >


                                        </div>
                                        <div class="col-md-6 " >

                                                <table class="table table-striped">
                                              
                                               
                                                    <tr>
                                                    <td>Product Name</td>
                                                    <td>Sony</td>
                                                    </tr>
                                                    <tr>
                                                    <td>Product Price</td>
                                                    <td>$500</td>
                                                    </tr>
                                                    <tr>
                                                    <td>Quantity</td>
                                                    <td>3</td>
                                                    </tr>
                                                    <tr>
                                                    <td>Payment</td>
                                                    <td>Completed</td>
                                                    </tr>
                                                    <tr>
                                                    <td>Transaction Id</td>
                                                    <td>sdfgsdfsd48d48dsf4sdfsdf</td>
                                                    </tr>
                                               
                                                </table>

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
