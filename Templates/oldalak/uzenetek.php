<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th>#</th>
      <th>Név</th>
      <th>Üzenet</th>
      <th>Dátum</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach(get_messages() as $message): ?>
    <tr>
      <th><?php echo $message['id']; ?></th>
      <td><?php echo $message['uzenet']; ?></td>
      <td><?php echo $message['nev']; ?></td>
      <td><?php echo $message['datum']; ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>