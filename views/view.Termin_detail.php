<?php $klasse = Core::$view->Termin; 
$access=Core::import("access");
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Termin_detail",$_SESSION['uid']);
if ($icon =="plus"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
$Termin_list_2 = Core::$view->Termin_list_2 ; ?>
<h3 class="ui-bar ui-bar-b ui-corner-all ">
<a href="?task=Termin" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all ui-btn-inline" align="right">back</a>
<?php if($access["edit"] == "true"){ ?>
<a href="?task=Termin_edit&id=<?=$klasse->id?>&task_source=Termin_detail" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext   ui-corner-all ui-btn-inline">edit</a>
<?php } ?>
<?php if($access["delete"] == "true"){ ?>
<a href="?task=Termin_delete&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline">delete</a>
<?php } ?>

 Termin

<?php if(Core::$user->Gruppe >0){ ?>
<div class="tooltip_hs">
<a href="?task=favoriten&db_task=Termin_detail&icon=<?=$icon?>&id=<?=$klasse->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true"></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<?php } ?>

</h3>
<div class="ui-body ui-body-a ui-corner-all">
<div class="ui-field-contain">
<?php
$klasse->renderLabel("id");
$klasse->render("id");
$klasse->renderLabel("c_ts");
$klasse->render("c_ts");
$klasse->renderLabel("m_ts");
$klasse->render("m_ts");
$klasse->renderLabel("Datum");
$klasse->render("Datum");
$klasse->renderLabel("Aussage");
$klasse->render("Aussage");
$klasse->renderLabel("_Impfpatient");
$klasse->render("_Impfpatient");
$klasse->renderLabel("_Impfstoff");
$klasse->render("_Impfstoff");
$klasse->renderLabel("_Arzt");
$klasse->render("_Arzt");
?>
</div>
</div><br><br>
<?php if($access["relations"] == "true"){ ?>
<h3 class="ui-bar ui-bar-b ui-corner-all">Beziehungen</h3>
<div class="ui-body ui-body-a ui-corner-all">
<div data-role="tabs" id="tabs" data-theme="a">
<div data-role="navbar" data-theme="a">
<ul>
<li><a href="#1" data-ajax="false">Impfpatient</a></li>
<li><a href="#2" data-ajax="false">Impfstoff</a></li>
<li><a href="#3" data-ajax="false">Arzt</a></li>
</ul>
</div>
<div id="1" class="ui-body-d ui-content">
<div id="view_Impfpatient">
<?php
Core::$view->render("view_Impfpatient");
?>
<form method="post" action="?task=Termin_handle_Impfpatient&id=<?=$klasse->id?>" data-ajax="false">
<button type="submit" name="auswählen" id="auswählen" class="ui-btn ui-icon-bullets ui-btn-icon-left">Verbindung wählen</button>
</form>
<a href="?task=Impfpatient_new&Termin=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left">Neuanlegen</a>
</div>
</div>
<th></th>
<div id="2" class="ui-body-d ui-content">
<div id="view_Impfstoff">
<?php
Core::$view->render("view_Impfstoff");
?>
<form method="post" action="?task=Termin_handle_Impfstoff&id=<?=$klasse->id?>" data-ajax="false">
<button type="submit" name="auswählen" id="auswählen" class="ui-btn ui-icon-bullets ui-btn-icon-left">Verbindung wählen</button>
</form>
<a href="?task=Impfstoff_new&Termin=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left">Neuanlegen</a>
</div>
</div>
<th></th>
<div id="3" class="ui-body-d ui-content">
<div id="view_Arzt">
<?php
Core::$view->render("view_Arzt");
?>
<form method="post" action="?task=Termin_handle_Arzt&id=<?=$klasse->id?>" data-ajax="false">
<button type="submit" name="auswählen" id="auswählen" class="ui-btn ui-icon-bullets ui-btn-icon-left">Verbindung wählen</button>
</form>
<a href="?task=Arzt_new&Termin=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left">Neuanlegen</a>
</div>
</div>
<th></th>
</div>
</div>
<?php } ?>
