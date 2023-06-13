
<?php
date_default_timezone_set ("Europe/Madrid");
$usuario = $_SESSION['nombre'];
?>
    <footer class="pie">
        <div class="pie__datos">
        <p>Eres: <?php echo $usuario; ?> ¿verdad?. Si no es así, <a href="controllers/logout.php">cierra sesión aquí</a></p> 
        </div>
        <div>
        </div>
        <div class="pie__fecha">
            <p>Hoy es: <?php echo date ("d/m/Y H:i:s"); ?> </p>   
        </div>
    </footer>
    </div>
</body>
</html>