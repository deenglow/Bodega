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
            <?php foreach($data["bodegas"] as $bodega) {?>
                <?php echo $bodega["idBodega"]; ?> -
                <?php echo $bodega["nombre"]; ?> -
                <?php echo $bodega["email"]; ?> -
                <?php echo $bodega["telefono"]; ?>&nbsp;
                <a href="index.php?controller=bodegas&action=delete&id=<?php echo $bodega['idBodega']; ?>" class="btn btn-success">Eliminar</a>&nbsp;
                <a href="index.php?controller=bodegas&action=detalle&id=<?php echo $bodega['idBodega']; ?>" class="btn btn-success">
                Detalle</a>
                <hr/>
            <?php } ?>
               <a href="index.php?controller=bodegas&action=detalleCrearBodega" class="btn btn-success">AÑADIR</a>&nbsp;
        </section>
 
        <footer class="col-lg-12">
            <hr/>
           Ejercicio_mvc_Bodegas - David Ramirez - <a href="#">dramirez.es</a> - Copyright &copy; <?php echo  date("Y"); ?>
        </footer>
    </body>
</html>