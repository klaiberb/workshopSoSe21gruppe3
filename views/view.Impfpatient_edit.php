<?php
$Impfpatient = Core::$view->Impfpatient;
$Impfpatient_list = Core::$view->Impfpatient_list ;
if (isset($_GET['task_source'])){
$task_source = $_GET['task_source'];
}else{
$task_source = "Impfpatient";
}
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Impfpatient_edit",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<a href="?task=<?=$task_source?>&id=<?=$Impfpatient->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right" style="display:inline-block;">No text</a>
<div class="tooltip_hs" style="margin-left:20px;position:absolute">
<a href="?task=favoriten&db_task=Impfpatient_edit&icon=<?=$icon?>&id=<?=$Impfpatient->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true" ></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<form id="form_Impfpatient" method="post" action="?task=Impfpatient_edit&id=<?=$Impfpatient->id?>" data-ajax="false" enctype="<?=$Impfpatient::$enctype?>">
<div class="ui-field-contain">
<?php
$Impfpatient->renderLabel("id");
$Impfpatient->render("id");
$Impfpatient->renderLabel("c_ts");
$Impfpatient->render("c_ts");
$Impfpatient->renderLabel("m_ts");
$Impfpatient->render("m_ts");
$Impfpatient->renderLabel("Nachname");
$Impfpatient->render("Nachname");
$Impfpatient->renderLabel("Vorname");
$Impfpatient->render("Vorname");
$Impfpatient->renderLabel("Geburtsdatum");
$Impfpatient->render("Geburtsdatum");
$Impfpatient->renderLabel("Emailadresse");
$Impfpatient->render("Emailadresse");
$Impfpatient->renderLabel("Telefonnummer");
$Impfpatient->render("Telefonnummer");
$Impfpatient->renderLabel("Adresse_Nachname");
$Impfpatient->render("Adresse_Nachname");
$Impfpatient->renderLabel("Adresse_Vorname");
$Impfpatient->render("Adresse_Vorname");
$Impfpatient->renderLabel("Adresse_Straße");
$Impfpatient->render("Adresse_Straße");
$Impfpatient->renderLabel("Adresse_Hausnummer");
$Impfpatient->render("Adresse_Hausnummer");
$Impfpatient->renderLabel("Adresse_PLZ");
$Impfpatient->render("Adresse_PLZ");
$Impfpatient->renderLabel("Adresse_Ort");
$Impfpatient->render("Adresse_Ort");
?>
<button type="submit" name="update" id="update" value="1" style="width:100%">update</button>
</div>
</form>
