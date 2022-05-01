<?php

if ($_FILES) {
  if (isset($_FILES['kep'])) {
    upload_file($_FILES['kep']);
    redirect('galeria');
  }
}

$image_list = get_uploaded_filenames();
$image_num = count($image_list);

//dump($image_list);
//dd($image_num);

?>

<?php if (is_logged_in()): ?>
  <div class="mb-5">
    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#feltoltes" aria-expanded="false" aria-controls="feltoltes">
      Kép feltöltése
    </button>
    <div class="collapse mt-3" id="feltoltes">
      <div class="card">
        <div class="card-body">
          <form action="?oldal=galeria" method="post" enctype="multipart/form-data">
            <input type="file" id="kep" name="kep">
            <button type="submit" class="btn btn-primary">Feltöltés</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if (!empty($image_list)): ?>
  <div id="galeria" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php for ($slide = 0; $slide < $image_num; $slide++): ?>
        <?php $active = ($slide === 0) ? 'active' : ''; ?>
        <li data-target="#galeria" data-slide-to="<?php echo $slide; ?>" class="<?php echo $active; ?>"></li>
      <?php endfor; ?>
    </ol>
    <div class="carousel-inner">
      <?php foreach ($image_list as $index => $image): ?>
        <?php $active = (array_key_first($image_list) === $index) ? 'active' : ''; ?>
        <div class="carousel-item <?php echo $active; ?>">
          <img class="d-block w-100" src="<?php echo $UPLOAD_DIR . '/' . $image; ?>">
        </div>
      <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#galeria" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Előző</span>
    </a>
    <a class="carousel-control-next" href="#galeria" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Következő</span>
    </a>
  </div>
<?php else: ?>
  <div class="jumbotron">
    <h4 class="display-4">A galéria jelenleg üres.</h4>
  </div>
<?php endif; ?>
