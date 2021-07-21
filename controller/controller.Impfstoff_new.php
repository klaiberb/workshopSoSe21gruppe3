<?php

$taskType = "new";
$classSettings =Arzt::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Neu: Impfstoff";
Core::setView("Impfstoff_new", "view1", "new");
Core::setViewScheme("view1", "new", "Impfstoff");

if(isset($_GET["chain"])){
    $referrer = $_GET["chain"];
Core::publish($referrer, "referrer");
}
if(isset($_GET["autocomplete"])){
    $autocomplete = 1;
Core::publish($autocomplete, "autocomplete");
}

$Impfstoff=new Impfstoff();
Impfstoff::$activeViewport="new";
Impfstoff::renderScript("new","form_Impfstoff");

if(count($_POST)>0){
$a= $Impfstoff->loadFormData();
if($a===true){
if($Impfstoff->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Impfstoff_field =Impfstoff::$dataScheme[$filekey];
switch ($Impfstoff_field["type"]){
case "picture":
$Impfstoff->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Impfstoff::$dataScheme[$Impfstoff_field["sysParent"]];
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
$pfad = $Impfstoff_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Impfstoff->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
$Impfstoff=new Impfstoff();
if(isset($_POST["back"])){
Core::loadJavascript("includes/js/back.js");
}else{
if ($_POST["registrieren-ng"] != "1"){ 
Core::$view->path["view1"]="views/view.Impfstoff_new.php";
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
$_Impfstoffart = Impfstoffart::findAll(Impfstoffart::SQL_SELECT_IGNORE_DERIVED);
Core::publish($_Impfstoffart, "_Impfstoffart");
Core::publish($Impfstoff, "Impfstoff");
//Enumerationen
