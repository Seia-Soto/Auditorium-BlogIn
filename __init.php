<?php
if (empty(Auditorium::Flat)) {
  require_once(dirname(__FILE__).'/__drop.php');
}

/**
 * Initializes the where is this application and essential(might be something exposes this app) metadatas.
 */
class Application extends Auditorium
{
  const Root = dirname(__FILE__);
  const Workspace = self::Root.'/auditorium';

  const Predictors = self::Root.'/__init';

  /**
   * About this Auditorium application.
   */
  class Publication
  {
    const Author = 'Seia-Soto';
    const Publisher = 'Sewritten';
    const Spectator = 'Josbar';

    const Version = 0.0.1;
    const Build = 1;

    /**
     * If you forked this application and want to add your name to new application,
     * please use below.
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
      'path' => parent::Root,
      'writable' => is_writable(parent::Root)
    );
  }

  /**
   * About default strict tabs and code indexing.
   */
  class Literals
  {
    const $tab = '  ';
  }
}

require_once(Auditorium::Application->Workspace.'/index.php');
 ?>
