<?php
    include "db.php";
    $consulta = "SELECT * FROM chat ORDER BY id ASC";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
?>
    
    <div id="datos-chat">
        <span style="color: #1c63c4"><?php echo $fila['nombre'];?>: </span>
        <span style="color: #434B4D"><?php echo $fila['mensaje'];?></span>
        <span style="float: right"><?php echo formatearFecha($fila['fecha']);?></span>
    </div>
    

<?php endwhile; ?>