<?php

namespace App\Ad;

abstract class Ad {

  protected static $adTypes = [
    'mysql' => '\App\Ad\MysqlAd',
    'daemon' => '\App\Ad\DaemonAd',
  ];

  /**
   * Фабрика классов
   *
   * @param string $adType Тип объявления
   * @param int $id ID объявления
   * @return type
   * @throws AdException
   */
  public static function factory( $adType, $id ) {
    $result = null;
    if( isset( self::$adTypes [$adType])) {
      $result = new self::$adTypes [$adType] ($id);
    }
    return $result;
  }

}