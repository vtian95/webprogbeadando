<?php $messages = get_flash_messages(); ?>
<?php foreach ($messages as $message): ?>
  <div class="alert alert-<?php echo $message['style']; ?> alert-dismissible fade show" role="alert">
    <?php echo $message['message']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endforeach; ?>
