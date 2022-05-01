<?php

$db_connection = null;

function init() {
  ob_start();
  session_start();
  db_connect();
}

function destroy() {
  db_close();
}

function db_connect() {
  global $db_connection, $DB_CONFIG;
  if ($db_connection) {
    return;
  }
  try {
    $db_connection = new PDO(
      "mysql:host={$DB_CONFIG['host']}:{$DB_CONFIG['port']};dbname={$DB_CONFIG['database']}",
      $DB_CONFIG['username'],
      $DB_CONFIG['password'],
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
  } catch (PDOException $e) {
    echo "Hiba: " . $e->getMessage();
  }
}

function db_close() {
  global $db_connection;
  $db_connection = null;
}

function redirect($page) {
  header("Location: ?oldal={$page}");
}

function login($login, $jelszo) {
  global $db_connection;
  $jelszo = sha1($jelszo);
  $query = "SELECT `id`, `csaladi_nev`, `uto_nev` FROM `felhasznalok` WHERE `login` = '{$login}' AND `jelszo` = '{$jelszo}' LIMIT 1";
  $statement = $db_connection->query($query);
  $result = $statement->fetch();
  if ($result) {
    session_regenerate_id(true);

    $_SESSION['id'] = $result['id'];
    $_SESSION['csaladi_nev'] = $result['csaladi_nev'];
    $_SESSION['uto_nev'] = $result['uto_nev'];
    $_SESSION['login'] = $login;

    flash_message("Sikeres bejelentkezés.");
  } else {
    flash_message("Sikertelen bejelentkezés. Próbálja újra!", "danger");
  }
}

function logout() {
  session_destroy();
}

function is_logged_in() {
  return isset($_SESSION['id']);
}

function register($csaladi_nev, $uto_nev, $login, $jelszo) {
  global $db_connection;
  $jelszo = sha1($jelszo);
  $query = "INSERT INTO `felhasznalok` (`csaladi_nev`,`uto_nev`,`login`,`jelszo`) VALUES ('{$csaladi_nev}', '{$uto_nev}', '{$login}', '{$jelszo}')";
  $db_connection->query($query);
  flash_message("Sikeres regisztráció.");
}

function send_message($message) {
  global $db_connection;

  if (is_logged_in()) {
    $name = $_SESSION['csaladi_nev'] . ' ' . $_SESSION['uto_nev'];
  } else {
    $name = "Vendég";
  }

  $query = "INSERT INTO `uzenetek` (`uzenet`,`nev`) VALUES ('{$message}', '{$name}')";
  $db_connection->query($query);
  flash_message("Üzenetét sikeresen elküldte.");
}

function get_messages() {
  global $db_connection;
  $query = "SELECT * FROM `uzenetek` ORDER BY `datum` DESC";
  $statement = $db_connection->query($query);
  $result = $statement->fetchAll();
  if ($result) {
    return $result;
  }
  return [];
}

function flash_message($message, $style = 'success') {
  if ($message) {
    $_SESSION['flash_messages'][] = [
      'message' => $message,
      'style' => $style,
    ];
  }
}

function get_flash_messages() {
  if (isset($_SESSION['flash_messages'])) {
    $flash_messages = $_SESSION['flash_messages'];
    unset($_SESSION['flash_messages']);
    return $flash_messages;
  }
  return [];
}

function upload_file($file) {
  global $UPLOAD_DIR;
  if (!file_exists($UPLOAD_DIR)) {
    mkdir($UPLOAD_DIR);
  }
  $upload_dir = $UPLOAD_DIR . '/';
  $file_name = $file["name"];
  $file_path = $upload_dir . basename($file_name);
  $result = move_uploaded_file($file["tmp_name"], $file_path);
  if ($result) {
    flash_message("A(z) {$file_name} feltöltése sikerült.");
  } else {
    flash_message("A(z) {$file_name} feltöltése sikertelen. Próbálja újra!", 'danger');
  }
}

function get_uploaded_filenames() {
  global $UPLOAD_DIR;
  if (!file_exists($UPLOAD_DIR)) {
    return [];
  }
  return array_diff(scandir($UPLOAD_DIR), ['..', '.']);
}

function dump($data) {
  echo "<pre>";
  var_dump($data);
  echo "</pre>";
}

function dd($data) {
  dump($data);
  die;
}
