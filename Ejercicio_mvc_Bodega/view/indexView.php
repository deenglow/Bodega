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
    <body class="container">
            <h3>LISTA DE BODEGAS</h3>
            <hr/>
        <section style="height:400px;overflow-y:scroll;">
            <?php foreach($data["bodegas"] as $bodega) {?>
                <?php echo $bodega["idBodega"]; ?> -
                Nombre Bodega: <?php echo $bodega["nombre"]; ?> -
                Email: <?php echo $bodega["email"]; ?> -
                Telefono: <?php echo $bodega["telefono"]; ?>&nbsp;
                <a href="index.php?controller=bodegas&action=delete&id=<?php echo $bodega['idBodega']; ?>" class="btn btn-danger">Eliminar</a>&nbsp;
                <a href="index.php?controller=bodegas&action=detalleBodega&id=<?php echo $bodega['idBodega']; ?>" class="btn btn-info">
                Detalle</a>
                <hr/>
            <?php } ?>
               <a href="index.php?controller=bodegas&action=detalleCrearBodega" class="btn btn-success">AÑADIR</a>&nbsp;
        </section>
 
        <footer>
            <hr/>
           Ejercicio_mvc_Bodegas - David Ramirez - <a href="#">dramirez.es</a> - Copyright &copy; <?php echo  date("Y"); ?>
        </footer>
    </body>
</html>