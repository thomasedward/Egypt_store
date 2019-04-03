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


        
        <form class="form-inline my-2 my-lg-0" >
            <input class="form-control mr-sm-2" id ="search" type="text" placeholder="Search" aria-label="Search" style="min-width:300px;">
            <button class="btn btn-outline-info my-2 my-sm-0" id="search-btn"> <i class="fa fa-search"></i> Search</button>
          </form>
         
          </ul>
        </div>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown" id="getcart">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-globe"></i> 
             Cart 
             <span class="badge badge-light ml-1" >
                 <div id="cartno"></div>
             </span>
            </a>
                          <!-- Drop Down -->

            <div class="dropdown-menu ml-auto" aria-labelledby="navbarDropdown" style="right:10px; width:600px;">
            <div id="get_cart"></div>
                
            </div>
            <!-- End drop down -->
         </li>

<?php if (isset($_SESSION['user'])) 
{?>
  <li class="nav-item dropdown  pr-2">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-user"></i>  <?php echo $_SESSION['user'];?>
  </a>

    <!-- Drop Down -->
    <div class="dropdown-menu bg-info ml-auto" aria-labelledby="navbarDropdown" style="right:10px; width:100px;">
    <a class="dropdown-item" href="cartinfo.php">cart</a>
    <a class="dropdown-item" href="#">change password</a>
    <a class="dropdown-item" href="logout.php">logout</a>
  </div>
  </li>
<?php }
?>


          </ul>
        </div>




  </div>
</nav>


<!-- page -->

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

        <div id="set_cart"></div>
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
            <nav aria-label="Page navigation example" class="text-center mt-2">
                <ul class="pagination" id="pageno">
                  
                </ul>
            </nav>
    </div>
    <div class="col-md-1"></div>

</div>

</div>


<?php
include $tpl .  "footer.php";

?>