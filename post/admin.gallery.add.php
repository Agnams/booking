<?php
include "../includes/class.php";
    if($_SERVER[REQUEST_METHOD] != "POST"){
        header("Location: ../index.php");
        exit();
    }

    $url = $_POST[url];
    $cat = $_POST[cat];
    $txt = $_POST[txt];

    if(empty($url) OR $cat < 1){
        header("Location: ../?page=admin&sub=gallery&error=emptyInput");
        exit();
    }

    if(!filter_var($url, FILTER_VALIDATE_URL)){
        header("Location: ../?page=admin&sub=gallery&error=invalidUrl");
        exit();
    }
    $object = new DB();
    $insert = $object->Insert("INSERT INTO gallery (category, `url`, txt) VALUE (?, ?, ?)", ["iss", $cat, $url, $txt]);
    if($insert > 0){
        header("Location: ../?page=admin&sub=gallery&error=none");
        exit();
    }else{
        header("Location: ../?page=admin&sub=gallery&error=fatal");
        exit();
    }

?>