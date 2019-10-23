<?php

include("../classes/users.php");

class User_server {

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
            $user = new Users($_GET['id']);
            $user->id = $_GET['id'];
            $user->name = $_POST['name'];
            $user->birthday = $_POST['birthday'];
            $user->address = $_POST['address'];
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->credit = $_POST['credit'];
            $user->image = $_POST['image'];
            $user->update();
        } else if ($_POST['_method'] == 'delete') {
            $user = new Users($_GET['id']);
            $user->delete();
            $rest = new User_server;
            $rest->handle_response('Deleted', 400);
            // $response['data'] = 'Deleted';
            // $response['status'] = 'Bad Request';
            // $json_response = json_encode($response);
            // echo $json_response;
        }
    } else {
        //insert action
        $user = new Users;
        $user->name = $_POST['name'];
        $user->birthday = $_POST['birthday'];
        $user->address = $_POST['address'];
        $user->username = $_POST['username'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->credit = $_POST['credit'];
        $user->image = $_POST['image'];
        $user->id = $user->insert();

        if ($user->id > 0) {
            // $status=200;

            $response['data'] = array('user_id' => $user->id);
            $rest = new User_server;
            $rest->handle_response($response['data'], 200);

            // $response['status'] = 'OK';
            // $json_response = json_encode($response);
            // echo $json_response;
        }
    }


    //get user either with id or all
} else if ($_method == 'GET') {
    // get user with a specific id
    if (isset($_GET['id'])) {
        $user = new Users($_GET['id']);
        if (isset($user->id)) {
            $user = array('name' => $user->name,
              
            );
            $response['data'] = array('user' => $user);
            $rest = new User_server;
            $rest->handle_response($response['data'], 200);
            // $response['data']=array('user'=>$user);
            // $response['status'] = 'OK';
        } else {

            $response['data'] = 'user not found';
            $rest = new User_server;
            $rest->handle_response($response['data'], 400);

            // $response['data'] = 'user not found';
            // $response['status'] = 'Bad Request';
        }

        // $json_response = json_encode($response);
        // echo $json_response;
    } else {
        // get all users
        $user = new Users;
        $data = $user->users();
        if (count($data) > 0) {
            $response['data'] = $data;
            $rest = new User_server;
            $rest->handle_response($response['data'], 200);

            // $response['status']='OK';
            // $json_response = json_encode($response);
            // echo $json_response;
        }
    }
}
$url = "http://localhost" . $_SERVER['REQUEST_URI'];
?>