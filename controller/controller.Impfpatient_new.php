<?php

$taskType = "new";
$classSettings =Arzt::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Neu: Impfpatient";
Core::setView("Impfpatient_new", "view1", "new");
Core::setViewScheme("view1", "new", "Impfpatient");

if(isset($_GET["chain"])){
    $referrer = $_GET["chain"];
Core::publish($referrer, "referrer");
}
if(isset($_GET["autocomplete"])){
    $autocomplete = 1;
Core::publish($autocomplete, "autocomplete");
}

$Impfpatient=new Impfpatient();
Impfpatient::$activeViewport="new";
Impfpatient::renderScript("new","form_Impfpatient");

if(count($_POST)>0){
$a= $Impfpatient->loadFormData();
if($a===true){
if($Impfpatient->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Impfpatient_field =Impfpatient::$dataScheme[$filekey];
switch ($Impfpatient_field["type"]){
case "picture":
$Impfpatient->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Impfpatient::$dataScheme[$Impfpatient_field["sysParent"]];
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
$pfad = $Impfpatient_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Impfpatient->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
$Impfpatient=new Impfpatient();
if(isset($_POST["back"])){
Core::loadJavascript("includes/js/back.js");
}else{
if ($_POST["registrieren-ng"] != "1"){ 
Core::$view->path["view1"]="views/view.Impfpatient_new.php";
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
Core::publish($Impfpatient, "Impfpatient");
//Enumerationen
