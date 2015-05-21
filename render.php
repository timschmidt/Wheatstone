#!/bin/php
<?php include "vendor/autoload.php";

$config = new \Thyyppa\Wheatstone\Config\AppConfig();

$app = new Symfony\Component\Console\Application( $config->name, $config->version );

foreach ( [
              'Thyyppa\\Wheatstone\\Command\\RenderCommand'
          ] as $command ) {

    $app->add( new $command );

}


$app->run();
