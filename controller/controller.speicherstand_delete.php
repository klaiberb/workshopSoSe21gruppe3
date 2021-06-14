<?php
if (isset($_GET["id"])) {

$files = glob("../workshopSoSe21gruppe3lim/speicherstände/workshopSoSe21gruppe3/".$_GET["id"]."/*"); // alle Files im Ordner wählen
foreach($files as $file){
  if(is_file($file)) {
    unlink($file); // alle Files löschen
  }
}    
    
unlink("../workshopSoSe21gruppe3lim/speicherstände/workshopSoSe21gruppe3/".$_GET["id"]);
}
require "controller.speicherstande_overview.php";