<?php
$Termin_a_list=Core::$view->Termin_a_list;
$Termin_a=Core::$view->Termin_a;
$Arzt=Core::$view->Arzt;
?>
<div data-role="ui-bar ui-bar-a">
<p><h3>Beziehungsübersicht zur Klasse: Termin <a href="#popup_Termin_a" data-rel="popup" data-transition="pop" class="my-tooltip-btn ui-btn ui-alt-icon ui-nodisc-icon ui-btn-inline ui-icon-info ui-btn-icon-notext" title="Erfahre mehr">Erfahre mehr</a></h3></p>
<div data-role="popup" id="popup_Termin_a" class="ui-content" data-theme="a" style="max-width:800px;">
<h3>Informationen zu dieser Beziehung ():</h3><br>
Arzt (1..1) ---- (*..*) Termin <br><br>
<h4>Bedeutet für diese Seite der Beziehung:</h4>
<p>Das Objekt in dieser Detailansicht (aus der Klasse: Arzt) kann mehrere Verbindungen zu Objekten der Partnerklasse (Termin) haben (*..*).</p><br>
<h4>Bedeutet für die Partner-Seite der Beziehung:</h4>
<p>Es ist zu beachten, dass das Partnerobjekt genau eine Verbindung zu einem Objekt dieser Klasse haben muss (1..1).</p>
<h4>Die Information zur Partner-Seite sollte vor allem dann beachtet werden:</h4>
<ul><li>wenn eine Verbindung gelöscht wird</li>
<li>wenn ein Objekt gelöscht wird</li></ul>
... durch einen solchen Vorgang könnte nämlich eine erfüllte Muss-Beziehung, auf Seite des Partnerobjekts auf einmal nicht mehr erfüllt sein!
</div>
</div>
<?php
if(!empty($Termin_a_list)){
?>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Termin_a" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Termin_a->renderHeader("id", "table"); ?>
<?php $Termin_a->renderHeader("c_ts", "table"); ?>
<?php $Termin_a->renderHeader("m_ts", "table"); ?>
<?php $Termin_a->renderHeader("Datum", "table"); ?>
<?php $Termin_a->renderHeader("Aussage", "table"); ?>
<?php $Termin_a->renderHeader("_Impfpatient", "table"); ?>
<?php $Termin_a->renderHeader("_Impfstoff", "table"); ?>
<?php $Termin_a->renderHeader("_Arzt", "table"); ?>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($Termin_a_list as $klasse){
?>
<tr>
<?php $klasse->render("id", "list"); ?>
<?php $klasse->render("c_ts", "list"); ?>
<?php $klasse->render("m_ts", "list"); ?>
<?php $klasse->render("Datum", "list"); ?>
<?php $klasse->render("Aussage", "list"); ?>
<?php $klasse->render("_Impfpatient", "list"); ?>
<?php $klasse->render("_Impfstoff", "list"); ?>
<?php $klasse->render("_Arzt", "list"); ?>
<td>
<a href="?task=Arzt_delete_Termin_a&id=<?=$klasse->id?>&back=<?=$Arzt->id?>&muss=false" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline">delete</a>
</td>
</td>
</tr>
<?php }
}else{
echo"<div>";
echo"Aktuell liegt keine Verbindung zu einem Objekt der Partnerklasse vor.";
}
?>
</tbody>
</table>
</div>
