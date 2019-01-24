<?php
/**
 * Includes all objects and properties about application when start-up and initializes.
 * Accessing this file will known as malignity access.
 */

 if (empty(Auditorium::Flat)) {
   require_once(dirname(__FILE__).'/__drop.php');
 }

require_once(Auditorium::Application->Predictors.'/Database.php');
requrie_once(Auditorium::Application->Predictors.'/Frame.php');
 ?>
