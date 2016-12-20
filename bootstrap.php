<?php

defined( 'DOCROOT') || define( 'DOCROOT', dirname( __FILE__));

spl_autoload_register( function( $className) {
  $result = true;
  $fileName = DOCROOT . DIRECTORY_SEPARATOR .
    preg_replace( '~\\\~', DIRECTORY_SEPARATOR, $className) . '.php';
  if( file_exists( $fileName )) {
  	require_once( $fileName );
  } else {
    $result = false;
  }
  return $result;
});

if( file_exists( DOCROOT.'/vendor/autoload.php' )) {
  require_once DOCROOT.'/vendor/autoload.php';
}
