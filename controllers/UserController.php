<?php

// Actions ...
class UserController
{

    function addUserAction()
    {

        if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
            // store data in database ...

            $JazenetRegistrationModel = new JazenetRegistration;
            $additionWere = "AND group_id = 1";

            if (isset($_FILES['image'])) {
                $path = $this->uploadImage($_FILES['image']);
                $additionWere = "AND group_id = 1";
                $this->updateMetaValue($JazenetRegistrationModel,$path,'logo_url',$additionWere);
            }


            foreach ($_POST as $key=>$value)
            {
                if(in_array($key,$JazenetRegistrationModel->meta_key_DB)){
                    $this->updateMetaValue($JazenetRegistrationModel,$value,$key,$additionWere);
                }
            }

            echo  json_encode([
                'status' => 'Success',
                'message' => "done",
                ]);


        } else {
//            $UserModel = new User;
//            $UserModel->insert_data();
            require "views/user/addUser.php";
        }
    }

    function uploadImage($image_object)
    {
        if (isset($image_object)) {
            $errors = array();
            $file_name = $image_object['name'];
            $file_size = $image_object['size'];
            $file_tmp = $image_object['tmp_name'];
            $file_type = $image_object['type'];
            $ext = explode('.', $image_object['name']);
            $ext = end($ext);
            $file_ext = strtolower($ext);
            $expensions = array("jpeg", "jpg", "png");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, CDN . DS . "images" . DS . $file_name);
                return CDN . DS . "images" . DS . $file_name;
            } else {
                print_r($errors);
            }
        }
    }

    function updateMetaValue($object,$meta_value,$meta_key_value,$additionWere)
    {
        $object->meta_value = $meta_value;
        $object->meta_key_value = $meta_key_value;
        $object->update_data_with_meta($additionWere);

    }

    function listUserAction()
    {
        // Step#1 get|insert data in|from model ..
        $UserModel = new JazenetRegistration;
        $additionWere = "where group_id = 1";

        $result = $UserModel->list_data($additionWere);

        // Step#2 display result in certain view ..
        include "views/user/listUser.php";
    }


}
