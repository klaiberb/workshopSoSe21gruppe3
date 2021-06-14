<?php
//$user = new User;
$title = Core::$title;
Core::publish($title, "title");

//JS Funktionalität:
//$path = "includes/js/login-registration-form.js";
//Core::loadJavascript($path);


//Startseiten Dashboard:
$menuKey = "home";
require "controller.dashboard.php";
    

//Login  :
//require "controller.login.php";


//Register :
//require "controller.user_register.php";


//Startseite render Zusatzinfo:
if (Core::$user->id==""){
$guest = true;
Core::publish($guest, "guest");
$title = Core::$title;
Core::publish($title, "title");   
}else{
$guest = false;
Core::publish($guest, "guest");
}

Core::setView("home", "view1");
Core::$title = "Home";
