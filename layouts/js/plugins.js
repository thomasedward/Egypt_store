$(function (){
   

    'use strict';  // for error in js

/*  start ajax page   */
   cat(); 
   brand();
   product();
   cartinfo();
   showcart()
   cartno();
   page();

function cat()
   {
       
      
     $.ajax({
         url : "action.php",
         method : "POST",
         data : {category:1},
         success: function (data)
         {
             $("#get_categoires").html(data);
         
         }
     })
   };


   function brand()
   {
      
     $.ajax({
         url : "action.php",
         method : "POST",
         data : {brand:1},
         success: function (data)
         {
             $("#get_brands").html(data);
            
         }
     })
   };


   function product()
   {
      
     $.ajax({
         url : "action.php",
         method : "POST",
         data : {product:1},
         success: function (data)
         {
             $("#get_products").html(data);
            
         }
     })
   };

   function cartinfo()
   {
      
     $.ajax({
         url : "cart.php",
         method : "POST",
         data : {cart_info:1},
         success: function (data)
         {
             $("#cartinfo").html(data);
            
         }
     })
   };
   function cartno()
   {
      
     $.ajax({
         url : "cart.php",
         method : "POST",
         data : {cart_no:1},
         success: function (data)
         {
             $("#cartno").html(data);
            
         }
     })
   };
   // pagination

   function page()
   {
      
     $.ajax({
         url : "action.php",
         method : "POST",
         data : {page:1},
         success: function (data)
         {
            
              $("#pageno").html(data);
            
         }
     })
   };

   // get_selected_category or brand
   $('body').delegate(".other","click",function(event){
    //for stop reload
     event.preventDefault();
     //get category id
     
     $.ajax({
        url : "action.php",
        method : "POST",
        data : {product:1,},
        success: function (data)
        {
            $("#get_products").html(data);
        }
    })

  });

 // get_selected_category
    $('body').delegate(".category","click",function(event){
        //for stop reload
         event.preventDefault();
         //get category id
         var catid = $(this).attr('catid');
         $.ajax({
            url : "action.php",
            method : "POST",
            data : {get_selected_category:1,cat_id:catid},
            success: function (data)
            {
                $("#get_products").html(data);
            }
        })
   
      });

      //get_selected_brand

      $('body').delegate(".brand","click",function(event){
        //for stop reload
         event.preventDefault();
         //get category id
         var brandid = $(this).attr('brandid');
         $.ajax({
            url : "action.php",
            method : "POST",
            data : {get_selected_brand:1,brand_id:brandid},
            success: function (data)
            {
                $("#get_products").html(data);
            }
        })
   
      });
   

// fro search 
$('#search-btn').click(function(event){
    event.preventDefault();
    var keyword = $('#search').val();
    
    if(keyword != "")
    {
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {get_selected_search:1,product_keywords:keyword},
            success: function (data)
            {
                $("#get_products").html(data);
            }
        })
    }
});

// fro sign up 
$('#signup').click(function(event){
    //for stop reload
    event.preventDefault();
   
    {
        $.ajax({
            url : "register.php",
            method : "POST",
            data : $("form").serialize(),
            success: function (data)
            {
                $("#signup-msg").html(data);
            }
        })
    }
   
});
// fro sign up 
$('#signin').click(function(event){
    //for stop reload
    event.preventDefault();
   
    {
        $.ajax({
            url : "login.php",
            method : "POST",
            data : $("form").serialize(),
            success: function (data)
            {
                $("#signin-msg").html(data);
                window.location.href="profile.php";
            }
        })
    }
   
});

// fro add  cart
  //get_selected_brand

  $('body').delegate("#productcart ","click",function(event){
    //for stop reload
     event.preventDefault();
     //get category id
     var productid = $(this).attr('productid');
     $.ajax({
        url : "cart.php",
        method : "POST",
        data : {get_selected_cart:1,product_id:productid},
        success: function (data)
        {
            $("#set_cart").html(data);
            cartno();
        }
    })

  });
  
  // show cart
  function showcart()
   {
       
      
     $.ajax({
         url : "cart.php",
         method : "POST",
         data : {cart:1},
         success: function (data)
         {
             $("#get_cart").html(data);
             showcart()
             cartno();
         }
     })
   };

  // show cart
  /*
  $('body').delegate("#getcart ","click",function(event){
      
     
    $.ajax({
        url : "cart.php",
        method : "POST",
        data : {cart:1},
        success: function (data)
        {
            $("#get_cart").html(data);
            cartno();
         
        
        }
    })
  });
*/
  
   // get_qty_cart 
   $('body').delegate(".qty","keyup",function(event){
    //for stop reload
     event.preventDefault();

    var pid=$(this).attr("pid");
    var qty=$("#qty-"+pid).val();
    var price=$("#price-"+pid).val();
    var total=qty * price;
        $('#total-'+pid).val(total);   
    
 

  });

  // save_qty_cart 
  $('body').delegate("#savecart","click",function(event){
    //for stop reload
     event.preventDefault();
   
     var pid=$(this).attr("saveid");
     
     var qty=$("#qty-"+pid).val();
     var price=$("#price-"+pid).val();
     var total=qty * price;

  
 
        $.ajax({
            url : "cart.php",
            method : "POST",
            data : {save_cart_qty:1,pid:pid,qty:qty,total:total},
            success: function (data)
            {
                $("#get_msg").html(data);
                cartinfo();
            
            }
        })
 

  });

   // delet_qty_cart 
   $('body').delegate("#deletecart","click",function(event){
    //for stop reload
     event.preventDefault();
   
     var pid=$(this).attr("deleteid");
     
    
  
 
        $.ajax({
            url : "cart.php",
            method : "POST",
            data : {delete_cart_qty:1,pid:pid},
            success: function (data)
            {
                $("#get_msg").html(data);
                cartinfo();
             
            
            }
        })
 

  });

   // delet_qty_cart 
   $('body').delegate("#page","click",function(event){
    //for stop reload
     event.preventDefault();
     var page=$(this).attr("page");
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {product:1,page_number:1,page_no:page},
            success: function (data)
            {
                $("#get_products").html(data);
             
             
            
            }
        })
 

  });

/*  end ajax page   */







      // for hideing placeholder  in focus 
   $(".form-control").on("focus",function(){
        

    // hiding
    $(this).attr('data-text', $(this).attr('placeholder'));  // save val of placeholder in data-text
    $(this).attr('placeholder','');

    });
    // show again
    $(".form-control").on("blur",function(){
        
       
        $(this).attr('placeholder',$(this).attr('data-text'));  // back val of  data-text to placeholder
    
        });


});
 