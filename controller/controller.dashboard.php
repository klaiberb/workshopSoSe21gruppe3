<?php
if(!isset($menuKey)){
$menuKey= filter_input(INPUT_GET, "menu");

if($menuKey == "home"){
    require "controller.home.php";
}
}

$userCode = Core::$user->Gruppe;
$menu = [];


$allMenu=[];
$allMenu= Menu::$item;


foreach ($allMenu as $item){
    foreach($item as $itemElement){
        $userItem=[];
        $generalItem=[];
    $userItem = $itemElement['group']['G'.$userCode];
    $generalItem = $itemElement['group']['general']; 
    if($userItem['display'] != "false" || $generalItem["link"] == "home"){       
         $keys = [];
         $keys = array_keys($generalItem);        
         foreach($keys as $index){
           if($userItem[$index] != ""){
               $menuItem[$index] = $userItem[$index];
           }else{
               $menuItem[$index] = $generalItem[$index];
           }
         }
            if($menuItem['link']==$menuKey){
            $menu = $menuItem;
            }
            $menuItem = [];
      }
}
}

if($menuKey != "home"){
Core::$title=$menu['label'];    
}


$columns = $menu["columns"];
switch($columns){
    case 2:
        $class = "a";
        break;
    case 3:
        $class = "b";
        break;
    default:
        $class = "a";
}

$menuItems=Array();
$menuLeadingItems=Array();
foreach(Menu::$item as $item){
    if(isset($item['dashboardElement'])){  
    $userItem = $item['dashboardElement']['group']['G'.$userCode];
    $generalItem = $item['dashboardElement']['group']['general'];
    $dE = [];
     
     if($userItem['display'] != "false"){       
         $keys = [];
         $keys = array_keys($generalItem);        
         foreach($keys as $index){
           if($userItem[$index] != ""){
               $dE[$index] = $userItem[$index];
           }else{
               $dE[$index] = $generalItem[$index];
           }
         }
    
         if($dE["menu"]==$menuKey){
            if($dE["leadingItem"]===true || $dE["leadingItem"]=="true"){
            $dE["renderAs"]="dashboardItem";
             array_push($menuLeadingItems,$dE);
         }else{
            $dE["class"]="ui-block-".$class;
            $dE["renderAs"]="dashboardItem";
            array_push($menuItems,$dE);
            }
         }
     }
    }
}

Core::publish($class, "class");
Core::publish($menu, "menu");
Core::publish($menuItems, "menuItems");
Core::publish($menuLeadingItems, "menuLeadingItems");


if($menuKey != "home"){
Core::setView("dashboard", "view1", "detail");
}
