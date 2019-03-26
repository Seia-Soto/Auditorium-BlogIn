<?php
/**
 * HTML Frame bootstrap;
 */
 ?>
<!DOCTYPE html>

<?php
/**
 * Basic application frame constructor.
 */
class Auditorium
{

  public $package = array(
    "author" => "Seia-Soto",
    "version" => "0.0.1"
  );
  private static $preferences;

  function __construct($options = NULL)
  {

    // NOTE: Gather application preferences.
    $this->preferences = require_once('./preferences.php');

  }

  public function getPreference($which = NULL)
  {
    if ($which) {
      return $this->preferences[$which];
    } else {
      return $this->preferences;
    }
  }

}


require_once("./bootstrap.php");

 ?>
