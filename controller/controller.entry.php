<?php
//$path = "includes/js/login-registration-form.js";
//Core::loadJavascript($path);

//Login  :
require "controller.login.php";

//Register :
require "controller.user_register.php";
//Aus dem else-Teil einzelnen Controllern rausgenommen und hier übergreifend eingefügt
if (isset($_POST)) {
$gruppe = new gruppet;
$gruppenliste = $gruppe->findAll();
Core::publish($user, "user");
Core::publish($gruppenliste, "Gruppe");
}

$test = "test";

Core::setView("entry", "view_entry");