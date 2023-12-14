<!DOCTYPE html>
<html lang="en">
<?php
echo file_get_contents('html/head.html');
?>

<body onload="navSlide()">
    <?php
    //Navbar
    include 'html/header.php';
    //Banner and Information
    echo file_get_contents('html/banner.html');
    //Footer
    echo file_get_contents('html/footer.html');
    ?>
</body>
</html>