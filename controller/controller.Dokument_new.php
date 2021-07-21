<?php

$taskType = "new";
$classSettings =Arzt::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Neu: Dokument";
Core::setView("Dokument_new", "view1", "new");
Core::setViewScheme("view1", "new", "Dokument");

if(isset($_GET["chain"])){
    $referrer = $_GET["chain"];
Core::publish($referrer, "referrer");
}
if(isset($_GET["autocomplete"])){
    $autocomplete = 1;
Core::publish($autocomplete, "autocomplete");
}

$Dokument=new Dokument();
Dokument::$activeViewport="new";
Dokument::renderScript("new","form_Dokument");

if(count($_POST)>0){
$a= $Dokument->loadFormData();
if($a===true){
if($Dokument->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Dokument_field =Dokument::$dataScheme[$filekey];
switch ($Dokument_field["type"]){
case "picture":
$Dokument->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Dokument::$dataScheme[$Dokument_field["sysParent"]];
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
$pfad = $Dokument_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Dokument->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
$Dokument=new Dokument();
if(isset($_POST["back"])){
Core::loadJavascript("includes/js/back.js");
}else{
if ($_POST["registrieren-ng"] != "1"){ 
Core::$view->path["view1"]="views/view.Dokument_new.php";
}else{
   $task_source = $_GET["task_source"];
   Core::redirect ($task_source);
}}
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
$_Impfpatient = Impfpatient::findAll(Impfpatient::SQL_SELECT_IGNORE_DERIVED);
Core::publish($_Impfpatient, "_Impfpatient");
Core::publish($Dokument, "Dokument");
//Enumerationen
$Dokumentart = DokumentartT::findAll();
Core::publish($Dokumentart, 'Dokumentart');
