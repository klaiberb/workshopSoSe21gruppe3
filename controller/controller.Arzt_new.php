<?php

$taskType = "new";
$classSettings =Arzt::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Neu: Arzt";
Core::setView("Arzt_new", "view1", "new");
Core::setViewScheme("view1", "new", "Arzt");

if(isset($_GET["chain"])){
    $referrer = $_GET["chain"];
Core::publish($referrer, "referrer");
}
if(isset($_GET["autocomplete"])){
    $autocomplete = 1;
Core::publish($autocomplete, "autocomplete");
}

$Arzt=new Arzt();
Arzt::$activeViewport="new";
Arzt::renderScript("new","form_Arzt");

if(count($_POST)>0){
$a= $Arzt->loadFormData();
if($a===true){
if($Arzt->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Arzt_field =Arzt::$dataScheme[$filekey];
switch ($Arzt_field["type"]){
case "picture":
$Arzt->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Arzt::$dataScheme[$Arzt_field["sysParent"]];
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
$pfad = $Arzt_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Arzt->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
$Arzt=new Arzt();
if(isset($_POST["back"])){
Core::loadJavascript("includes/js/back.js");
}else{
if ($_POST["registrieren-ng"] != "1"){ 
Core::$view->path["view1"]="views/view.Arzt_new.php";
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
Core::publish($Arzt, "Arzt");
//Enumerationen
$Fachrichtung = FachrichtungT::findAll();
Core::publish($Fachrichtung, 'Fachrichtung');
