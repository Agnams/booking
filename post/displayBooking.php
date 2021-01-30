<?php
include "../includes/class.php";
$id = $_POST[id];
    $in = new display();
    $in->displayBooking($id);
?>