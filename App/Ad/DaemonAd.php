<?php

namespace App\Ad;

use App\Ad\Interfaces\IAdData;
use App\Interfaces\ILogger;

class DaemonAd extends AdAbstract {

  /**
   * Конструктор
   *
   * @param int $id ID объявления
   *
   */
  public function __construct( $id ) {
    require_once DOCROOT . DIRECTORY_SEPARATOR . 'functions.php';
    parent::__construct( $id );
  }

  /**
   * Возвращает ID кампании
   */
  public function campaignId() {
    return isset( $this->adData ['campaignId'] ) ? $this->adData ['campaignId'] : null;
  }

  /**
   * Функция инициализации
   *
   * @param int $id ID объявления
   */
  public function init( $id ) {
    $data = get_deamon_ad_info( $id );
    $matches = [];
    if(  preg_match_all( '~(.+?)(\t|$)~', $data, $matches)
      && 6 === count( $matches [1] )) {
      $this->adData ['id'] = $matches [1] [0];
      $this->adData ['campaignId'] = $matches [1] [1];
      $this->adData ['userId'] = $matches [1] [2];
      $this->adData ['name'] = $matches [1] [3];
      $this->adData ['text'] = $matches [1] [4];
      $this->adData ['cost'] = $matches [1] [5];
    }
  }

  /**
   * Пишет в лог факт обращения
   *
   * @param \App\Interfaces\ILogger $logger Экземпляр логгера
   */
  public function log( ILogger $logger ) {
    return 'Записано в лог: ' . $logger->log(
      date('Y:m:d H:i:s') . ' ' .
      'get_deamon_ad_info( ' . $this->id() . ')'
    );
  }


  /**
   * Возвращает ID пользователя
   */
  public function userId() {
    return isset( $this->adData ['userId'] ) ? $this->adData ['userId'] : null;
  }

}