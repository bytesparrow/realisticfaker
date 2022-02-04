<?php

namespace RealisticFaker;

use Faker;

/**
 * Use this factory to create a RealisticFakerObject
 *
 * @author Bernhard Strehl
 */
class Factory extends \Faker\Factory {

  /**
   * Use $faker = RealisticFaker\Factory::create();
   * Then you can create personas like  $faker->firstName
   * 
   * @param type $identifier will always return the same personas. Like $faker = RealisticFaker\Factory::create("admin") will always give you Hans-Günter.
   * @param type $langcode your desired languagge in international format
   * @param type $class for advanced developers. You can override the class \RealisticFaker\Generator to achieve custom results 
   * @return \RealisticFaker\Generator $faker - The faker object. Use it with $faker->firstName
   */
  public static function create($identifier = null, $langcode = Faker\Factory::DEFAULT_LOCALE, $class = "\RealisticFaker\Generator") {
    
    if($class)
    {
      $generator = new $class($identifier, $langcode);
    }
    else
    {
      $generator = new \RealisticFaker\Generator($identifier, $langcode);
    }
    
    //initializing the $defaultProviders NOW is important. If a provider is automatically added due to a request on a formatter like $faker->someStrangeFormatter
    //then the required provider (StrangeFormatterProvider) is loaded automatically. BUT: then the seed is broken. So, first add all providers and seed afterwards!
    foreach (static::$defaultProviders as $provider) {
      $providerClassName = self::getProviderClassname($provider, $langcode);
      $generator->addProvider(new $providerClassName($generator));
    }

    $generator->seed(crc32($identifier));
    return $generator;
  }

}
