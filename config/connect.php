<?php
$connect =  mysqli_connect("localhost","root","","footstar");

if($connect -> errno)
{
    echo "Hiba az adatbázishoz való kapcsolódás során.";
}
if(!$connect -> set_charset("utf8"))
{
    echo "Hiba a karakterkódolás során.";
}