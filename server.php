<?php

ini_set("display_errors", 1);
require_once 'config.php';
set_include_path(get_include_path() . PS . CONTROLLERS_DIR . PS . MODELS_DIR . PS . LIBS_DIR);

function autoload($class) {
    require $class . '.php';
}

spl_autoload_register("autoload");

$db = new Database;
$mansDb = $db->con;

//$router = new Router;
//$router->load();
$CLASS = CLASS_OBJECT;

class server {

    public static $HTTP_STATUS_CODE = array(
        200 => 'OK',
        400 => 'Bad request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not Found',
    );

    public function handle_response($data, $code) {
        $response = array();
        $response['data'] = $data;
        $response['status'] = self::$HTTP_STATUS_CODE[$code];
        header("Content-Type:application/json");
        header("HTTP:/1.1 $code self::HTTP_STATUS_CODE[$code]");
        echo json_encode($response);
        die();
    }

}

$_method = $_SERVER['REQUEST_METHOD'];


if ($_method == 'POST') {

    if (isset($_POST['_method'])) {

        if ($_POST['_method'] == 'put') {
//            $Object = new $CLASS($_GET['id']);

            $Object = new $CLASS;
            $Object->id = $_GET['id'];
            $Object->list_data_id();

            foreach ($Object->fields2 as $column) {
                $Object->$column = $_POST[$column];
            }

            $reslut = $Object->update_data();


            if ($reslut) {
                $response['data'] = array('update' => $reslut);
                $rest = new server;
                $rest->handle_response($response['data'], 200);
            }
        } else if ($_POST['_method'] == 'delete') {
//            $Object = new $CLASS($_GET['id']);
            $Object = new $CLASS;
            $Object->id = $_GET['id'];
            $Object->list_data_id();

            $Object->delete_data();
            $rest = new server;
            $rest->handle_response('Deleted', 400);
            // $response['data'] = 'Deleted';
            // $response['status'] = 'Bad Request';
            // $json_response = json_encode($response);
            // echo $json_response;
        }
    } else {
        //insert action
        $Object = new $CLASS;
        foreach ($Object->fields2 as $column) {
            $Object->$column = $_POST[$column];
        }

        $reslut = $Object->insert_data();
        if ($reslut) {
            // $status=200;

            $response['data'] = array('insert' => $reslut);
            $rest = new server;
            $rest->handle_response($response['data'], 200);

            // $response['status'] = 'OK';
            // $json_response = json_encode($response);
            // echo $json_response;
        }
    }


    //get data either with id or all
} else if ($_method == 'GET') {

    // get data with a specific id
    if (isset($_GET['id'])) {

//        $Object = new $CLASS($_GET['id']);

        $Object = new $CLASS;
        $Object->id = $_GET['id'];
        $Object->list_data_id();

//        var_dump($Object);
        if (isset($Object->id)) {
//            $cours = $cours->get_columns_array();

            $response['data'] = array('Object' => $Object);
            $rest = new server;
            $rest->handle_response($response['data'], 200);
        } else {
//         var_dump($_GET['id/?']);
            $response['data'] = 'data not found';
            $rest = new server;
            $rest->handle_response($response['data'], 400);

            // $response['data'] = 'data not found';
            // $response['status'] = 'Bad Request';
        }
    } else {

        // get all 

        $Object = new $CLASS;
        $data = $Object->list_data();
        if (count($data) > 0) {
            $response['data'] = $data;
            $rest = new server;
            $rest->handle_response($response['data'], 200);

            // $response['status']='OK';
            // $json_response = json_encode($response);
            // echo $json_response;
        }
    }
}

$url = "http://localhost" . $_SERVER['REQUEST_URI'];
?>