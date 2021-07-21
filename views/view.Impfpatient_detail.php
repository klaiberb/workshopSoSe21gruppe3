<?php $klasse = Core::$view->Impfpatient; 
$access=Core::import("access");
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Impfpatient_detail",$_SESSION['uid']);
if ($icon =="plus"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
$Impfpatient_list_2 = Core::$view->Impfpatient_list_2 ; ?>
<h3 class="ui-bar ui-bar-b ui-corner-all ">
<a href="?task=Impfpatient" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all ui-btn-inline" align="right">back</a>
<?php if($access["edit"] == "true"){ ?>
<a href="?task=Impfpatient_edit&id=<?=$klasse->id?>&task_source=Impfpatient_detail" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext   ui-corner-all ui-btn-inline">edit</a>
<?php } ?>
<?php if($access["delete"] == "true"){ ?>
<a href="?task=Impfpatient_delete&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline">delete</a>
<?php } ?>

 Impfpatient

<?php if(Core::$user->Gruppe >0){ ?>
<div class="tooltip_hs">
<a href="?task=favoriten&db_task=Impfpatient_detail&icon=<?=$icon?>&id=<?=$klasse->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true"></a>
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
$klasse->renderLabel("Nachname");
$klasse->render("Nachname");
$klasse->renderLabel("Vorname");
$klasse->render("Vorname");
$klasse->renderLabel("Geburtsdatum");
$klasse->render("Geburtsdatum");
$klasse->renderLabel("Emailadresse");
$klasse->render("Emailadresse");
$klasse->renderLabel("Telefonnummer");
$klasse->render("Telefonnummer");
$klasse->renderLabel("Adresse_Nachname");
$klasse->render("Adresse_Nachname");
$klasse->renderLabel("Adresse_Vorname");
$klasse->render("Adresse_Vorname");
$klasse->renderLabel("Adresse_Straße");
$klasse->render("Adresse_Straße");
$klasse->renderLabel("Adresse_Hausnummer");
$klasse->render("Adresse_Hausnummer");
$klasse->renderLabel("Adresse_PLZ");
$klasse->render("Adresse_PLZ");
$klasse->renderLabel("Adresse_Ort");
$klasse->render("Adresse_Ort");
?>
</div>
</div><br><br>
<?php if($access["relations"] == "true"){ ?>
<h3 class="ui-bar ui-bar-b ui-corner-all">Beziehungen</h3>
<div class="ui-body ui-body-a ui-corner-all">
<div data-role="tabs" id="tabs" data-theme="a">
<div data-role="navbar" data-theme="a">
<ul>
<li><a href="#1" data-ajax="false">Termin</a></li>
<li><a href="#2" data-ajax="false">Dokument</a></li>
</ul>
</div>
<div id="1" class="ui-body-d ui-content">
<div id="viewTermin_a">
<?php
Core::$view->render("view_Termin_a");
?>
<form method="post" action="?task=Impfpatient_handle_Termin_a&id=<?=$klasse->id?>" data-ajax="false">
<button type="submit" name="auswählen" id="auswählen" class="ui-btn ui-icon-bullets ui-btn-icon-left">Auswählen</button>
</form>
<a href="?task=Termin_new&Impfpatient=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left">Neuanlegen</a>
</div>
</div>
<th></th>
<div id="2" class="ui-body-d ui-content">
<div id="view_Dokument_b">
<?php
Core::$view->render("view_Dokument_b");
?>
<form method="post" action="?task=Impfpatient_handle_Dokument_b&id=<?=$klasse->id?>" data-ajax="false">
<button type="submit" name="auswählen" id="auswählen" class="ui-btn ui-icon-bullets ui-btn-icon-left">Auswählen</button>
</form>
<a href="?task=Dokument_new&Impfpatient=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left">Neuanlegen</a>
</div>
</div>
<th></th>
</div>
</div>
<?php } ?>
