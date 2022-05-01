<?php

$UPLOAD_DIR = 'uploads';

$MAP_COORDINATES = [
  'lat' => '46.896386',
  'lng' => '19.668818',
];

$DB_CONFIG = [
  'host' => "mysql.omega",
  'port' => 3306,
  'username' => "abonyiovi",
  'password' => "abonyiovi",
  'database' => "abonyiovi",
];

$PAGES = [
  
  'fooldal' => [
    'template' => 'fooldal.php',
    'name' => 'Főoldal',
  ],
  'galeria' => [
    'template' => 'galeria.php',
    'name' => 'Galéria',
  ],
  'uzenetek' => [
    'template' => 'uzenetek.php',
    'name' => 'Üzenetek',
  ],
  'kapcsolat' => [
    'template' => 'kapcsolat.php',
    'name' => 'Kapcsolat',
  ],
  'belepes' => [
    'template' => 'belepes.php',
    'name' => 'Belépés',
  ],
  'kilepes' => [
    'template' => 'kilepes.php',
    'name' => 'Kilépés',
  ],
  'regioldal' => [
    'template' => 'regioldal.php',
    'name' => 'Régi oldal',
  ],
];