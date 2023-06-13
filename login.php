<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>·:.:· ConrEcugA ·:.:· Control de acceso</title>
    <link rel="stylesheet" href="sass/main.css">
</head>
<body>
    <div class="global">
        <div class="caja" id="como">
            <div class="caja__titulo">
                <h2>accede a la aplicación</h2>
            </div>
            <div class="caja__logo">
                <img src="img/logo.png" alt="logo">
            </div>
            </div>
            <div class="caja__textos">
                <table class="tablalogin">
                    <form action="controllers/correcto.php" method="POST" class="formlogin">
                        <tr>
                            <td colspan="2" class="formlogin__titulo">
                                <span>Usuario:</span>
                                    <br/>
                                <input class="cajas" type="text" name="user"> 
                            </td> 
                        </tr>
                        <tr>
                            <td colspan="2" class="formlogin__titulo">
                                <span>Clave:</span>
                                    <br/>
                                <input class="cajas" type="password" name="pass">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br/>
                                <input type="submit" value="Enviar" class="formlogin__botones">
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                <br/> 
                                <input type="reset" value="Borrar" class="formlogin__botones">
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>                
    </div>
</body>
</html>