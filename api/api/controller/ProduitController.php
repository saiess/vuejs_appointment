<?php
require_once "model/Produit.php";
class ProduitController
{

	function index()
	{
		$produits=Produit::getAll();
		// On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($produits);
	}

	function add()
	{
		// On récupère les informations envoyées
    	$data = json_decode(file_get_contents("php://input"));

    	$produit=new Produit();

		if(!empty($data->name))
		{
			$produit->name=$data->name;
			$value=$produit->save();
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

	function update()
	{
		echo "update";
	}

	function delete()
	{
		echo "delete";
	}
}