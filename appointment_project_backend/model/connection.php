<?php

class Connection
{
   public $servername = 'localhost';
   public $username = 'root';
   public $dbname = 'appointment_project';
   public $password = '';
   public $sql;
   public $stmt;
   public $reference_id;


   function __construct()
   {
      try {
         $this->sql = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
      } catch (PDOException $e) {
         echo "connection failde: " . $e->getMessage();
      }
   }

   //    --------------------------------------select


   function query($stmt)
   {
      $this->stmt = $this->sql->prepare($stmt);
      return $this->stmt;
   }

   function execute()
   {
      return $this->stmt->execute();
   }

   function select($table)
   {
      $qry = "select * from " . $table;
      return $this->sql->query($qry)->fetchAll(PDO::FETCH_ASSOC);
   }

   function selectAppointment()
   {
      $qry = "SELECT * FROM `appointment` WHERE appointment.reference_id = ?";

      $stmt = $this->sql->prepare($qry);

      // Execute query
      $stmt->execute([$this->reference_id]);

      return $stmt;
   }

   //    --------------------------------------delete

   function delete($table, $id)
   {
      $qry = "delete from " . $table . " where id=" . $id;
      $this->stmt = $this->sql->prepare($qry);
   }

   //    --------------------------------------insert

   function insert($table, $tabName, $tabValue)
   {
      $name = "";
      $value = "";
      $vrg = "";
      for ($i = 0; $i < count($tabName); $i++) {
         if ($i > 0) {
            $vrg = ",";
         }

         $name .= $vrg . "`" . $tabName[$i] . "`";
      }

      $vrg = "";
      for ($i = 0; $i < count($tabValue); $i++) {
         if ($i > 0) {
            $vrg = ",";
         }
         $value .= $vrg . "'" . $tabValue[$i] . "'";
      }
      $qry = "INSERT INTO " . $table . " (" . $name . ") VALUES (" . $value . ")";

      if ($this->sql->query($qry)) {
         return true;
      }
      return false;
   }

   //    --------------------------------------update

   function update($table, $tabName, $tabValue, $id)
   {
      $name = "";
      $value = "";
      for ($i = 0; $i < count($tabName); $i++) {
         $vrg = "";
         if ($i > 0) {
            $vrg = ",";
         }
         $name .= $vrg . "`" . $tabName[$i] . "`='" . $tabValue[$i] . "'";
      }

      $qry = "UPDATE " . $table . " SET " . $name . " WHERE id=" . $id;
      $this->sql->query($qry);
   }

   //    --------------------------------------select

   function edit($table, $id)
   {
      $qry = "select * from " . $table . " where id=" . $id;
      return $this->sql->query($qry)->fetchAll()[0];
   }

   function selectById($table, $id)
   {
      $qry = "select * from " . $table . " where id=" . $id;
      return $this->sql->query($qry)->fetchAll()[0];
   }
}
