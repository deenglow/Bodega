<?php
class BodegasController{
    
    private $conectar;
    private $conexion;

    public function __construct() {
		require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/Bodega.php";
        
        $this->conectar=new Conectar();
        $this->conexion=$this->conectar->conexion();

    }
    
    public function run($accion){
        switch($accion)
        { 
            case "index" :
                $this->index();
                break;
            case "detalleCrearBodega" :
                $this->detalleCrearBodega();
                break;
            case "detalleBodega" :
                $this->detalleBodega();
                break;
            case "alta" :
                $this->crear();
                break;
            case "actualizar" :
                $this->actualizar();
                break;
            case "delete" :
                $this->delete();
                break;
            default:
                $this->index();
                break;
        }
    }
    

    public function index(){
        
        $bodega=new Bodega($this->conexion);
        
        $bodegas=$bodega->getAll();
       
        $this->view("index",array(
            "bodegas"=>$bodegas,
            "titulo" => "BODEGA"
        ));
    }

    public function detalleCrearBodega(){
        if(!isset($_GET["detalleCrearBodega"])){
            
            $this->view("detalleCrearBodega",null);
            

        }
        
    }
    
    public function detalleBodega(){
       if(!isset($_GET["detalleBodega"])){
           
            include './model/Vino.php';

            $bodega=new Bodega($this->conexion);
            $vino=new Vino($this->conexion);
            
            $bodegaSeleccionada=$bodega->getBodega($_GET["id"]);
            $listaVinos=$vino->getAll($_GET["id"]);

            $this->view("detalleBodega",array(
                "bodega"=>$bodegaSeleccionada,
                "vinos"=>$listaVinos,
                "titulo" => "INFO BODEGA"
            ));
            

        }
        
    }

    public function crear(){
        if(isset($_POST["direccion"])){
            $bodega=new Bodega($this->conexion);
            $bodega->setDireccion($_POST["direccion"]);
            $bodega->setNombre($_POST["nombre"]);
            $bodega->setEmail($_POST["email"]);
            $bodega->setTelefono($_POST["telefono"]);
            $bodega->setNombreContacto($_POST["nombrePersonaContacto"]);
            $bodega->setFechaFundacion($_POST["fechaFundacion"]);
            $bodega->setHasRestaurante($_POST["hasRestaurante"]);
            $bodega->setHasHotel($_POST["hasHotel"]);
            $save=$bodega->save();
        }
        header('Location: index.php');
    }
   
    public function actualizar(){
        if(!isset($_GET["actualizar"])){          
            $bodega=new Bodega($this->conexion);
            $bodega->setIdBodega($_GET["id"]);
            $bodega->setDireccion($_POST["direccion"]);
            $bodega->setNombre($_POST["nombre"]);
            $bodega->setEmail($_POST["email"]);
            $bodega->setTelefono($_POST["telefono"]);
            $bodega->setNombreContacto($_POST["nombrePersonaContacto"]);
            $bodega->setFechaFundacion($_POST["fechaFundacion"]);
            $bodega->setHasRestaurante($_POST["hasRestaurante"]);
            $bodega->setHasHotel($_POST["hasHotel"]);
            $actualizar=$bodega->actualizar();

            header('Location: index.php?controller=bodegas&action=detalleBodega&id='.$bodega->getIdBodega());

        }
        

    }

    public function delete (){
        if(!isset($_GET["delete"])){
            $bodega=new Bodega($this->conexion);
            $bodega->delete($_GET["id"]);
        }

        header('Location: index.php');
    }
    
    public function view($vista,$datos){
        $data = $datos;  
        require_once  __DIR__ . "/../view/" . $vista . "View.php";

    }

}
?>
