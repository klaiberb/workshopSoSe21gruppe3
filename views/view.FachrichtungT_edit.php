<?php
$FachrichtungT = Core::$view->FachrichtungT;
$FachrichtungT_list = Core::$view->FachrichtungT_list;
?>
<a href="?task=FachrichtungT&id=<?=$FachrichtungT->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_FachrichtungT" method="post" action="?task=FachrichtungT_edit&id=<?=$FachrichtungT->id?>" data-ajax="false" enctype="<?=$FachrichtungT::$enctype?>">
<div class="ui-field-contain">
<?php
$FachrichtungT->renderLabel("id");
$FachrichtungT->render("id");
$FachrichtungT->renderLabel("c_ts");
$FachrichtungT->render("c_ts");
$FachrichtungT->renderLabel("m_ts");
$FachrichtungT->render("m_ts");
$FachrichtungT->renderLabel("literal");
$FachrichtungT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" name="update" id="update" value="1" >update</button>
</div>
</form>
