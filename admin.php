
<?php
session_start();

if($_SESSION[loggedin] !== true){
    if($_POST){
        if($_POST[login] === "parole123"){
            $_SESSION[loggedin] = true;
            header("Location: ?page=admin");
        }
    }
    echo '<div class="container tm-pt-5 tm-pb-4">';
    echo '<form method="post">';
    echo '<input type="password" name="login">';
    echo '<input type="submit" value="Ieiet">';
    echo '</form>';
    exit();

}

$sub = $_GET[sub];
switch($sub){

    case "gallery":
        $body="includes/admin.gallery.php";
    break;
    case "logout":
        $_SESSION[loggedin] = false;
        header("Location: ?page=admin");
    break;
    case "menu":
        $body="includes/admin.menu.php";
    break;
    default:
        $body = "includes/admin.guests.php";
    break;

}
?>

<div class="container tm-pt-5 tm-pb-4">

<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" href="?page=admin">Gaidāmie viesi</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?page=admin&sub=gallery">Gallerija</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?page=admin&sub=menu">Pakalpojums</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?page=admin&sub=logout">Beigt darbu</a>
  </li>
</ul>
<br />
<?php
include $body;
?>
</div>
