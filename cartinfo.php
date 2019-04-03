<?php
session_start();

$title = 'Egypt Store';


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
                                  My Cart information
                                </div>
                                 
                                <div class="card-body">

                                <div id="cartinfo"></div>
                               
                                </div>
                           
                                <div class="card-footer text-center">

        <div id="get_msg"></div>

                                </div>
                                </div>
                          
           </div>
        <div class="col-md-2"></div>

    </div>

</div>

<?php
include $tpl .  "footer.php";
?>
