<?php
require_once "model/LoginModel.php";


class LoginController
{

    function index($ref)
	{
        // $data = json_decode(file_g+_contents("php://input"));
        $obj = new LoginModel();

        
        if($obj->chechRef($ref) == true)
        {
            echo json_encode(['success'=>"reference found"]);
        }
        else
        {
            echo json_encode(['error'=>'reference not found']);
        }
    }

}