<?php 
session_start();

include "connect.php";


// category show ajax 

if(isset($_POST['category']))
{
       $stmt = $connect->prepare("SELECT * FROM categories");
       $stmt->execute();
       $row =$stmt->fetchAll();
       $count = $stmt->rowCount();

    echo '
            <ul class="list-group ">
            <li class="list-group-item active  "> <a href="#" class="text-white other"><h4>catoriges</h4> </a></li>

            ';
    if($count > 0)
    {
        foreach($row as $row)
        {
        $catid = $row['cat_id'];
        $catname = $row['cat_title'];
        echo '
        <li class=" list-group-item "> <a href="#" class="category"  catid="' . $catid . '">' . $catname . ' </a></li>
        ';


    } 
    echo '
    </ul>
            ';
}

}
// brand show ajax 

if(isset($_POST['brand']))
{
    $stmt = $connect->prepare("SELECT * FROM brands");
       $stmt->execute();
       $row =$stmt->fetchAll();
       $count = $stmt->rowCount();

    echo '
            <ul class="list-group  pt-4">
            <li class="list-group-item active  "> <a href="#" class="text-white other"><h4>Brands</h4> </a></li>

            ';
    if($count > 0)
    {
        foreach($row as $row)
        {
        $brandid = $row['brand_id'];
        $brandname = $row['brand_title'];
        echo '
        <li class="list-group-item"> <a href="#" class="brand"  brandid="' . $brandid . '">' . $brandname . ' </a></li>
        ';


    } 
    echo '
    </ul>
            ';
}

}


// page of data 
if(isset($_POST['page']))
{
    $stmt = $connect->prepare("SELECT * FROM products");
    $stmt->execute();
    $row =$stmt->fetchAll();
    $count = $stmt->rowCount();
    $pageno =  ceil($count/9);
    for($i=1;$i<=$pageno;$i++)
    {
       echo  '<li class="page-item "><a class="page-link" id="page" page="' . $i . '" href="#">' . $i . '</a></li>';
        
    }
}
// product show ajax 

if(isset($_POST['product']))
{
    $limit = 9;
  
    if(isset($_POST['page_number']))
    {
     
        $page_no = $_POST['page_no'];
      
        $start= ($page_no * $limit) - $limit;

    }
    else{
        $start = 0;
    }
  
       $stmt = $connect->prepare("SELECT * FROM products ORDER BY RAND() LIMIT $start,$limit");
       $stmt->execute();
       $row =$stmt->fetchAll();
       $count = $stmt->rowCount();

    echo '
    
            ';
    if($count > 0)
    {
        foreach($row as $row)
        {
        $productid = $row['product_id'];
        $productcat = $row['product_cat'];
        $productbrand = $row['product_brand'];
        $productname = $row['product_title'];
        $productprice = $row['product_price'];
        $productimage = $row['product_image'];


        echo '
        <div class="col-md-4 float-left mb-4" >

               
        <div class="card " >
                             <div class="card-header bg-gradient-info">
                                    ' . $productname . '
                                </div>
                               
                                <div class="card-body">
                                <img src="layouts/images/' . $productimage . '" alt="Prodact" class="img-thumbnail w-100 h-100">

                                </div>
                               
                                <div class="card-footer ">
                                    <span class="badge badge-light float-left p-2 border"> $' . $productprice . ' </span>';
                                    
                                  if(isset($_SESSION['user']))
                                  {
                              echo    '<a   id="productcart" productid="' . $productid . '" class="productcart btn btn-outline-danger btn-sm pr-2 pl-2 float-right" href="#" role="button">AddToCart</a>';
                                }
                                  echo   '</div>     
                                </div>
                                </div>
                                </div>
                                  ';


    } 
    echo '
   
    
            ';
}

}


//selected  category show ajax 

