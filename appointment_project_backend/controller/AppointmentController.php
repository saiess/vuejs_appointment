<?php
require_once "model/AppointmentModel.php";


class AppointmentController
{
	



	function add()
	{
		// On récupère les informations envoyées
		$data = json_decode(file_get_contents("php://input"));


		// die(var_dump($data));
		$obj = new AppointmentModel();

		if (!empty($data)) {
			$value = $obj->save($data->date, $data->time, $data->consultation, $data->reference_id);

			// die(var_dump($value));

			if ($value == true) {
				// Ici la création a fonctionné
				// On envoie un code 201
				http_response_code(201);
				echo json_encode(["message" => "L'ajout a été effectué" . $value]);
			} else {
				// Ici la création n'a pas fonctionné
				// On envoie un code 503
				http_response_code(503);
				echo json_encode(["message" => "L'ajout n'a pas été effectué" . $value]);
			}
		} else {
			// On gère l'erreur
			http_response_code(405);
			echo json_encode(["message" => "La méthode n'est pas autorisée"]);
		}
	}

	function delete($ref)
	{

		// die(var_dump($data));
		$obj = new AppointmentModel();
		if (!empty($ref)) {
			$value = $obj->delete($ref);

			// die(var_dump($value));

			if ($value == true) {
				// Ici la création a fonctionné
				// On envoie un code 201
				http_response_code(201);
				echo json_encode(["message" => "suppression a été effectué" . $value]);
			} else {
				// Ici la création n'a pas fonctionné
				// On envoie un code 503
				http_response_code(503);
				echo json_encode(["message" => "suppression n'a pas été effectué" . $value]);
			}
		} else {
			// On gère l'erreur
			http_response_code(405);
			echo json_encode(["message" => "La méthode n'est pas autorisée"]);
		}
	}

	function update()
	{
		$data = json_decode(file_get_contents("php://input"));

		// die(var_dump($data));
		$obj = new AppointmentModel();

		if (!empty($data)) {

			$value = $obj->update($data->id, $data->date, $data->time, $data->consultation, $data->reference_id);
			echo ($value);

			// die(var_dump($value));

			if ($value == true) {
				// Ici la création a fonctionné
				// On envoie un code 201
				http_response_code(201);
				echo json_encode(["message" => "mise à jour a été effectué" . $value]);
			} else {
				// Ici la création n'a pas fonctionné
				// On envoie un code 503
				http_response_code(503);
				echo json_encode(["message" => "mise à jour n'a pas été effectué" . $value]);
			}
		} else {
			// On gère l'erreur
			http_response_code(405);
			echo json_encode(["message" => "La méthode n'est pas autorisée"]);
		}
	}

	function getSingle(){
		$obj = new AppointmentModel();
		$data = json_decode(file_get_contents("php://input"));
		if($obj->getSingle($data->id))
			echo json_encode([$obj->getSingle($data->id)]);
	}

	 function read(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $obj = new AppointmentModel();
            // file_get_contents()     THIS function per default receives data as POST method 
            $data = json_decode(file_get_contents("php://input"));

		
            

            if ($obj->read($data)->rowCount() > 0)
                echo json_encode($obj->read($data)->fetchAll(PDO::FETCH_ASSOC));
        }
        else
        {
            echo json_encode(["error" =>"use POST method"]);
        }

    }
}
