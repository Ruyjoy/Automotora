<?php

class Database
{

    private $hostname = "localhost";
    private $database = "automotora";
    private $username = "root";

    function conectar()
    {
        $conexion = new mysqli($this->hostname, $this->username, "", $this->database);
        if(!$conexion){
           die ("Error en la conexión al servidor ");    
        }
        //echo "Conexion Exitosa";

        return $conexion;
    }

}
