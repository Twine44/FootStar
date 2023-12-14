<?php

//Catch AJAX queries
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'readItems': //for the filter - Store Page
            if(!isset($_POST['categoryId'])){
                echo "nincs is kateg";
            }
            readItems($_POST['brandId'], $_POST['priceId'], $_POST['genderId'], $_POST['sizes'], $_POST['categoryId']);
            break;
    }
}

//Read a single item and print all it's data - Item Page
function readItem()
{

    require("connect.php");
    $id = $_GET['id'];
    $sqlData = "SELECT shoes.name as sname, shoes.price, shoes.gender, brand.name as bname FROM shoes, categories, 
    brand WHERE shoes.shoesid=$id AND shoes.brandid=brand.brandid AND categories.shoesid=$id;";

    //Read all data
    $resultData = $connect->query($sqlData);
    $rowData = $resultData->fetch_assoc();

    //Read all images
    $sqlImages =  "SELECT image.imgnum FROM image WHERE image.shoesid=$id;";
    $resultImages = $connect->query($sqlImages);

    //Read all size
    $sqlSize =  "SELECT size FROM sizes WHERE shoeid=$id;";
    $resultSize = $connect->query($sqlSize);

    //Set gender
    $gender;
    if ($rowData['gender'] == 1) {
        $gender = "Men's";
    } else if ($rowData['gender'] == 2) {
        $gender = "Women's";
    } else {
        $gender = "Unisex";
    }

    //Show all the images
    echo '<div id="item-images">';
    while ($rowImages = $resultImages->fetch_array()) {
        echo '<div class="wrapper"><img src="images/' . $rowData['sname'] . '_' . $id . '.' . $rowImages[0] . '.jpg" alt="Image" class="card-img-top" alt="..."></div>';
    }
    echo '</div>';

    //Show all the information
    echo '<div id="item-content">';
    echo '<h2>' . $rowData['sname'] . '</h2>';
    echo '<h3>$'.$rowData['price'].'</h3>';
    echo $gender . ' shoes';

    //Store sizes in array
    $sizeArray = [];
    $i = 0;
    while ($rowSize = $resultSize->fetch_array()) {
        $sizeArray[$i] = $rowSize[0];
        $i++;
    }

    //Check the stock
    $stock;
    if (sizeof($sizeArray) < 1) {
        echo '<p>This item is currently <b>out of stock</b>. Please check later.</p>';
        $stock = false;
    } else {
        echo '<p>Size:</p>';
        $stock = true;
    }

    //Sort the new array with BubbleSort and Show the sizes
    if ($stock) {
        $sortedArray = [];
        $sortedArray = bubbleSort($sizeArray);
        for ($i = 0; $i < sizeof($sortedArray); $i++) {
            echo '<button type="button" class="btn btn-light mr-1 sizebtns">' . $sortedArray[$i] . '</button>';
        }
        echo ' <div class="buttons">
        <a href="store.php" class="bttn">Add to cart</a>
        </div>';
    }

    echo '</div>';
}

//Read all the items by checking filters - Store Page
function readItems($brandId, $priceId, $genderId, $sizes, $categoryId)
{

    require("connect.php");
    $sql = "SELECT shoes.name, shoes.price, shoes.shoesid
    FROM shoes
    LEFT JOIN sizes ON sizes.shoeid = shoes.shoesid
    INNER JOIN categories ON categories.shoesid = shoes.shoesid WHERE TRUE";
    
    //Create sql with filters if any of them are applied
    if($brandId!=null){
        $sql.=" AND shoes.brandid=$brandId";
    }
    if($genderId!=null){
        if($genderId==0){
            $sql.=" AND gender IS NULL";
        }
        else if($genderId==1 || $genderId==2){
            $sql.=" AND (gender=$genderId OR gender IS NULL)";
        }
    }
    if($categoryId!=null){
        $sql.=" AND categories.categid=$categoryId";
    }
    if($sizes!=null){
        $sql.=" AND (";
        for ($i=0; $i < count($sizes); $i++) { 
            $sql.="sizes.size=$sizes[$i]";
            ($i+1!=count($sizes)) ? $sql.=" OR " : true;
        }
        $sql.=")";
    }
     $sql.=" GROUP BY shoesid";
    if($priceId!=null){
        ($priceId==0) ? $sql.= " ORDER BY shoes.price;" : $sql.= " ORDER BY shoes.price DESC;";
    }

    $result = $connect->query($sql);
    while ($row = $result->fetch_array()) {
        $br= strlen($row[0]) < 22 ? "<br>" : "";
        echo '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
        <div class="card w-100 box-shadow">
            <div class="inner">
                <img src="images/' . $row[0] . '_' . $row[2] . '.1.jpg" alt="Image" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">' . $row[0] . '</h5>'.$br.'
                <p><b>Price</b>: $' . $row[1] . '</p>
                <a href="item.php?id=' . $row[2] . '" class="btn btn-dark">Purchase</a>
            </div> 
        </div>
    </div>';
    }
}

//Read brands - Store Page
function readBrands()
{
    require("connect.php");
    $sql = "SELECT brand.brandid, brand.name FROM brand;";
    $result = $connect->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
    }
}

//Read categoryId - Store Page
function readCategories(){
    require("connect.php");
    $sql = "SELECT categid, name FROM category;";
    $result = $connect->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
    }
}

//Bubble sort
function bubbleSort($array)
{
    $length = sizeof($array);
    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length - $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    return $array;
}
