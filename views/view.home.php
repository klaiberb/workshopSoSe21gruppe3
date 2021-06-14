<?php
$title=Core::import("title");
$test="test";
$guest=Core::import("guest");
if(isset($guest)){
    if($guest === true){
        $guest = "hometitle-login";
    }else{
        $guest = false;
    }
}

$menu=Core::import("menu");
$class=Core::import("class");
$menuItems=Core::import("menuItems");
$menuLeadingItems=Core::import("menuLeadingItems");

if($menu["heading"] == ""){
    $menu["heading"] = "Willkommen bei ".$title."!";
}
?>




<div class="dashboardwrapper">
    
<div class="hometitle <?=$guest?>" >
  <span style="font-size: 40px; background-color: #FFFFFF; padding: 0 20px;">
   <?=$menu["heading"];?>
  </span>
</div>
<p class="homesubtitle"><?=$menu["text"];?></p>

<ol class="articles lI">
<?php
if(array_key_exists(0, $menuLeadingItems)){
  foreach($menuLeadingItems as $key => $item){
    Menu::showMenuItem($item,$key, "dashboardMenu");
  }  
}
?>
</ol>

<ol class="articles fI">    
<?php
if(isset($menuItems)){
  foreach($menuItems as $key => $item){
    Menu::showMenuItem($item,$key, "dashboardMenu");
  }  
}
?>
</ol>
</div>