<?php
include("includes/settings.php");
include("includes/utils.php");

$keres = isset($_GET['oldal']) ? $_GET['oldal'] : 'fooldal';
$oldal = isset($PAGES[$keres]) ? $PAGES[$keres] : $PAGES['fooldal'];

init();

include("Templates/vaz.php");

destroy();