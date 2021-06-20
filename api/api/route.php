<?php

// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



$params=explode('/',$_GET['p']);
 

if (isset($_GET['p']) && !empty($_GET['p'])) 
{
	$controller=ucfirst($params[0])."Controller";
	if (file_exists("controller/".$controller.".php")) 
	{
		require_once __DIR__."/controller/".$controller.".php";

		$obj=new $controller();
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{

			$obj->index();

		}else if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			
		    	$obj->add();

		}else if ($_SERVER['REQUEST_METHOD'] == 'PUT') 
		{
			$obj->update();

		}else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') 
		{
			$obj->delete();
		}else  
		{
			echo "page not found";
			http_response_code(404);
		}
	}
}
?>