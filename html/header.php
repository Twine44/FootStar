<?php

//Request the current url for the selected menu in the navnar
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";   
else  
  $url = "http://";

//Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   

//Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];    
?>
<header>
    <div class="nav">
        <a href="index.php" id="logo"><img src="images/logo.png" alt=""></a>
        <ul class="nav-links">
            <li><a href="index.php" <?php 
            echo ($url=="http://localhost/footstar/index.php") ? 'id="yellow"' :  ""; ?>
             >Home</a></li>
            <li><a href="store.php" <?php  

            //Remove the itemID from the url to check if the User is on the Item site
            $lastPPosition = mb_strrpos($url, 'p');
            if ($lastPPosition !== false) {
                $cutString = mb_substr($url, 0, $lastPPosition + 1);
            }
            echo ($url=="http://localhost/footstar/store.php" || $cutString=="http://localhost/footstar/item.php") ? 'id="yellow"' :  ""; ?>
            >Store</a></li>
            <li><a href="about.php" <?php echo ($url=="http://localhost/footstar/about.php") ? 'id="yellow"' :  ""; ?>
            >About</a></li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </div>
</header>