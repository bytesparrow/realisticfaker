<?php

namespace RealisticFaker;

/**
 * This dummyclass extends the original \Faker\Provider\Internet class.
 * It's used to execute protected functions.
 *
 * @author Bernhard Strehl
 */
class InternetProtectedMethodThief extends \Faker\Provider\Internet {
  public function callProtected($function_name, $arguments) {
    return call_user_func_array(array($this, $function_name), $arguments);
  }
}
