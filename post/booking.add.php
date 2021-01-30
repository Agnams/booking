<?php
include_once "../includes/class.php";

if($_SERVER[REQUEST_METHOD] != "POST"){
    header("Location: ../?page=booking");
    exit();
}

if($_POST[accepted] == true){
    $acceptedId = $_POST[acceptedId];
    $delete = new DB();
    $delete->Update("UPDATE reserve SET accepted = '1' WHERE id = ?", ["i", $acceptedId]);
    $in = new display();
    $in->invoice($acceptedId);
    include "../includes/invoice.php";

    $topic = "Rēķins par viesu māju";
    $message = "Labdien, ".$in->name."! <br/>";
    $message.= "Mēs saņēmām pieteikumu no Jums ar vēlmi iznomāt viesu namu no ".date('d/m/Y', $in->checkIn)." līdz ".
    date('d/m/Y', $in->checkOut)."<br/>";
    $message.= "Ja viss apmierina, tad lūgsim Jums samaksāt rēķinu, pēc kura aptiprināšanas ar Jums sazināsimies!<br/>";
    $message.= "Ar cieņu, KOSIŠI! <br/> http://www.agrisnamsons.id.lv/booking/";
    $ins = new display();
    $ins->SendInvoice($in->email, "", $in->id, $topic, $message);

    echo $acceptedId;
    exit();
}

if($_POST[delete] == true){
    $deleteId = $_POST[reserveId];
    $delete = new DB();
    $delete->Delete("DELETE FROM reserve WHERE id = ?", ["i", $deleteId]);
    exit();
}


$name = $_POST[name];
$checkIn = $_POST[checkIn];
$checkOut = $_POST[checkOut];
$adult = $_POST[adult];
$children = $_POST[children];
$kidsBed = $_POST[kidsBed];
$number = $_POST[number];
$email = $_POST[email];
$price = $_POST[price];
$totalBooking = $_POST[totalBooking];

    if(empty($name)){
        echo "Lūdzu ievadiet savu vārdu un uzvārdu!";
        exit();
    }
    if(empty($checkIn)){
        echo "Lūdzu ievadiet datumu, kad vēlaties ierasties!";
        exit();
    }
    if(empty($checkOut)){
        echo "Lūdzu ievadiet datumu, kad vēlaties doties prom!";
        exit();
    }
    if(empty($adult) || $adult < 1){
        echo "Lūdzu norādiet, cik pieaugušo apmeklēs viesu māju!";
        exit();
    }
    if(is_numeric($number) < 1){
        echo "Lūdzu ievadiet derīgu telefona numuru!";
        exit();
    }
    if(empty($number)){
        echo "Lūdzu ievadiet savu telefona numuru!";
        exit();
    }
    if(empty($email)){
        echo "Lūdzu ievadiet savu Epasta adresi, kura ir derīga!";
        exit();
    }
    if(empty($totalBooking)){
        echo "Lūdzu izvēlieties, kādu pakalpojumu Jūs vēlaties!";
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Lūdzu ievadiet derīgu Epasta adresi, jo tur tiks nosūtīts rēķins un informācija!";
        exit();
    }
    $checkInTime = strtotime($checkIn);
    $checkOutTime = strtotime($checkOut);

    if($checkOutTime <= $checkInTime){
        echo "Lūdzu izvēlieties reālus datumus!";
        exit();
    }
    if($checkInTime < time()){
        echo "Lūdzu izvēlieties uz priekšu ejošu datumu!";
        exit();
    }
    $check = new DB();
    $exists = $check->CheckSelect($checkInTime, $checkOutTime);
    if(!empty($exists)){
        echo "Atvainojiet, bet viesu māja ".$exists." jau ir rezervēta!";
        exit();
    }
    
    $days = ($checkOutTime - $checkInTime) / 60 / 60 / 24;
    $totalPrice = $price * $days;
    $ip = $_SERVER['REMOTE_ADDR'];
    $ins = new DB();
    $done = $ins->Insert("INSERT INTO reserve 
    (`name`, `checkIn`, `checkOut`, `days`, `adult`, `children`, `kidsBed`, `number`, `email`, `price`, `totalPrice`, `totalBooking`, `accepted`, `ip`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", 
    ["siiiiiiisiisis", 
    $name, $checkInTime, $checkOutTime, $days, $adult, $children, $kidsBed, $number, $email, $price, $totalPrice, $totalBooking, 0, $ip]);
    
    if($done > 0){
        echo $done;
    }else{
        echo $done;
    }
?>