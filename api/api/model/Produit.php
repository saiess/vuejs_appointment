<?php
require_once "connection.php";

class Produit
{
	public $name;
	static private $table="produits";

	function __construct()
	{
		$this->db = new Connection();
	}
	/**
	 * getAll
	 * 
	 **/
	static function getAll()
	{
		$db = new Connection();
		return $db->select(self::$table);
	}

	function save()
	{
		
		return $this->db->insert(self::$table,["name"], [$this->name]);
	}

}