<?php
session_start();

$title = 'Egypt Store';

if(isset($_SESSION['user']))
{
    header('Location:profile.php');// redirest to dashboard 
    exit();
}

include "init.php";
include $tpl . "navbar2.php";

?>
 
 

<div class="container-fluid pt-5 pb-5">

    <div class="row">

        <div class="col-md-1"></div>
        <div class="col-md-2">

        <div id="get_categoires"></div>
        <div id="get_brands"></div>
         <!--
         <ul class="list-group ">
            <li class="list-group-item active">catoriges</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
      
        <ul class="list-group pt-4">
            <li class="list-group-item active">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
             -->
        </div>
        <div class="col-md-8">

            <div class="card  text-center">
                     <!-- header -->
                    <div class="card-header bg-gradient-info">
                        Products
                    </div>
                     <!-- body -->
                    <div class="card-body">
                                              
                       <div class="row">
                             <!-- ////////////////////////////// -->
                             <div id="get_products"></div>
                           <!--    <div class="col-md-4" >
                                    inter 
                                <div class="card  " style="height:400px;">
                                header 
                                <div class="card-header bg-gradient-info">
                                    Samsang Galaxy
                                </div>
                                body 
                                <div class="card-body">
                                <img src="layouts/images/2.jpg" alt="Prodact" class="img-thumbnail w-100 h-100">

                                </div>
                          Footer 
                                <div class="card-footer ">
                                    <span class="badge badge-light float-left p-2 border"> $100 </span>
                                    <a class="btn btn-outline-danger btn-sm pr-2 pl-2 float-right" href="#" role="button">AddToCart</a>
                                </div>
                                </div>
                          
                             -->
                            <!-- ////////////////////////////// -->
                  
                            
                        </div>

                    </div>
                    <!-- Footer -->
                    <div class="card-footer text-muted">
                     Egypt Store  &copy; 2018
                    </div>
             </div>
                
        </div>
        <div class="col-md-1"></div>

    </div>

</div>

<?php
include $tpl .  "footer.php";
?>
