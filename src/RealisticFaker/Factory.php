<?php
namespace RealisticFaker;
use Faker;
/**
 * Use this factory to create a RealisticFakerObject
 *
 * @author Bernhard Strehl
 */
class Factory extends \Faker\Factory {

  public static function create($identifier = null, $langcode = Faker\Factory::DEFAULT_LOCALE) {
    $generator = new \RealisticFaker\Generator($identifier, $langcode);
    return $generator;
  }

}
