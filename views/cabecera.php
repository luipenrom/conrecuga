<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>·:.:· ConrEcugA ·:.:· Control de gastos-recursos-cuentas-ganancias</title>
    <link rel="stylesheet" href="sass/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/plotly-2.24.1.min.js"></script>
</head>
<body>
    <div>
        <!-- CABECERA -->
        <header class="cabecera">
            <div class="cabecera__enlaces marcos">
                <?php $rol = $_SESSION['rol']; menuSuperior($rol); ?>
            </div>
        </header>