<?php
$DokumentartT = Core::$view->DokumentartT;
$DokumentartT_list = Core::$view->DokumentartT_list;
?>
<a href="?task=DokumentartT&id=<?=$DokumentartT->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_DokumentartT" method="post" action="?task=DokumentartT_edit&id=<?=$DokumentartT->id?>" data-ajax="false" enctype="<?=$DokumentartT::$enctype?>">
<div class="ui-field-contain">
<?php
$DokumentartT->renderLabel("id");
$DokumentartT->render("id");
$DokumentartT->renderLabel("c_ts");
$DokumentartT->render("c_ts");
$DokumentartT->renderLabel("m_ts");
$DokumentartT->render("m_ts");
$DokumentartT->renderLabel("literal");
$DokumentartT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" name="update" id="update" value="1" >update</button>
</div>
</form>
