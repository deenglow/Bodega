<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>PAGINA PRINCIPAL</title>
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
        <div class="col-lg-7">
            <h3>LISTA DE BODEGAS</h3>
            <hr/>
        </div>
        <section class="col-lg-7 usuario" style="height:400px;overflow-y:scroll;">
            <?php foreach($data["empleados"] as $empleado) {?>
                <?php echo $empleado["id"]; ?> -
                <?php echo $empleado["nombre"]; ?> -
                <?php echo $empleado["email"]; ?> -
                <?php echo $empleado["telefono"]; ?>&nbsp;
                <a href="index.php?controller=empleados&action=delete&id=<?php echo $empleado['id']; ?>" class="btn btn-success">Eliminar</a>&nbsp;
                <a href="index.php?controller=empleados&action=detalle&id=<?php echo $empleado['id']; ?>" class="btn btn-success">
                Detalle</a>
                <hr/>
            <?php } ?>
        </section>
		
        <footer class="col-lg-12">
            <hr/>
           Ejercicio_mvc_Bodegas - David Ramirez - <a href="#">dramirez.es</a> - Copyright &copy; <?php echo  date("Y"); ?>
        </footer>
    </body>
</html>