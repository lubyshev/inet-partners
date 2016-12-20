<?php

namespace App\Ad\Interfaces;

use App\Interfaces\ILogger;

interface IAdData {

  /**
   * Возвращает стоимость объявления
   */
  public function cost();

  /**
   * Возвращает ID объявления
   */
  public function id();

  /**
   * Пишет в лог факт обращения
   *
   * @param \App\Interfaces\ILogger $logger Экземпляр логгера
   */
  public function log( ILogger $logger );

  /**
   * Возвращает название объявления
   */
  public function name();

  /**
   * Функция инициализации
   *
   * @param int $id ID объявления
   */
  public function init( $id );

  /**
   * Возвращает текст объявления
   */
  public function text();

}
