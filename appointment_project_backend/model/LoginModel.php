<?php
require_once "connection.php";

class LoginModel
{


    public $table = 'user';

    public function chechRef($ref)
    {
        $db = new Connection();
        $query = "SELECT reference FROM $this->table WHERE reference='$ref'";

        $stmt = $db->query($query);

        $db->execute();
        if($stmt->rowCount() > 0)
            return true;
        return false;
    }
}
