<?php
Core::checkAccessLevel(1);
Core::$title="Neu: DokumentartT";
Core::setView("DokumentartT_new", "view1", "new");
Core::setViewScheme("view1", "new", "DokumentartT");
$DokumentartT=new DokumentartT();
DokumentartT::$activeViewport="new";
$DokumentartT_list = DokumentartT::findAll();
Core::publish($DokumentartT_list, "DokumentartT_list");
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $DokumentartT->loadFormData();
if($a===true){
if($DokumentartT->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$DokumentartT_field =DokumentartT::$dataScheme[$filekey];
switch ($DokumentartT_field["type"]){
case "picture":
$DokumentartT->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=DokumentartT::$dataScheme[$DokumentartT_field["sysParent"]];
$filetype=$parentField["type"];
switch($filetype){
case "pictureT":
$ordner="images/";
break;
case "fileT":
$ordner="files/";
break;
default:
$ordner="files/";
}
$pfad = $DokumentartT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$DokumentartT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
$DokumentartT=new DokumentartT();
Core::$view->path["view1"]="views/view.DokumentartT_new.php";
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($DokumentartT, "DokumentartT");
