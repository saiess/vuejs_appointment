<?php
require_once "model/RegisterM.php";


class registerController
{

	function index()
	{
        
	}

	function add()
	{
		// On récupère les informations envoyées
    	$data = json_decode(file_get_contents("php://input"));
        
    	$obj = new RegisterM();

		if(!empty($data))
		{
			$value = $obj->save($data->first_name,$data->last_name,$data->email,$data->phone,$data->age);

			// die(var_dump($value));
			
			if($value)
			{
            // Ici la création a fonctionné
            // On envoie un code 201
            http_response_code(201);
            echo json_encode(["message" => "L'ajout a été effectué".$value]);
	        }else
	        {
	            // Ici la création n'a pas fonctionné
	            // On envoie un code 503
	            http_response_code(503);
	            echo json_encode(["message" => "L'ajout n'a pas été effectué".$value]);         
	        }
		}else
		{
			// On gère l'erreur
		    http_response_code(405);
		    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
		}
	}

}