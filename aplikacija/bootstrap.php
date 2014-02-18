<?php

require_once('settings.php');

// setup language
switch (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2)){
    case "en":
        include("messages_en.php");
        break;
    case "sl":
        include("messages_sl.php");
        break;

    default:
        include("messages_en.php"); 
        break;
}