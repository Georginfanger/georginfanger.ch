<?php
// This file generated by Propel 1.6.9 convert-conf target
// from XML runtime conf file /Users/georginfanger/Sites/georginfanger/runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'georginfanger' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=127.0.0.1;dbname=georginfanger',
        'user' => 'root',
        'password' => 'igjmma',
      ),
    ),
    'default' => 'georginfanger',
  ),
  'generator_version' => '1.6.9',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-georginfanger-conf.php');
return $conf;