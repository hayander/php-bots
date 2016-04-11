<?php

    /*
     * PHP Bot entry point
     * hayander
     * 2016-04-11
     */

    try {

        require 'src/Loader.php';

        spl_autoload_register( 'Loader::load' );

        if (file_exists( __DIR__ . '/config.php' )) {
            $config = include_once( __DIR__ . '/config.php' );
        }

        $bot = new Library\IRC\Core;
        $bot->connect();
    } catch (Exception $e) {
        echo( 'FATAL ERROR: ' . $e->getMessage() . PHP_EOL );
    }
