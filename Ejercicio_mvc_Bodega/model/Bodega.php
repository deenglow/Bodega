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
        $resultados = $consulta->fetchAll();
        $this->conexion = null; 
        return $resultados;

    }

    public function save(){

        $consulta = $this->conexion->prepare("INSERT INTO bodegas (direccion, nombre, email, telefono, nombreContacto, fechaFundacion, hasRestaurante, hasHotel)
                                        VALUES (:direccion, :nombre,:email,:telefono, :nombreContacto, :fechaFundacion, :hasRestaurante, :hasHotel)");
        $save = $consulta->execute(array(
            "direccion" => $this->direccion,
            "nombre" => $this->nombre,
            "email" => $this->email,
            "telefono" => $this->telefono,
            "nombreContacto" => $this->nombreContacto,
            "fechaFundacion" => $this->fechaFundacion,
            "hasRestaurante" => $this->hasRestaurante,
            "hasHotel" => $this->hasHotel
        ));
        $this->conexion = null;

        return $save;
    }
    
    public function delete($id){
        $consulta = $this->conexion->prepare("DELETE FROM bodegas WHERE idBodega = " . $id);
        $consulta->execute();
        $this->conexion = null; 

    }
    
     public function getBodega($id){
        $consulta = $this->conexion->prepare("SELECT idBodega, direccion, nombre, email, telefono, nombreContacto, fechaFundacion, hasRestaurante, hasHotel FROM  " . $this->table ." WHERE idBodega = " . $id );
        $consulta->execute();
        $resultados = $consulta->fetchObject();
        $this->conexion = null;
        return $resultados;

    }
    
    public function actualizar() {
        $consulta = $this->conexion->prepare("UPDATE bodegas SET direccion = :dir, nombre = :nom, email = :ema, telefono = :tel, nombreContacto = :nomConta, fechaFundacion = :fechFun, hasRestaurante = :hRest, hasHotel = :hHot WHERE idBodega = " . $this->idBodega);
        $actualizar = $consulta->execute(array(
            "dir" => $this->direccion,
            "nom" => $this->nombre,
            "ema" => $this->email,
            "tel" => $this->telefono,
            "nomConta" => $this->nombreContacto,
            "fechFun" => $this->fechaFundacion,
            "hRest" => $this->hasRestaurante,
            "hHot" => $this->hasHotel
        ));
        
        $this->conexion = null;
        
        return $actualizar;
    }
    
}
