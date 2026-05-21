<?php

    class Conexion {
        private $host = "localhost";
        private $db = "clinica";
        private $user = "root";
        private $pass = "";

        public function conectar(){
            $conexion = new mysqli($this->host, $this->user, $this->pass, $this->db);

            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            return $conexion;   
        }

        /**
         * @param mixed $conexion
         */
        public function desconectar($conexion){
            $conexion->close();
        }

        public function ejecutarConsulta($sql){
            $conexion = $this->conectar();
            $resultado = $conexion->query($sql);
            $this->desconectar($conexion);
            return $resultado;
        }


    }