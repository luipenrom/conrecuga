<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>·:.:· ConrEcugA ·:.:· Control de gastos-recursos-cuentas-ganancias</title>
    <link rel="stylesheet" href="../sass/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
    session_start();
    include_once("../config/conectar_db.php");
?>
    <div class="global">
        <!-- CABECERA -->
        <div class="cabecera">
            <div class="cabecera__logo">
                <img src="../img/logo.png" alt="logo">
            </div>
        </div>
        <!-- Letrero -->
        <div class="caja" id="mensaje">
            <div class="caja__titulo">
                <p>Aqui puedes dar de alta un usuario</p>
            </div>
            <div class="caja__textos">
                <p>Ten en cuenta que debes sincronizarte con tu unidad familiar o grupo, para que todos los datos que introduzcais los distintos usuarios vayan al mismo grupo</p>
            </div>
        </div>     
    </div>
            <div class="caja__textos">
                <table class="tablalogin">
                    <form name="nuevocliente" method="post" action="insertar.php?id=correcto" enctype="multipart/form-data">
                        <tr>
                            <td>
                                GRUPO:  
                            </td>
                            <td>
                                <input type="text" name="grupo" required>
                            </td>
                        </tr> 
                        <tr>             
                        <tr>
                            <td>  
                                Nombre: 
                            </td>
                            <td>
                                <input type="text" name="nombre" required>
                            </td>
                        </tr> 
                        <tr>
                            <td> 
                                Contraseña:
                            </td>
                            <td>
                                <input type="password" name="pass" required>
                            </td>
                        </tr> 
                        <tr>
                            <td>
                                <input type="hidden">
                            </td>
                            <td>
                                <input type="hidden" value="4" name="rol">
                            </td>
                        </tr> 
                        <tr>
                            <td>
                                <input type="hidden">
                            </td>
                            <td>
                                <input type="hidden" value="1" name="activo">
                            </td>
                        </tr>         
                        <tr>
                            <td> 
                                <input name="Borrar" value="borrar" type="reset">  
                            </td>
                            <td>
                                <input name="Enviar" value="Enviar datos" type="submit">
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>                
    </div>
</body>
</html>