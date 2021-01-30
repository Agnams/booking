<?php
$error = $_GET[error];
switch($error) {
    case"emptyInput":
        $msg = "Aizpildiet visus laukus!";
    break;
    case"number":
        $msg = "Ievadiet derīgu cenu!";
    break;
    case"fatal":
        $msg = "Kaut kas nogāja greizi!";
    break;
    case"none":
        $msg = "Pakalpojums veiksmīgi pievienota!";
        $done = 1;
    break;

}
if($done == 1){
    echo '<p class="text-success">'.$msg.'</p>';
}elseif(!empty($msg)){
    echo '<p class="text-danger">'.$msg.'</p>';
}
?>
<form action="post/admin.menu.add.php" method="post">
<div class="form-group">
    <label class="col-form-label col-form-label-lg" for="inputLarge">Pakalpojums nosaukums:</label>
    <input name="title" class="form-control form-control-lg" type="title" placeholder="Nosaukums" id="inputLarge">
    <label class="col-form-label col-form-label-lg" for="inputLarge">Bildes URL:</label>
    <input name="url" class="form-control form-control-lg" type="text" placeholder="Bilde no interneta" id="inputLarge">
    <label class="col-form-label col-form-label-lg" for="inputLarge">Cena EUR:</label>
    <input name="price" class="form-control form-control-lg" type="number" placeholder="Cena" id="inputLarge">
    <br/>
    <button type="submit" class="btn btn-primary btn-lg btn-block">Pievienot pakalpojumu</button>
    </div>
</form>