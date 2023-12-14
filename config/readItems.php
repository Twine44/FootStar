<?php

//Read items into cards - Store Page
require("connect.php");
$sql = "SELECT shoes.name, shoes.price, shoes.shoesid FROM shoes;";
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