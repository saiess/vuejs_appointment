<?php
require_once "connection.php";

class AppointmentModel
{

    public static $table = 'appointment';

    // static private $table = "user";

    public function getAll($ref)
    {
        $obj = new Connection;
        $obj->reference_id = $ref;
        return $obj->selectAppointment()->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getSingle($id)
    {
        $obj = new Connection;
        $query = "SELECT * FROM appointment WHERE id_meeting=$id";
        $stmt = $obj->query($query);
        $obj->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // saving parte
    
    public function save($date, $time, $consultation, $reference_id)
    {

        $db = new Connection();
        $query = "INSERT INTO appointment(date_app,time_app,consultation,reference_id) VALUES ('$date','$time','$consultation','$reference_id')";
        // return $db->insert(self::$table, ["reference","first_name","last_name","email","phone","age"],[$reference,$first_name,$last_name,$email,$phone,$age]);

        $stmt = $db->query($query);


        // die(var_dump($stmt));
        if ($db->execute())
            return true;
        return false;
    }

    // delete parte

    public function delete($id)
    {

        $db = new Connection();
        $query = "DELETE FROM appointment WHERE id_meeting = '$id'";
        // return $db->insert(self::$table, ["reference","first_name","last_name","email","phone","age"],[$reference,$first_name,$last_name,$email,$phone,$age]);

        $stmt = $db->query($query);


        // die(var_dump($stmt));
        if ($db->execute())
            return true;
        return false;
    }


    // update parte

    public function update($id, $date, $time, $consultation, $reference_id)
    {

        $db = new Connection();
        $query = "UPDATE appointment SET date_app = '$date', time_app = '$time', consultation = '$consultation', reference_id = '$reference_id' WHERE id_meeting = $id";
        // return $db->insert(self::$table, ["reference","first_name","last_name","email","phone","age"],[$reference,$first_name,$last_name,$email,$phone,$age]);

        $stmt = $db->query($query);

        // die(var_dump($stmt));
        if ($db->execute())
            return true;
        return false;
    }

    public function sendId(){
        $db = new Connection();
    }
}
