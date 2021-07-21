<?php
$Impfpatient_list=Core::$view->Impfpatient_list;
$id=Core::$view->id;
$Impfpatient=Core::$view->Impfpatient;
?>
<div id="custom-border-radius">
<a href="?task=Dokument_detail&id=<?=$id?>" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" data-ajax="false">No text</a>
</div>
<div data-role="ui-bar ui-bar-a">
<h1>Impfpatient hinzufügen</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Dokument" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
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
<form method="post" action="?task=Dokument_handle_Impfpatient&id=<?=$id?>" data-ajax="false">
<input type="hidden" name="_id" value="<?=$klasse->id?>">
<button type="submit" name="add" id="add" value="1" class="ui-btn ui-icon-plus ui-btn-icon-notext ui-corner-all ui-btn-inline">add</button>
</form>
</td>
</tr>
<?php
        }
        ?>
</tbody>
</table>
</div>
<br>
