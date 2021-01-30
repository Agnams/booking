<?php
include "../includes/class.php";
    if($_SERVER[REQUEST_METHOD] != "POST"){
        header("Location: ../index.php");
        exit();
    }

    $url = $_POST[url];
    $price = $_POST[price];
    $title = $_POST[title];

    if(empty($url) OR empty($price) OR empty($title)){
        header("Location: ../?page=admin&sub=menu&error=emptyInput");
        exit();
    }
    if(is_numeric($price) != 1){
        header("Location: ../?page=admin&sub=menu&error=number");
        exit();
    }

    $object = new DB();
    $insert = $object->Insert("INSERT INTO menu (title, `image`, price) VALUE (?, ?, ?)", ["ssi", $title, $url, $price]);
    if($insert > 0){
        header("Location: ../?page=admin&sub=menu&error=none");
        exit();
    }else{
        header("Location: ../?page=admin&sub=menu&error=fatal");
        exit();
    }

?>