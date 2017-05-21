<?php

// load application config (error reporting etc.)
require APP . 'config/config.php';

// FOR DEVELOPMENT: this loads PDO-debug, a simple function that shows the SQL query (when using PDO).
// If you want to load pdoDebug via Composer, then have a look here: https://github.com/panique/pdo-debug
require APP . 'libs/helper.php';

function autoload_core($class) {

    $f = APP . 'core/' . $class . '.php';
    if ( ! file_exists($f))
    {
        return FALSE;
    }
    include $f;

}

spl_autoload_register('autoload_core');



function autoload_libs($class) {
    
    $f = APP .'libs/' . $class . '.php';
    if ( ! file_exists($f))
    {
        return FALSE;
    }
    include $f;
}

spl_autoload_register('autoload_libs');


function autoload_controller($class) {
    
    $f = APP . 'controller/' . $class . '.php';
    if ( ! file_exists($f))
    {
        return FALSE;
    }
    include $f;
}

spl_autoload_register('autoload_controller');



function autoload_foundation($class) {

    $f = APP.'foundation/' . $class . '.php';
    if ( ! file_exists($f))
    {
        return FALSE;
    }
    include $f;
}

spl_autoload_register('autoload_foundation');

function autoload_model($class) {

    $f = APP.'model/' . $class . '.php';
    if ( ! file_exists($f))
    {
        return FALSE;
    }
    include $f;
}


spl_autoload_register('autoload_model');

function autoload_view($class) {

    $f = APP.'view/' . $class . '.php';
    if ( ! file_exists($f))
    {
        echo("NONONO");
        return FALSE;
    }
    include $f;
}

spl_autoload_register('autoload_view');


