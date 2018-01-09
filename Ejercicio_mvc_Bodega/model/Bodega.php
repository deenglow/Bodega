<?php


class Bodega {
    private $table = "bodegas";
    private $conexion;
    
    private $idBodega;
    private $direccion;
    private $nombre;
    private $email;
    private $telefono;
    private $nombreContacto;
    private $fechaFundacion;
    private $hasRestaurante;
    private $hasHotel;        
    
    function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    function getIdBodega() {
        return $this->idBodega;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getNombreContacto() {
        return $this->nombreContacto;
    }

    function getFechaFundacion() {
        return $this->fechaFundacion;
    }

    function getHasRestaurante() {
        return $this->hasRestaurante;
    }

    function getHasHotel() {
        return $this->hasHotel;
    }

    function setIdBodega($idBodega) {
        $this->idBodega = $idBodega;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setNombreContacto($nombreContacto) {
        $this->nombreContacto = $nombreContacto;
    }

    function setFechaFundacion($fechaFundacion) {
        $this->fechaFundacion = $fechaFundacion;
    }

    function setHasRestaurante($hasRestaurante) {
        $this->hasRestaurante = $hasRestaurante;
    }

    function setHasHotel($hasHotel) {
        $this->hasHotel = $hasHotel;
    }

    
     public function getAll(){

        $consulta = $this->conexion->prepare("SELECT idBodega, direccion, nombre, email, telefono, nombreContacto, fechaFundacion, hasRestaurante, hasHotel FROM  " . $this->table);
        $consulta->execute();
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetchAll();
        $this->conexion = null; //cierre de conexión
        return $resultados;

    }

    
}
