<?php
include "../includes/class.php";
if($_SERVER[REQUEST_METHOD] != "POST"){
    header("Location: ../?page=contact");
    exit();
}

$name = $_POST[name];
$email = $_POST[email];
$subject = $_POST[subject];
$message = $_POST[message];

if(empty($name)){
    echo '<p class="text-danger">Ievadiet savu vārdu!</p>';
    exit();
}
if(empty($email)){
    echo '<p class="text-danger">Ievadiet savu Epastu!</p>';
    exit();
}
if(empty($subject)){
    echo '<p class="text-danger">Ievadiet tēmu!</p>';
    exit();
}
if(empty($message)){
    echo '<p class="text-danger">Ievadiet ziņu, kuru vēlaties nosūtīt!</p>';
    exit();
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo '<p class="text-danger">Ievadiet derīgu epasta adresi!</p>';
    exit();
}
$contact = new display();
$contact->SendInvoice($email, $name, "", $subject, $message);

echo "done";

?>