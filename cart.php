<?php 

session_start();

include "connect.php";
if(isset($_POST['get_selected_cart']))
{
     $product_id =  $_POST['product_id'];
     $user_id    =  $_SESSION['id'];

     
     // check if the product Exist in databse  
     $cartpro = $connect->prepare("SELECT  
                                    * 
                                FROM 
                                cart
                                WHERE 
                                p_id = ? AND user_id = ?
                                LIMIT 1"
                                );
$cartpro->execute(array($product_id ,$user_id ));
$rowcartpro  = $cartpro->fetch();

$countcartpro = $cartpro->rowCount(); // reatult of request 
// check if request done or no 
if ($countcartpro > 0) {?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?php echo $rowcartpro['product_title']; ?></strong> This product already in cart shoping .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

 <?PHP }
 else{
  
     // check if the user Exist in databse  
     $products = $connect->prepare("SELECT  
                                    * 
                                FROM 
                                products
                                WHERE 
                                product_id = ? 
                                LIMIT 1"
                                );
$products->execute(array($product_id ));
$rowproduct  = $products->fetch();

$countproduct = $products->rowCount(); // reatult of request 
// check if request done or no 
if ($countproduct > 0) {

     // check if the user Exist in databse  
     $addcart = $connect->prepare("
                        INSERT INTO  
                        cart (  p_id ,  ip_address ,  user_id ,  product_title ,  product_image ,qty ,  price ,total_amount )
                        VALUES (:zpid ,0 , :Zuserid,:ztitle ,:zimage , 1,:zprice,:ztotal )
                                                    ");
$addcart->execute(array(
    "zpid"             =>  $rowproduct['product_id'],
    "Zuserid"              =>  $user_id,
    "ztitle"             =>  $rowproduct['product_title'],
    "zimage"              =>  $rowproduct['product_image'],
    "zprice"            =>  $rowproduct['product_price'],
    "ztotal"            =>  $rowproduct['product_price']
));


$countadd = $addcart->rowCount(); // reatult of request 
if( $countadd > 0)
{?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><?php echo $rowproduct['product_title']; ?></strong> This product added cart shoping .
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php }

 }

}
}

if(isset($_POST['cart']))
{
     
     $user_id  =  $_SESSION['id'];

     
     // check if the product Exist in databse  
     $cartpro = $connect->prepare("SELECT  
                                    * 
                                FROM 
                                cart
                                WHERE 
                                 user_id = ?
                               "
                                );
$cartpro->execute(array($user_id ));
$rowcartpro  = $cartpro->fetchAll();

$countcartpro = $cartpro->rowCount(); // reatult of request 
// check if request done or no 
if ($countcartpro > 0) {
    $i = 1;
    ?>

     <table class="table table-borderless text-center" >
              <thead class="bg-info">
                <tr>
                  <th scope="col">Action</th>
                  <th scope="col">Product Image</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
            
              
            


<?php 
  
                 
                 
               $total_amt = 1;
  foreach($rowcartpro as $row )
 {
  
     echo '  <tr> ';
  echo   '<td>' . $i++ .  '</td>';
    echo  '<td> 
        <img src="layouts/images/' . $row['product_image'] . '" alt="Prodact" class="img-thumbnail"style="width:40px;height:40px;" >
    </td>';
  echo   '<td>' .  $row['product_title'] . '</td>';
  echo   '<td>' .  $row['qty'] . '</td>';
  echo   '<td>' .  $row['price'] . '</td>';
 echo   ' <td>' . $row['total_amount'] . '</td>';
 echo '  </tr> ';
  }
 

echo '
</tbody>
</table>

';

 }
}


if(isset($_POST['cart_info']))
{
     
     $user_id  =  $_SESSION['id'];

     
     // check if the product Exist in databse  
     $cartpro = $connect->prepare("SELECT  
                                    * 
                                FROM 
                                cart
                                WHERE 
                                user_id = ?
                               "
                                );
$cartpro->execute(array($user_id ));
$rowcartpro  = $cartpro->fetchAll();

$countcartpro = $cartpro->rowCount(); // reatult of request 
// check if request done or no 
if ($countcartpro > 0) {
    $i = 1;
    ?>

     <table class="table table-borderless text-center" >
              <thead class="bg-info">
              <tr class="table-danger">
                                        <th scope="col">#</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Product Price</th>
                                        <th scope="col">Price in $</th>
               </tr>
              </thead>
              <tbody>
            
              
            


<?php 
  
                 
             $total_amt = 0;    
               
  foreach($rowcartpro as $row )
 {

  $price_array = array($row['total_amount']);
  $total_sum = array_sum($price_array);
  $total_amt = $total_amt + $total_sum;

 echo   '<tr>
  <th >' . $i++ . '</th>
  <th >
      
  <div class="btn-group" >
      <button id="savecart" saveid="' . $row['p_id'] . '" type="button" class="btn btn-info" cid="' . $row['cid'] . '" >Save</button>
      <button id="deletecart" deleteid="' . $row['p_id'] . '"  type="button" class="btn btn-danger" cid="' . $row['cid'] . '">Delete</button>
  </div>

  </th>
  <td>
 <img src="layouts/images/' . $row['product_image'] . '" alt="Prodact" class="img-thumbnail"style="width:70px;height:40px;" >
</td>
  <td>' . $row['product_title'] . '</td>
  <td>
  <form>
      <div class="form-group" style="width:90px;">
      <input type="text"  value="' . $row['qty'] . '" class="form-control qty" pid="' . $row['p_id'] . '"  id="qty-' . $row['p_id'] . '" placeholder=" ">
      </div>

  </form>                                        </td>
  <td>
  <form>
  <fieldset disabled>
      <div class="form-group" style="width:90px;">
      <input type="text"  value="' . $row['price'] . '" class="form-control price" pid="' . $row['p_id'] . '" id="price-' . $row['p_id'] . '" >
      </div>
  </fieldset>
  </form>                                        </td>
  <td>
 
  <fieldset disabled>
      <div class="form-group" style="width:90px;">
      <input type="text"  value="' . $row['total_amount'] . '"  class="form-control total" pid="' . $row['p_id'] . '" id="total-' . $row['p_id'] . '" >
      </div>
  </fieldset>
  
  </td>
  </tr>';
  }
 

echo '
</tbody>
</table>
<div class="float-right mr-4">$' . $total_amt . '</div>
';

 }
}

if(isset($_POST['save_cart_qty']))
{
     
     $user_id  =  $_SESSION['id'];
     $pid  =  $_POST['pid'];
     $qty  =  $_POST['qty'];
     $total  =  $_POST['total'] ;
    
        // check if the product Exist in databse  
        $cartpro = $connect->prepare("
        UPDATE  
        cart  
        SET 
        qty =?, total_amount =? 
        WHERE p_id=?
   "
    );
$cartpro->execute(array($qty,$total,$pid));


$countcartpro = $cartpro->rowCount(); // reatult of request 
// check if request done or no 
if ($countcartpro > 0) {?>

  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong></strong> This product Updated .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }
else{?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong></strong> This product Not Updated .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }
      
  
}

if(isset($_POST['delete_cart_qty']))
{
     
   
     $pid  =  $_POST['pid'];
    
    
        // check if the product Exist in databse  
        $cartpro = $connect->prepare("
        DELETE FROM cart WHERE p_id=?
   "
    );
$cartpro->execute(array($pid));


$countcartpro = $cartpro->rowCount(); // reatult of request 
// check if request done or no 
if ($countcartpro > 0) {?>

  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong></strong> This product Delete .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }
else{?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong></strong> This product Not Delete .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }
      
  
}


if(isset($_POST['cart_no']))
{
     
     $user_id  =  $_SESSION['id'];
  
    
        // check if the product Exist in databse  
        $cartpro = $connect->prepare(" SELECT * FROM cart WHERE user_id = ? 
   "
    );
$cartpro->execute(array($user_id));


$count = $cartpro->rowCount(); // reatult of request 
// check if request done or no 
if ($count > 0) {
echo $count;
}
else
{
  echo 0;
}

  
}

?>