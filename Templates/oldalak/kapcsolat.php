<?php
$max_character_count = 250;

if ($_POST) {
  $message = $_POST['uzenet'];
  if ((strlen($message) <= $max_character_count)) {
    send_message($message);
    redirect('uzenetek');
  }
}
?>

<div class="card">
  <div class="card-header">
    Üzenet küldése
  </div>
  <div class="card-body">
    <form action="?oldal=kapcsolat" method="post">
      <div class="form-group">
        <label for="uzenet">
          Üzenet szövege (<span id="karakterek">0</span> / <?php echo $max_character_count; ?> karakter)
        </label>
        <textarea class="form-control" id="uzenet" name="uzenet" rows="10"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Küldés</button>
    </form>
  </div>
</div>

<script>
    $(() => {
        $("#uzenet").on('keyup', function(){
            let character_count = $(this).val().length;
            $("#karakterek").text(character_count);
            if (character_count > <?php echo $max_character_count; ?>) {
                $('form button[type="submit"]').prop('disabled', true);
            } else {
                $('form button[type="submit"]').prop('disabled', false);
            }
        });
    });
</script>
