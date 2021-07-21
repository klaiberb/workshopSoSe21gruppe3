<?php

$taskType = "new";
$classSettings =Arzt::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Neu: Termin";
Core::setView("Termin_new", "view1", "new");
Core::setViewScheme("view1", "new", "Termin");

if(isset($_GET["chain"])){
    $referrer = $_GET["chain"];
Core::publish($referrer, "referrer");
}
if(isset($_GET["autocomplete"])){
    $autocomplete = 1;
Core::publish($autocomplete, "autocomplete");
}

$Termin=new Termin();
Termin::$activeViewport="new";
Termin::renderScript("new","form_Termin");

if(count($_POST)>0){
$a= $Termin->loadFormData();
if($a===true){
if($Termin->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Termin_field =Termin::$dataScheme[$filekey];
switch ($Termin_field["type"]){
case "picture":
$Termin->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Termin::$dataScheme[$Termin_field["sysParent"]];
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
$pfad = $Termin_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Termin->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
$Termin=new Termin();
if(isset($_POST["back"])){
Core::loadJavascript("includes/js/back.js");
}else{
if ($_POST["registrieren-ng"] != "1"){ 
Core::$view->path["view1"]="views/view.Termin_new.php";
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
$_Impfstoff = Impfstoff::findAll(Impfstoff::SQL_SELECT_IGNORE_DERIVED);
Core::publish($_Impfstoff, "_Impfstoff");
$_Arzt = Arzt::findAll(Arzt::SQL_SELECT_IGNORE_DERIVED);
Core::publish($_Arzt, "_Arzt");
Core::publish($Termin, "Termin");
//Enumerationen
$Aussage = AussageT::findAll();
Core::publish($Aussage, 'Aussage');
