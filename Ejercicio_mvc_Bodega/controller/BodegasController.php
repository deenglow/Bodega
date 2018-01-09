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
            case "detalle" :
                $this->detalle();
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
     public function detalle(){
       /* if(!isset($_GET["detalle"])){
            //Creamos el objeto empleado
            $empleado=new Empleado($this->conexion);
        
            //Conseguimos todos los empleados
            $empleadoSeleccionado=$empleado->getEmpleado($_GET["id"]);

            //Cargamos la vista index y le pasamos valores
            $this->view("detalle",array(
                "empleado"=>$empleadoSeleccionado,
                "titulo" => "PHP MVC"
            ));
            

        }*/
        
    }

    
   /**
    * Crea un nuevo empleado a partir de los parámetros POST 
    * y vuelve a cargar el index.php.
    *
    */
    public function crear(){
        /*if(isset($_POST["nombre"])){
            //Creamos un usuario
            $empleado=new Empleado($this->conexion);
            $empleado->setNombre($_POST["nombre"]);
            $empleado->setApellidos($_POST["apellidos"]);
            $empleado->setEmail($_POST["email"]);
            $empleado->setTelefono($_POST["telefono"]);
            $save=$empleado->save();
        }
        header('Location: index.php');*/
    }
   
    //FUNCION ACTUALIZAR
    public function actualizar(){
        /*if(!isset($_GET["actualizar"])){          
             //Creamos un usuario
            $empleado=new Empleado($this->conexion);   
            $empleado->setNombre($_POST["nombre"]);  
            $empleado->setApellidos($_POST["apellidos"]);         
            $empleado->setEmail($_POST["email"]);
            $empleado->setTelefono($_POST["telefono"]);
            $actualizar=$empleado->actualizar($_GET["id"]);
        }
        header('Location: index.php');*/
        
    }

    //FUNCION DELETE
    public function delete (){
       /* if(!isset($_GET["delete"])){
            $empleado=new Empleado($this->conexion);
            $empleado->delete($_GET["id"]);
        }

        header('Location: index.php');*/
    }
    
    
   /**
    * Crea la vista que le pasemos con los datos indicados.
    *
    */
    public function view($vista,$datos){
        $data = $datos;  
        require_once  __DIR__ . "/../view/" . $vista . "indexView.php";

    }

}
?>
