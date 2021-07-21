<?php
$Arzt_list=Core::$view->Arzt_list;
$id=Core::$view->id;
$Arzt=Core::$view->Arzt;
?>
<div id="custom-border-radius">
<a href="?task=Termin_detail&id=<?=$id?>" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" data-ajax="false">No text</a>
</div>
<div data-role="ui-bar ui-bar-a">
<h1>Arzt hinzufügen</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Termin" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Arzt->renderHeader("id", "table"); ?>
<?php $Arzt->renderHeader("c_ts", "table"); ?>
<?php $Arzt->renderHeader("m_ts", "table"); ?>
<?php $Arzt->renderHeader("Nachname", "table"); ?>
<?php $Arzt->renderHeader("Vorname", "table"); ?>
<?php $Arzt->renderHeader("Emailadresse", "table"); ?>
<?php $Arzt->renderHeader("Telefonnummer", "table"); ?>
<?php $Arzt->renderHeader("Fachrichtung", "table"); ?>
</tr>
</thead>
<tbody>
<?php foreach($Arzt_list as $klasse){
?>
<tr>
<?php $klasse->render("id"); ?>
<?php $klasse->render("c_ts"); ?>
<?php $klasse->render("m_ts"); ?>
<?php $klasse->render("Nachname"); ?>
<?php $klasse->render("Vorname"); ?>
<?php $klasse->render("Emailadresse"); ?>
<?php $klasse->render("Telefonnummer"); ?>
<?php $klasse->render("Fachrichtung"); ?>
<td>
<form method="post" action="?task=Termin_handle_Arzt&id=<?=$id?>" data-ajax="false">
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
