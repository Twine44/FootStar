<?php
require_once("config/connect.php");
require_once("config/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php
echo file_get_contents('html/head.html');
?>

<body onload="navSlide(); sizeCheck()">
    <!-- Navbar -->
    <?php
    include 'html/header.php';
    ?>

    <div class="container">

        <!-- Item -->
        <div id="item">
            <?php
            readItem();
            ?>
        </div>
    </div>

    <!-- Footer -->
    <?php
    echo file_get_contents('html/footer.html');
    ?>
</body>
</html>