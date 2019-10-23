<?php
session_start();
ini_set("display_errors", 1);
// Front Controller ...

require_once 'config.php';

// Autoloading ...

set_include_path(get_include_path() . PS . CONTROLLERS_DIR . PS . MODELS_DIR . PS . LIBS_DIR);

//echo get_include_path();

function autoload($class) {
    require $class . '.php';
}

spl_autoload_register("autoload");


$db = new Database;
$mansDb = $db->con;

$router = new Router;
$router->load();

//$db->closeCon();
?>