<?php
/**
 * Basic database connection constructor.
 */
class Database
{

  protected static $configuration;
  protected static $connection;

  function __construct()
  {

    $this->configuration = $Auditorium->getPreference("database");
    $this->connection = mysqli_connect(
      $this->configuration["host"],
      $this->configuration["user"],
      $this->configuration["password"],
      $this->configuration["name"]
    );

    if (!$this->connection) {
      die("DATABASE_CONNECTION_COULD_NOT_ESTABLISHED");
    }

  }

  public function getConnection()
  {
    return $this->connection;
  }

}

$Database = new Database;
 ?>
