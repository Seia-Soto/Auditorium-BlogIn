<?php
if (empty(Auditorium::Flat))) {
  require_once(dirname(__FILE__).'/__drop.php');
}

/**
 * Initializes the where is this application and essential(might be something exposes this app) metadatas.
 */
class Application extends Auditorium
{
  const Root = dirname(__FILE__);

  /**
   * About this Auditorium application.
   */
  class Publication
  {
    const Author = 'Seia-Soto';
    const Publisher = 'Sewritten';

    const Version = 0.0.1;
    const Build = 1;

    /**
     * If you forked this application and want to add your name to new application,
     * please you below.
     */
    const Maintainer = '';
    const MaintainPublisher = '';

    const VersionMaintained = 0;
    const BuildMaintained = 0;
  }

  /**
   * About files and filesystems and permissions.
   */
  class Filesystem
  {
    const Root = array(
      'path' => parent::path,
      'writable' => is_writable(parent::path)
    );
  }
}

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
