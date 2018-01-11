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
    private $idBodega;
    
    
    function getIdBodega() {
        return $this->idBodega;
    }

    function setIdBodega($idBodega) {
        $this->idBodega = $idBodega;
    }

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

    
 

    public function getAll($id){

        $consulta = $this->conexion->prepare("SELECT idVino, nombre, descripcion, anio, tipo, porcentajeAlcohol FROM " .$this->table. " WHERE idBodega = " . $id);
        $consulta->execute();
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetchAll();
        $this->conexion = null; //cierre de conexión
        return $resultados;

    }
    
    public function getVinoById($id){

        $consulta = $this->conexion->prepare("SELECT  nombre, descripcion, anio, tipo, porcentajeAlcohol, idBodega FROM " .$this->table. " WHERE idVino = " . $id);
        $consulta->execute();
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetchObject();
        $this->conexion = null; //cierre de conexión
        return $resultados;

    }
    
     public function save(){

        $consulta = $this->conexion->prepare("INSERT INTO vinos (nombre, descripcion, anio, tipo, porcentajeAlcohol, idBodega)
                                        VALUES (:nombre, :descripcion, :anio, :tipo, :porcentajeAlcohol, :idBodega)");
        
        $bode=$this->Bodega;
        
        
        $save = $consulta->execute(array(
            "nombre" => $this->nombre,
            "descripcion" => $this->descripcion,
            "anio" => $this->anio,
            "tipo" => $this->tipo,
            "porcentajeAlcohol" => $this->porcentajeAlcohol,
            "idBodega" => $this->idBodega
        ));
        $this->conexion = null;

        return $save;
    }
    
    public function delete($id){
        $consulta = $this->conexion->prepare("DELETE FROM Vinos WHERE idVino = " . $id);
        $consulta->execute();
        $this->conexion = null; 

    }
    
        public function actualizar() {
        $consulta = $this->conexion->prepare("UPDATE vinos SET  nombre = :nombre, descripcion = :descripcion, anio = :anio, tipo = :tipo, porcentajeAlcohol = :porcentajeAlcohol WHERE idBodega = " . $this->idVino);
        $actualizar = $consulta->execute(array(
            "nombre" => $this->nombre,
            "descripcion" => $this->descripcion,
            "anio" => $this->anio,
            "tipo" => $this->tipo,
            "porcentajeAlcohol" => $this->porcentajeAlcohol
        ));
        
        $this->conexion = null;
        
        return $actualizar;
    }
}
