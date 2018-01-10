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

   /**
    * Ejecuta la acción correspondiente.
    *
    */
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
    
   /**
    * Carga la página principal de empleados con la lista de
    * empleados que consigue del modelo.
    *
    */ 
    public function index(){
        
        //Creamos el objeto empleado
        $bodega=new Bodega($this->conexion);
        
        //Conseguimos todos los empleados
        $bodegas=$bodega->getAll();
       
        //Cargamos la vista index y le pasamos valores
        $this->view("index",array(
            "bodegas"=>$bodegas,
            "titulo" => "BODEGA"
        ));
    }


    //CARGA LA VISTA DETALLE
     public function detalleCrearBodega(){
        if(!isset($_GET["detalleCrearBodega"])){
            
            //Cargamos la vista index y le pasamos valores
            $this->view("detalleCrearBodega",null);
            

        }
        
    }
    
    public function detalleBodega(){
       if(!isset($_GET["detalleBodega"])){
            //Creamos el objeto empleado
            $bodega=new Bodega($this->conexion);
        
            //Conseguimos todos los empleados
            $bodegaSeleccionada=$bodega->getBodega($_GET["id"]);

            //Cargamos la vista index y le pasamos valores
            $this->view("detalleBodega",array(
                "bodega"=>$bodegaSeleccionada,
                "titulo" => "INFO BODEGA"
            ));
            

        }
        
    }

    
   /**
    * Crea un nuevo empleado a partir de los parámetros POST 
    * y vuelve a cargar el index.php.
    *
    */
    public function crear(){
        if(isset($_POST["direccion"])){
            //Creamos un usuario
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
   
    //FUNCION ACTUALIZAR
    public function actualizar(){
        if(!isset($_GET["actualizar"])){          
             //Creamos un usuario
            $bodega=new Bodega($this->conexion);
            $bodega->setDireccion($_GET["id"]);
            $bodega->setDireccion($_POST["direccion"]);
            $bodega->setNombre($_POST["nombre"]);
            $bodega->setEmail($_POST["email"]);
            $bodega->setTelefono($_POST["telefono"]);
            $bodega->setNombreContacto($_POST["nombrePersonaContacto"]);
            $bodega->setFechaFundacion($_POST["fechaFundacion"]);
            $bodega->setHasRestaurante($_POST["hasRestaurante"]);
            $bodega->setHasHotel($_POST["hasHotel"]);
            $actualizar=$bodega->actualizar();
            
            
            
            $this->view('detalleBodega', array(
                "bodega"=>$bodega,
                "titulo" => "INFO BODEGA"
            ));
            
       
        }
        

    }

    //FUNCION DELETE
    public function delete (){
        if(!isset($_GET["delete"])){
            $bodega=new Bodega($this->conexion);
            $bodega->delete($_GET["id"]);
        }

        header('Location: index.php');
    }
    
    
   /**
    * Crea la vista que le pasemos con los datos indicados.
    *
    */
    public function view($vista,$datos){
        $data = $datos;  
        require_once  __DIR__ . "/../view/" . $vista . "View.php";

    }

}
?>
