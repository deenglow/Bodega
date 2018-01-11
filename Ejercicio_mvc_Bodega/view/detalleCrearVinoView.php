<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>AÑADIR VINO</title>
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
        <form action="index.php?controller=vinos&action=alta" method="post">
            <h3>AÑADIR VINO</h3>
            <hr/>
            Nombre: <input type="text" name="nombre" class="form-control"/>
            Descripcion: <input type="text" name="descripcion" class="form-control"/>
            Año: <input type="text" name="anio" class="form-control"/>
            Tipo:<select name="tipo" class="form-control">
                        <option value="tinto">Tinto</option>
                        <option value="blanco">Blanco</option>
                        <option value="rosado">Rosado</option>
                </select>
            Porcentaje de Alcohol: <input type="text" name="porcentajeAlcohol" class="form-control"/>
            <input type="hidden" name="idBodega" value="<?php echo $data?>"/>
            <input type="submit" value="GUARDAR" class="btn btn-success"/>   
        </form>
        <a href="index.php?controller=bodegas&action=detalleBodega&id=<?php echo $data?>" class="btn btn-info">Volver</a>    
        </div>
        
	
        <footer class="container">
            <hr/>
           Ejercicio_mvc_Bodegas - David Ramirez - <a href="#">dramirez.es</a> - Copyright &copy; <?php echo  date("Y"); ?>
        </footer>
    </body>
</html>