if(isset($_POST['get_selected_category']))
{
     $catid =  $_POST['cat_id'];
    $stmt = $connect->prepare("SELECT * FROM products WHERE product_cat = ? ORDER BY RAND() LIMIT 0,9");
       $stmt->execute(array( $catid));
       $row =$stmt->fetchAll();
       $count = $stmt->rowCount();

    echo '
    
            ';
    if($count > 0)
    {
        foreach($row as $row)
        {
        $productid = $row['product_id'];
        $productcat = $row['product_cat'];
        $productbrand = $row['product_brand'];
        $productname = $row['product_title'];
        $productprice = $row['product_price'];
        $productimage = $row['product_image'];


        echo '
        <div class="col-md-4 float-left mb-4" >

               
        <div class="card " >
                             <div class="card-header bg-gradient-info">
                                    ' . $productname . '
                                </div>
                               
                                <div class="card-body">
                                <img src="layouts/images/' . $productimage . '" alt="Prodact" class="img-thumbnail w-100 h-100">

                                </div>
                               
                                <div class="card-footer ">
                                    <span class="badge badge-light float-left p-2 border"> $' . $productprice . ' </span>';
                                    
                                    if(isset($_SESSION['user']))
                                    {
                                echo    '<a   id="productcart" productid="' . $productid . '" class="productcart btn btn-outline-danger btn-sm pr-2 pl-2 float-right" href="#" role="button">AddToCart</a>';
                                  }
                                    echo   '</div>     
                                  </div>
                                  </div>
                                  </div>
                                    ';


    } 
    echo '
   
    
            ';
}
else 
{
    echo 'Sorry No Products here ';
}


        }


    //selected  get_selected_brand show ajax 

if(isset($_POST['get_selected_brand']))
{
     $catid =  $_POST['brand_id'];
    $stmt = $connect->prepare("SELECT * FROM products WHERE product_brand = ? ORDER BY RAND() LIMIT 0,9");
       $stmt->execute(array( $catid));
       $row =$stmt->fetchAll();
       $count = $stmt->rowCount();

    echo '
    
            ';
    if($count > 0)
    {
        foreach($row as $row)
        {
        $productid = $row['product_id'];
        $productcat = $row['product_cat'];
        $productbrand = $row['product_brand'];
        $productname = $row['product_title'];
        $productprice = $row['product_price'];
        $productimage = $row['product_image'];


        echo '
        <div class="col-md-4 float-left mb-4" >

               
        <div class="card " >
                             <div class="card-header bg-gradient-info">
                                    ' . $productname . '
                                </div>
                               
                                <div class="card-body">
                                <img src="layouts/images/' . $productimage . '" alt="Prodact" class="img-thumbnail w-100 h-100">

                                </div>
                               
                                <div class="card-footer ">
                                    <span class="badge badge-light float-left p-2 border"> $' . $productprice . ' </span>';
                                    
                                    if(isset($_SESSION['user']))
                                    {
                                echo    '<a   id="productcart" productid="' . $productid . '" class="productcart btn btn-outline-danger btn-sm pr-2 pl-2 float-right" href="#" role="button">AddToCart</a>';
                                  }
                                    echo   '</div>     
                                  </div>
                                  </div>
                                  </div>
                                    ';


    } 
    echo '
   
    
            ';
}
else 
{
    echo 'Sorry No Products here ';
}


        }



           //selected  get_selected_search show ajax 

if(isset($_POST['get_selected_search']))
{
     $product_keywords =  $_POST['product_keywords'];
    $stmt = $connect->prepare("SELECT * FROM products WHERE product_keywords LIKE '%$product_keywords%'  ORDER BY RAND() LIMIT 0,9");
       $stmt->execute();
       $row =$stmt->fetchAll();
       $count = $stmt->rowCount();

    echo '
    
            ';
    if($count > 0)
    {
        foreach($row as $row)
        {
        $productid = $row['product_id'];
        $productcat = $row['product_cat'];
        $productbrand = $row['product_brand'];
        $productname = $row['product_title'];
        $productprice = $row['product_price'];
        $productimage = $row['product_image'];


        echo '
        <div class="col-md-4 float-left mb-4" >

               
        <div class="card " >
                             <div class="card-header bg-gradient-info">
                                    ' . $productname . '
                                </div>
                               
                                <div class="card-body">
                                <img src="layouts/images/' . $productimage . '" alt="Prodact" class="img-thumbnail w-100 h-100">

                                </div>
                               
                                <div class="card-footer ">
                                    <span class="badge badge-light float-left p-2 border"> $' . $productprice . ' </span>';
                                    
                                    if(isset($_SESSION['user']))
                                    {
                                echo    '<a   id="productcart" productid="' . $productid . '" class="productcart btn btn-outline-danger btn-sm pr-2 pl-2 float-right" href="#" role="button">AddToCart</a>';
                                  }
                                    echo   '</div>     
                                  </div>
                                  </div>
                                  </div>
                                    ';


    } 
    echo '
   
    
            ';
}
else 
{
    echo 'Sorry No Products here ';
}


        }

?>