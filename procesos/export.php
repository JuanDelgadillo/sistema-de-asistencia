<?php

header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=reporte.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

<?php
@session_start();

ini_set("display_errors", 0);

include_once "../config/conection.php";
$consulta = mysql_query("SELECT * FROM auditoria ORDER BY fecha DESC");
  ?>
<table border="1" width="1200px">
      <tr>
            <th style="text-align:center;background-color:gray;">Usuario</th>
            <th style="text-align:center;background-color:gray;">Tipo de usuario</th>
            <th style="text-align:center;background-color:gray;">Operaci&oacute;n</th>
            <th style="text-align:center;background-color:gray;">Fecha - Hora</th>
          </tr>
  <?php while($row = mysql_fetch_assoc($consulta))
  {
    ?>
          <tr>
            <td><?=utf8_decode($row['usuario'])?></td>
            <td><?=utf8_decode($row['tipo_usuario'])?></td>
            <td><?=utf8_decode($row['operacion'])?></td>
            <td><?=utf8_decode($row['fecha'])?></td>
          </tr>
    <?php
  } ?>
    </table>
