<?php
$Termin_a_list=Core::$view->Termin_a_list;
$id=Core::$view->id;
$Termin=Core::$view->Termin;
?>
<div id="custom-border-radius">
<a href="?task=Impfstoff_detail&id=<?=$id?>" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" data-ajax="false">No text</a>
</div>
<div data-role="ui-bar ui-bar-a">
<h1>Termin hinzufügen</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Impfstoff" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Termin->renderHeader("id", "table"); ?>
<?php $Termin->renderHeader("c_ts", "table"); ?>
<?php $Termin->renderHeader("m_ts", "table"); ?>
<?php $Termin->renderHeader("Datum", "table"); ?>
<?php $Termin->renderHeader("Aussage", "table"); ?>
<?php $Termin->renderHeader("_Impfpatient", "table"); ?>
<?php $Termin->renderHeader("_Impfstoff", "table"); ?>
<?php $Termin->renderHeader("_Arzt", "table"); ?>
</tr>
</thead>
<tbody>
<?php foreach($Termin_a_list as $klasse){
?>
<tr>
<?php $klasse->render("id"); ?>
<?php $klasse->render("c_ts"); ?>
<?php $klasse->render("m_ts"); ?>
<?php $klasse->render("Datum"); ?>
<?php $klasse->render("Aussage"); ?>
<?php $klasse->render("_Impfpatient"); ?>
<?php $klasse->render("_Impfstoff"); ?>
<?php $klasse->render("_Arzt"); ?>
<td>
<form method="post" action="?task=Impfstoff_handle_Termin_a&id=<?=$id?>" data-ajax="false">
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
