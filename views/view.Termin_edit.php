<?php
$Termin = Core::$view->Termin;
$Termin_list = Core::$view->Termin_list ;
if (isset($_GET['task_source'])){
$task_source = $_GET['task_source'];
}else{
$task_source = "Termin";
}
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Termin_edit",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<a href="?task=<?=$task_source?>&id=<?=$Termin->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right" style="display:inline-block;">No text</a>
<div class="tooltip_hs" style="margin-left:20px;position:absolute">
<a href="?task=favoriten&db_task=Termin_edit&icon=<?=$icon?>&id=<?=$Termin->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true" ></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<form id="form_Termin" method="post" action="?task=Termin_edit&id=<?=$Termin->id?>" data-ajax="false" enctype="<?=$Termin::$enctype?>">
<div class="ui-field-contain">
<?php
$Termin->renderLabel("id");
$Termin->render("id");
$Termin->renderLabel("c_ts");
$Termin->render("c_ts");
$Termin->renderLabel("m_ts");
$Termin->render("m_ts");
$Termin->renderLabel("Datum");
$Termin->render("Datum");
$Termin->renderLabel("Aussage");
$Termin->render("Aussage");
$Termin->renderLabel("_Impfpatient");
$Termin->render("_Impfpatient");
$Termin->renderLabel("_Impfstoff");
$Termin->render("_Impfstoff");
$Termin->renderLabel("_Arzt");
$Termin->render("_Arzt");
?>
<button type="submit" name="update" id="update" value="1" style="width:100%">update</button>
</div>
</form>
