<?php
$Arzt = Core::$view->Arzt;
$Arzt_list = Core::$view->Arzt_list ;
if (isset($_GET['task_source'])){
$task_source = $_GET['task_source'];
}else{
$task_source = "Arzt";
}
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Arzt_edit",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<a href="?task=<?=$task_source?>&id=<?=$Arzt->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right" style="display:inline-block;">No text</a>
<div class="tooltip_hs" style="margin-left:20px;position:absolute">
<a href="?task=favoriten&db_task=Arzt_edit&icon=<?=$icon?>&id=<?=$Arzt->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true" ></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<form id="form_Arzt" method="post" action="?task=Arzt_edit&id=<?=$Arzt->id?>" data-ajax="false" enctype="<?=$Arzt::$enctype?>">
<div class="ui-field-contain">
<?php
$Arzt->renderLabel("id");
$Arzt->render("id");
$Arzt->renderLabel("c_ts");
$Arzt->render("c_ts");
$Arzt->renderLabel("m_ts");
$Arzt->render("m_ts");
$Arzt->renderLabel("Nachname");
$Arzt->render("Nachname");
$Arzt->renderLabel("Vorname");
$Arzt->render("Vorname");
$Arzt->renderLabel("Emailadresse");
$Arzt->render("Emailadresse");
$Arzt->renderLabel("Telefonnummer");
$Arzt->render("Telefonnummer");
$Arzt->renderLabel("Fachrichtung");
$Arzt->render("Fachrichtung");
?>
<button type="submit" name="update" id="update" value="1" style="width:100%">update</button>
</div>
</form>
