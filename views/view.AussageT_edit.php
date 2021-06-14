<?php
$AussageT = Core::$view->AussageT;
$AussageT_list = Core::$view->AussageT_list;
?>
<a href="?task=AussageT&id=<?=$AussageT->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_AussageT" method="post" action="?task=AussageT_edit&id=<?=$AussageT->id?>" data-ajax="false" enctype="<?=$AussageT::$enctype?>">
<div class="ui-field-contain">
<?php
$AussageT->renderLabel("id");
$AussageT->render("id");
$AussageT->renderLabel("c_ts");
$AussageT->render("c_ts");
$AussageT->renderLabel("m_ts");
$AussageT->render("m_ts");
$AussageT->renderLabel("literal");
$AussageT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" name="update" id="update" value="1" >update</button>
</div>
</form>
