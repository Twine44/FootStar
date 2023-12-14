<!DOCTYPE html>
<html lang="en">
<?php
require_once("config/connect.php");
require_once("config/functions.php");
echo file_get_contents('html/head.html');
?>

<body onload="navSlide(); filterOpen()">
    <?php
    //Navbar
    include 'html/header.php';
    ?>
    <div class="container" id="about-container">
        <div id="about-title">
            <h1 id="yellow">About</h1>
            <h1 id="about-bottom-title">u<span id="color-black">s</span></h1>
        </div>
        <div id="about-card">
            <div id="about-text">
                <h1>FootStar<sup id="star">★</sup></h1>
                <p>Welcome to FootStar, where sneaker passion meets exceptional style. Established in 2023, we're more than just a sneaker shop – we're a community of enthusiasts dedicated to providing an unparalleled experience.</p>
                <p>Our Story: Born from a shared love for sneakers, FootStar started as a local hub and has since evolved into a global online destination. Our journey is defined by a commitment to authenticity, quality, and a diverse selection that caters to every sneaker lover.</p>
            </div>
            <div id="img-wrapper">
                <img src="images/aboutus_bg.jpg">
            </div>
        </div>
    </div>
    <?php
    //Footer
    echo file_get_contents('html/footer.html');
    ?>

</body>
</html>