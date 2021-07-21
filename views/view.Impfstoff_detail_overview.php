<?php
$Impfstoff_list=Core::$view->Impfstoff_list;
$Impfstoff=Core::$view->Impfstoff;
$Termin=Core::$view->Termin;
?>
<div data-role="ui-bar ui-bar-a">
<p><h3>Beziehungsübersicht zur Klasse: Impfstoff <a href="#popup_Impfstoff" data-rel="popup" data-transition="pop" class="my-tooltip-btn ui-btn ui-alt-icon ui-nodisc-icon ui-btn-inline ui-icon-info ui-btn-icon-notext" title="Erfahre mehr">Erfahre mehr</a></h3></p>
<div data-role="popup" id="popup_Impfstoff" class="ui-content" data-theme="a" style="max-width:800px;">
<h3>Informationen zu dieser Beziehung ():</h3><br>
Termin (*..*) ---- (0..1) Impfstoff <br><br>
<h4>Bedeutet für diese Seite der Beziehung:</h4>
<p>Das Objekt in dieser Detailansicht (aus der Klasse: Termin) kann genau eine Verbindung zu einem Objekt der Partnerklasse (Impfstoff) haben (0..1).</p><br>
<h4>Bedeutet für die Partner-Seite der Beziehung:</h4>
<p>Das Partnerobjekt kann mehrere Verbindungen zu den Objekten aus dieser Klasse haben (*..*).</p>
<h4>Die Information zur Partner-Seite sollte vor allem dann beachtet werden:</h4>
<ul><li>wenn eine Verbindung gelöscht wird</li>
<li>wenn ein Objekt gelöscht wird</li></ul>
... durch einen solchen Vorgang könnte nämlich eine erfüllte Muss-Beziehung, auf Seite des Partnerobjekts auf einmal nicht mehr erfüllt sein!
</div>
</div>
<div class="ui-field-contain">
<?php foreach($Impfstoff_list as $klasse){
$partner=true;
$klasse->renderLabel("id", "detail");
$klasse->render("id", "detail");
$klasse->renderLabel("c_ts", "detail");
$klasse->render("c_ts", "detail");
$klasse->renderLabel("m_ts", "detail");
$klasse->render("m_ts", "detail");
$klasse->renderLabel("Bezeichnung", "detail");
$klasse->render("Bezeichnung", "detail");
$klasse->renderLabel("Hersteller", "detail");
$klasse->render("Hersteller", "detail");
$klasse->renderLabel("Zulassungsdatum", "detail");
$klasse->render("Zulassungsdatum", "detail");
$klasse->renderLabel("Zulassungsstelle", "detail");
$klasse->render("Zulassungsstelle", "detail");
$klasse->renderLabel("_Impfstoffart", "detail");
$klasse->render("_Impfstoffart", "detail");
}
if($partner!==true){
echo"Aktuell liegt keine Verbindung zu einem Objekt der Partnerklasse vor.";
}
?>
</div>
<a href="?task=Termin_delete_Impfstoff&id=<?=$Termin->id?>&back=<?=$Termin->id?> " data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete">Verbindung trennen</a>
