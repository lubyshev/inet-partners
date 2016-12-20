<?php

namespace App\Ad;

use App\Ad\Interfaces\IAdData;
use App\Interfaces\ILogger;

class MysqlAd extends AdAbstract {

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
   * Функция инициализации
   *
   * @param int $id ID объявления
   */
  public function init( $id ) {
    $data = getAdRecord( (int) $id);
    $this->adData ['id'] = $data ['id'];
    $this->adData ['cost'] = $data ['price'];
    $this->adData ['keywords'] = $data ['keywords'];
    $this->adData ['name'] = $data ['name'];
    $this->adData ['text'] = $data ['text'];
  }

  /**
   * Возвращает keywords
   */
  public function keywords() {
    return isset( $this->adData ['keywords'] ) ? $this->adData ['keywords'] : null;
  }

  /**
   * Пишет в лог факт обращения
   *
   * @param \App\Interfaces\ILogger $logger Экземпляр логгера
   */
  public function log( ILogger $logger ) {
    return 'Записано в лог: ' . $logger->log(
      date('Y:m:d H:i:s') . ' ' .
      'getAdRecord( ' . $this->id() . ')'
    );
  }

}