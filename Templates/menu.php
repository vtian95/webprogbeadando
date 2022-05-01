<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Menü">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav mr-auto">

        <?php foreach ($PAGES as $page => $details): ?>
          <?php
            if ($page === 'belepes' && is_logged_in()) continue;
            if ($page === 'kilepes' && !is_logged_in()) continue;
            $active = ($page === $keres) ? 'active' : '';
          ?>
          <li class="nav-item <?php echo $active; ?>">
            <a class="nav-link" href="?oldal=<?php echo $page; ?>">
              <?php echo $details['name'] ?>
            </a>
          </li>
        <?php endforeach; ?>

      </ul>

      <?php if (is_logged_in()): ?>
        <span class="navbar-text">
          Bejelentkezett:
          <?php echo $_SESSION['csaladi_nev'] . ' ' . $_SESSION['uto_nev']; ?>
          (<?php echo $_SESSION['login']; ?>)
        </span>
      <?php endif; ?>

    </div>
  </div>
</nav>
