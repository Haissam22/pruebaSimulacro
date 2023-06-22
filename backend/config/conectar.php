<?php
    class Conexion
    {
        protected $dbCnx;

        public function conectar()
        {
            try {
                $conex=$this->dbCnx=new PDO("mysql:local=localhost;dbname=alquilartemis","root","");
                return $conex;
            } catch (Exception $th) {
                echo $th->getMessage();
            }
        }
    }
?>