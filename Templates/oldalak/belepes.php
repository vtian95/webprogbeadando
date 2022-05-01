<?php
if ($_POST) {
  //dd($_POST);
  $action = $_POST['action'];
  if ($action === "belepes") {
    login($_POST['login'], $_POST['jelszo']);
	   redirect('fooldal');
  } elseif ($action === "regisztracio") {
    register($_POST['csaladi_nev'], $_POST['utonev'], $_POST['login'], $_POST['jelszo']);
	   redirect('belepes');
  }
  else{
	  redirect('fooldal');
  }

}
?>

<div class="row">
  <div class="col-md-6 p-4">
    <div class="card">
      <div class="card-header">
        Belépés
      </div>
      <div class="card-body">
        <form action="?oldal=belepes" method="post">
          <div class="form-group">
            <label for="login">Felhasználónév</label>
            <input type="text" class="form-control" name="login" id="login" placeholder="Felhasználónév">
          </div>
          <div class="form-group">
            <label for="jelszo">Jelszó</label>
            <input type="password" class="form-control" name="jelszo"  id="jelszo" placeholder="Password">
          </div>
          <input type="hidden" name="action" value="belepes">
          <button type="submit" class="btn btn-primary">Belépek</button>
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-6 p-4 border-left" id="regisztracio">
    <div class="card">
      <div class="card-header">
        Regisztráció
      </div>
      <div class="card-body">
        <form action="?oldal=belepes" method="post">
          <div class="form-group">
            <label for="csaladi_nev">Családi név</label>
            <input type="text" class="form-control" name="csaladi_nev" id="csaladi_nev" placeholder="Családi név">
          </div>
          <div class="form-group">
            <label for="utonev">Utónév</label>
            <input type="text" class="form-control" name="utonev" id="utonev" placeholder="Utónév">
          </div>
          <div class="form-group">
            <label for="login">Felhasználónév</label>
            <input type="text" class="form-control" name="login" id="login" placeholder="Felhasználónév">
          </div>
          <div class="form-group">
            <label for="jelszo">Jelszó</label>
            <input type="password" class="form-control" name="jelszo"  id="jelszo" placeholder="Password">
          </div>
          <input type="hidden" name="action" value="regisztracio">
          <button type="submit" class="btn btn-secondary">Regisztrálok</button>
        </form>
      </div>
    </div>
  </div>
</div>
