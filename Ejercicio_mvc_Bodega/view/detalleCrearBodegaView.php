<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>AÑADIR BODEGA</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <form action="index.php?controller=bodegas&action=alta" method="post">
            <h3>Añadir Bodega</h3>
            <hr/>
            Direccion: <input type="text" name="direccion" class="form-control"/>
            Nombre: <input type="text" name="nombre" class="form-control"/>
            Email: <input type="text" name="email" class="form-control"/>
            Telefono: <input type="text" name="telefono" class="form-control"/>
            Nombre Persona de Contacto: <input type="text" name="nombrePersonaContacto" class="form-control"/>
            Fecha fundacion: <input type="text" name="fechaFundacion" class="form-control"/>
            Tiene Restaurante: <input type="text" name="hasRestaurante" class="form-control"/>
            Tiene Hotel: <input type="text" name="hasHotel" class="form-control"/>
            <input type="submit" value="enviar" class="btn btn-success"/>   
        </form>
        <a href="index.php?controller=bodegas&action=index" class="btn btn-success">Volver</a>    
        </div>
        
	
        <footer class="container">
            <hr/>
           Ejemplo PHP + PDO + POO + MVC - David Ramirez - <a href="#">dramirez.es</a> - Copyright &copy; <?php echo  date("Y"); ?>
        </footer>
    </body>
</html>