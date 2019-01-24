<?php
/**
 * Declares the basic configurations just alike database with ETC. things.
 */
class Database extends Auditorium
{
  /**
   * About database things - user and names...
   */
  private class Credential
  {
    require_once(Auditorium::Application->Root.'/__database.php');
  }

  function estableDock()
  {
    $dock = new MySQLi(
      self::Credential->host,
      self::Credential->user,
      self::Credential->password,
      self::Credential->name,
      self::Credential->port
    );

    if ($dock->connect_errno) {
      $dock = array(
        'sn' => 1012,
        'details' => 'Database credential is not valid, please confirm credential installed.'
      );
    }
    if (!$dock->set_charset(self::Credential->charset)) {
      $dock = array(
        'sn' => 10062,
        'details' => 'Cannot set connection encoding with '.self::Credential->charset.', please confirm on your MySQL server\' configuration.'
      )
    }

    return $dock;
  }

  function ifSetless()
  {
    $connection = self::estableDock();
    $flat = 'SELECT Flat FROM '.self::Credential->prefix.'Auditorium';

    $st = $connection->prepare($flat)->execute();

    $result = $st->get_result()->fetch_object();
    $setless = false;

    if (!isset($result->is)) {
      $setless = true;
    }
    return $setless;
  }
}
 ?>
