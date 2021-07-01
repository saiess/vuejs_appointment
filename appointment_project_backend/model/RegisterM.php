<?php
require_once "connection.php";

class RegisterM
{

    static private $table = "user";

    // public function uniqidReal($lenght = 7)
    // {
    //     if (function_exists("random_bytes")) {
    //         $bytes = random_bytes(ceil($lenght / 2));
    //     } elseif (function_exists("openssl_random_pseudo_bytes")) {
    //         $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    //     } else {
    //         throw new Exception("no cryptographically secure random function available");
    //     }
    //     return substr(bin2hex($bytes), 0, $lenght);
    // }

    public function uniqidReal() {

        $token = md5(uniqid(rand(), true));
        return $token;
  
      }

    public function save($first_name, $last_name, $email, $phone, $age)
    {

        $db = new Connection();
        $reference  = $this->uniqidReal();
        $query = "INSERT INTO user(reference,first_name,last_name,email,phone,age) VALUES ('$reference','$first_name','$last_name','$email',$phone,$age)";
        // return $db->insert(self::$table, ["reference","first_name","last_name","email","phone","age"],[$reference,$first_name,$last_name,$email,$phone,$age]);

        $db->query($query);

        $db->execute();
        return $reference;
        // var_dump($stmt->errorInfo());
        //     return $db->execute();
        // echo $first_name;
    }

 
}
