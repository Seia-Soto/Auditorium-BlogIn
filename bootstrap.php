<?php

// NOTE: Initialize application frame and preferences.
$Auditorium = new Auditorium;


// NOTE: Require peer modules.
$exportsPath = dirname(__FILE__) . $Auditorium->getPreference("path")["exports"];

require_once($exportsPath . "/session.php");
require_once($exportsPath . "/database.php");

 ?>
