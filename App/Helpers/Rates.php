<?php

namespace App\Helpers;

class RatesException extends \Exception {}

class Rates {

  protected static $currencies = [
    'rur', 'usd'
  ];

  /**
   * Возвращает курс
   *
   * @param string $to Нужная валюта
   * @param string $from Исходная валюта
   */
  public static function getRate( $to, $from = 'usd') {
    $to = strtolower( $to );
    if( ! in_array( $to, self::$currencies)) {
      throw new RatesException( "Неверная валюта: {$to}");
    }
    $from = strtolower( $from );
    if( ! in_array( $from, self::$currencies)) {
      throw new RatesException( "Неверная валюта: {$from}");
    }
    $method = 'getRate' . ucfirst( $to ) . ucfirst( $from );
    if( ! method_exists( get_class(), $method )) {
      throw new RatesException( "Курс неопределен: {$method}");
    }
    return self::$method();
  }

  protected static function getRateRurUsd() {
    return 65.0;
  }

}