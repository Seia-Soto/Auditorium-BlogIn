<?php
/**
 * The default data sets served to client.
 */
class Frame extends Auditorium
{

  /**
   * The header configuring section of HTML data.
   */
  class Header
  {

    function __construct(argument)
    {
      // NOTE: Line #126, requires PHP version 5.4 or highter
      $headers = [];
    }

    function append($header = 'meta', $identifer = 'property', $type = '', $specifier = 'content', $value = '')
    {
      $toAppend = new stdClass();

      $toAppend->name = $header;
      $toAppend->identifer = $identifer;
      $toAppend->type = $type;
      $toAppend->specifier = $specifier;
      $toAppend->value = $value;

      array_push(self::headers, $toAppend);
    }

    function make()
    {
      $sets = '';

      foreach (self::headers as $header) {
        $literal = Auditorium::Application->Literals->tab.'<$name $identifer="$type" $specifier="$value" />'.PHP_EOL;

        $replaceAs = array(
          '$name' => $header->name,
          '$identifer' => $header->identifer,
          '$type' => $header->type,
          '$specifier' => $header->specifier,
          '$value' => $header->value
        );
        $sets .= strtr($literal, $replaceAs);
      }
      unset($header);
    }
  }
}
 ?>
