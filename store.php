<?php
require_once("config/connect.php");
require_once("config/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php
echo file_get_contents('html/head.html');
?>

<body onload="navSlide(); filterOpen();">

    <!-- Navbar -->
    <?php
     include 'html/header.php';
    ?>

    <h1 class="shoestitle">Shoes</h1>

    <!-- Filter -->
    <div id="filter">
        <img src="images/filter.png" alt="" id="filter-icon">
        <div id="filter-options">
            <label for="brand">Brand</label><select name="brand" id="brand">
                <option value="" selected>All</option>
                <?php
                    readBrands();
                ?>
            </select>
            <label for="category">Category</label><select name="category" id="category">
                <option value="" selected>All</option>
                <?php
                    readCategories();
                ?>
            </select>
           <label for="price">Price</label><select name="price" id="price">
                <option value="" selected>All</option>
                <option value="0">Ascending</option>
                <option value="1">Descending</option>
            </select>
           <label for="gender">Gender</label><select name="gender" id="gender">
                <option value="" selected>All</option>
                <option value="1">Men</option>
                <option value="2">Women</option>
                <option value="0">Unisex</option>
            </select>
            <label for="sizes">Size</label>
            <div class="container" id="button-container">
                <button type="button" class="btn btn-light sizebtns" value="35">35</button>
                <button type="button" class="btn btn-light sizebtns" value="36">36</button>
                <button type="button" class="btn btn-light sizebtns" value="37">37</button>   
                <button type="button" class="btn btn-light sizebtns" value="38">38</button>
                <button type="button" class="btn btn-light sizebtns" value="39">39</button>
                <button type="button" class="btn btn-light sizebtns" value="40">40</button>
                <button type="button" class="btn btn-light sizebtns" value="41">41</button>
                <button type="button" class="btn btn-light sizebtns" value="42">42</button>
                <button type="button" class="btn btn-light sizebtns" value="43">43</button>
                <button type="button" class="btn btn-light sizebtns" value="44">44</button>
                <button type="button" class="btn btn-light sizebtns" value="45">45</button>
                <button type="button" class="btn btn-light sizebtns" value="46">46</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center shopitems">
            <!-- Items -->
        </div>
    </div>

    <!-- Footer -->
    <?php
    echo file_get_contents('html/footer.html');
    ?>
</body>
</html>