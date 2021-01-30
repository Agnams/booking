<?php
$error = $_GET[error];
switch($error) {
    case"emptyInput":
        $msg = "Aizpildiet visus laukus!";
    break;
    case"invalidUrl":
        $msg = "Ievadiet derīgu URL!";
    break;
    case"fatal":
        $msg = "Kaut kas nogāja greizi!";
    break;
    case"none":
        $msg = "Bilde veiksmīgi pievienota!";
        $done = 1;
    break;

}
if($done == 1){
    echo '<p class="text-success">'.$msg.'</p>';
}elseif(!empty($msg)){
    echo '<p class="text-danger">'.$msg.'</p>';
}
?>
<form action="post/admin.gallery.add.php" method="post">
<div class="form-group">
    <label class="col-form-label col-form-label-lg" for="inputLarge">Kategorija:</label>
    <select name="cat" class="form-control form-control-lg">
      <option selected="">Izvēlieties katogoriju</option>
      <option value="1">Viesu nams</option>
      <option value="2">Brīvdienu māja</option>
      <option value="3">Lapene</option>
      <option value="4">Jūra</option>
      <option value="5">Dārzs</option>
    </select>

    <label class="col-form-label col-form-label-lg" for="inputLarge">Bildes nosaukums:</label>
    <input name="txt" class="form-control form-control-lg" type="text" placeholder="Bilde nosaukums" id="inputLarge">
    <label class="col-form-label col-form-label-lg" for="inputLarge">Bildes URL:</label>
    <input name="url" class="form-control form-control-lg" type="text" placeholder="Bilde no interneta" id="inputLarge">
    <br/>
    <button type="submit" class="btn btn-primary btn-lg btn-block">Pievienot bildi</button>
    </div>
</form>