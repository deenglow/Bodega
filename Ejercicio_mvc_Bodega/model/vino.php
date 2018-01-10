<?php


class Vino {
    private $table = "vinos";
    private $conexion;
    
    private $idVino;
    private $nombre;
    private $descripcion;
    private $anio;
    private $tipo;
    private $porcentajeAlcohol;
    private $bodega;
    
     function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    function getIdVino() {
        return $this->idVino;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getAnio() {
        return $this->anio;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getPorcentajeAlcohol() {
        return $this->porcentajeAlcohol;
    }

    function getBodega() {
        return $this->bodega;
    }

    function setIdVino($idVino) {
        $this->idVino = $idVino;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setAnio($anio) {
        $this->anio = $anio;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setPorcentajeAlcohol($porcentajeAlcohol) {
        $this->porcentajeAlcohol = $porcentajeAlcohol;
    }

    function setBodega($bodega) {
        $this->bodega = $bodega;
    }
 

    public function getAll($id){

        $consulta = $this->conexion->prepare("SELECT idVino, nombre, descripcion, anio, tipo, porcentajeAlcohol FROM " .$this->table. " WHERE idBodega = " . $id);
        $consulta->execute();
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetchAll();
        $this->conexion = null; //cierre de conexión
        return $resultados;

    }
    
    public function delete($id){
        $consulta = $this->conexion->prepare("DELETE FROM Vinos WHERE idVino = " . $id);
        $consulta->execute();
        $this->conexion = null; 

    }
}
