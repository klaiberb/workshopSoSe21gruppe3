<?php
$Impfpatient_list=Core::$view->Impfpatient_list;
$Impfpatient=Core::$view->Impfpatient;
$access=Core::import("access");
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Impfpatient",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<div data-role="ui-bar ui-bar-a">
<h1>Übersichtsseite Impfpatient

<?php if(Core::$user->Gruppe >0){ ?>
<div class="tooltip_hs">
<a href="?task=favoriten&db_task=Impfpatient&icon=<?=$icon?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true"></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<?php } ?>

</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Impfpatient" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Impfpatient->renderHeader("id", "table"); ?>
<?php $Impfpatient->renderHeader("c_ts", "table"); ?>
<?php $Impfpatient->renderHeader("m_ts", "table"); ?>
<?php $Impfpatient->renderHeader("Nachname", "table"); ?>
<?php $Impfpatient->renderHeader("Vorname", "table"); ?>
<?php $Impfpatient->renderHeader("Geburtsdatum", "table"); ?>
<?php $Impfpatient->renderHeader("Emailadresse", "table"); ?>
<?php $Impfpatient->renderHeader("Telefonnummer", "table"); ?>
<?php $Impfpatient->renderHeader("Adresse_Nachname", "table"); ?>
<?php $Impfpatient->renderHeader("Adresse_Vorname", "table"); ?>
<?php $Impfpatient->renderHeader("Adresse_Straße", "table"); ?>
<?php $Impfpatient->renderHeader("Adresse_Hausnummer", "table"); ?>
<?php $Impfpatient->renderHeader("Adresse_PLZ", "table"); ?>
<?php $Impfpatient->renderHeader("Adresse_Ort", "table"); ?>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($Impfpatient_list as $klasse){
?>
<tr>
<?php $klasse->render("id"); ?>
<?php $klasse->render("c_ts"); ?>
<?php $klasse->render("m_ts"); ?>
<?php $klasse->render("Nachname"); ?>
<?php $klasse->render("Vorname"); ?>
<?php $klasse->render("Geburtsdatum"); ?>
<?php $klasse->render("Emailadresse"); ?>
<?php $klasse->render("Telefonnummer"); ?>
<?php $klasse->render("Adresse_Nachname"); ?>
<?php $klasse->render("Adresse_Vorname"); ?>
<?php $klasse->render("Adresse_Straße"); ?>
<?php $klasse->render("Adresse_Hausnummer"); ?>
<?php $klasse->render("Adresse_PLZ"); ?>
<?php $klasse->render("Adresse_Ort"); ?>
<td>
<?php if($access["detail"] == "true"){ ?>
<a href="?task=Impfpatient_detail&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">show</a>
<?php } ?>
<?php if($access["edit"] == "true"){ ?>
<a href="?task=Impfpatient_edit&id=<?=$klasse->id?>&task_source=Impfpatient" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">edit</a>
<?php } ?>
<?php if($access["delete"] == "true"){ ?>
<a href="?task=Impfpatient_delete&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline" onclick="return confirm("Soll der Datensatz mit der ID: <?=$Klasse->id." wirklich gelöscht werden?"?>")">delete</a>
<?php } ?>
</td>
</tr>
<?php
        }
        ?>
</tbody>
</table>
</div>
<?php if($access["new"] == "true"){ ?>
<a href="?task=Impfpatient_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">Neuanlegen</a><br>
<?php } ?>
<br>
