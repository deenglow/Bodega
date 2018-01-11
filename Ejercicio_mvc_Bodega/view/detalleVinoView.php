<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>INFORMACION DEL VINO </title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#editar").click(function(){
                    $("input").removeAttr('disabled');
                    $('#guardar').attr("type","submit");
                    $("#editar").hide();
                });
                
            });
        
        </script>
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
       <div class="container">
        <form action="index.php?controller=vinos&action=actualizar&id=<?php echo $data["vino"]->idVino;?>" method="post">
            <h3>INFO VINO</h3>
            <hr/>
            Nombre: <input type="text" name="nombre" class="form-control" disabled value="<?php echo $data['vino']->nombre; ?>"/>
            Descripcion: <input type="text" name="descripcion"  disabled class="form-control" value="<?php echo $data['vino']->descripcion;?>"/>
            Año: <input type="text" name="anio" class="form-control" disabled  value="<?php echo $data['vino']->anio;?>"/>
            Tipo: <input type="text" name="tipo" class="form-control" disabled value="<?php echo $data['vino']->tipo;?>" placeholder="tinto/blanco/rosado"/>
            Porcentaje de Alcohol: <input type="text" name="porcentajeAlcohol" class="form-control" disabled value="<?php echo $data['vino']->porcentajeAlcohol;?>"/>
        <input type="hidden" value="Guardar" class="btn btn-success" id="guardar"/>   
        </form>
            <hr>
        <button class="btn btn-success" id="editar">Editar</button>     
        <a href="index.php?controller=bodegas&action=detalleBodega&id=<?php echo $data['vino']->idBodega; ?>" class="btn btn-primary">Volver</a>    

        <footer class="container">
            <hr/>
           Ejercicio_mvc_Bodegas - David Ramirez - <a href="#">dramirez.es</a> - Copyright &copy; <?php echo  date("Y"); ?>
        </footer>
    </body>
</html>
