<?php

namespace App\Interfaces;

interface ILogger {

  /**
   * Log message
   *
   * @param string $message
   */
  public function log( $message );
}
