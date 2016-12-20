<?php

ini_set('display_errors', 'On');
error_reporting( E_ALL );

require_once './bootstrap.php';

use App\Ad\Ad;
use App\Helpers\Rates;

class ExternLogger implements App\Interfaces\ILogger {
  public function log( $message ) {
    return $message;
  }
}

$type = isset( $_GET ['from']) ? strtolower( $_GET ['from'] ) : null;
$id = isset( $_GET ['id']) ? (int) $_GET ['id'] : null;

/* @var $ad \App\Ad\Interfaces\IAdData */
$ad = Ad::factory( $type, $id );
$logMessage = 'Ничего не записано';
if( isset( $_GET ['log']) && $ad ) {
  $logger = new ExternLogger();
  $logMessage = $ad->log( $logger );
}

?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Тест</title>
</head>
<body>
<nav>
<ul>
  <li><a href="/">Home</a></li>
  <li><a href="/?id=1&from=Mysql">Mysql</a></li>
  <li><a href="/?id=1&from=Mysql&log=1">Mysql + Log</a></li>
  <li><a href="/?id=1&from=Daemon">Daemon</a></li>
  <li><a href="/?id=1&from=Daemon&log=1">Daemon + Log</a></li>
</ul>
</nav>
    <h1><?= $ad ? $ad->name() : 'Home'?></h1>
<?php if($ad) : ?>
    <p><?= $ad->text() ?></p>
    <p>стоимость: <?= $ad->cost() * Rates::getRate('rur') ?> руб</p>
    <h2>Логгирование:</h2>
    <p><?= $logMessage ?></p>
<?php endif;?>
</body>
</html>
