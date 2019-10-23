<?php

class Router {

    public function load() {
        ini_set("display_errors", 1);
        //productController/add_product
        $path = $_GET['r'];
        $parts = explode("/", $path);

        if (count($parts) == 2) {
            if (is_readable(CONTROLLERS_DIR . DS . $parts[0] . '.php')) {
                $controller = new $parts[0];
                // to check if function exists in controller class ..
                if (is_callable($parts[0], $parts[1])) {
                    // call action in certain controller ..

                    $controller->{$parts[1]}();
                } else {
                    throw new Exception("Function not Found!!");
                }
            } else {
                // throw new Exception("Controller not Found!!");
                echo "string";
            }
        }
    }

}
