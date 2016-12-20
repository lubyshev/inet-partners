<?php

namespace App\Ad;

use App\Ad\Interfaces\IAdData;
use App\Interfaces\ILogger;

abstract class AdAbstract implements IAdData {

  protected $adData;

  /**
   * Конструктор
   *
   * @param int $id ID объявления
   *
   */
  public function __construct( $id ) {
    $this->init( $id );
  }

  /**
   * Возвращает стоимость объявления
   */
  public function cost() {
    return isset( $this->adData ['cost'] ) ? $this->adData ['cost'] : null;
  }

  /**
   * Возвращает ID объявления
   */
  public function id() {
    return isset( $this->adData ['id'] ) ? $this->adData ['id'] : null;
  }

  /**
   * Функция инициализации
   *
   * @param int $id ID объявления
   */
  abstract public function init( $id );

  /**
   * Пишет в лог факт обращения
   *
   * @param \App\Interfaces\ILogger $logger Экземпляр логгера
   */
  abstract public function log( ILogger $logger );

  /**
   * Возвращает название объявления
   */
  public function name() {
    return isset( $this->adData ['name'] ) ? $this->adData ['name'] : null;
  }

  /**
   * Возвращает текст объявления
   */
  public function text() {
    return isset( $this->adData ['text'] ) ? $this->adData ['text'] : null;
  }

}