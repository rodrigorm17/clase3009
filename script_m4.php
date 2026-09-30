<?php
$nombre=$_POST['nombre'];
$suma=$_POST["n1"] + $_POST["n2"];
$promedio=$suma/2;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proceso</title>
</head>
<body>
    <table>
        <tr>
            <th>Nombre :</th>
            <td><?php echo $nombre;?></td>
        </tr>
        <tr>
            <th>Suma :</th>
            <td><?php echo $suma;?></td>
        </tr>
        <tr>
            <th>Promedio :</th>
            <td><?php echo $promedio; ?></td>
        </tr>
    </table>
</body>
</html>