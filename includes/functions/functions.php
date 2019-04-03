<?php 

// funtions for title page v1.0

function getTitle()
{
    global $title;
    if ($title == '')
    {
        return 'Egypt Store';
    }
    else 
    {
       return  $title;
    }
}


// funtions for redirect page v2.0

function redirectpage($theMes,$url = null, $sec = 3)
{
    if($url === null)
    {
        $url = 'index.php';
    }
    else
    {
        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {
            $url = $_SERVER['HTTP_REFERER'];
        }
        else
        {
            $url = 'index.php';
        }
      
    }

    echo  $theMes  ; 
    echo '<div class="alert alert-info" role="alert"> rediracted after ' . $sec  . ' secands </div>'; 
    header("refresh:$sec;url=$url");
    exit();
}




   



?>