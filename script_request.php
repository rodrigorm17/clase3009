<?php
$nombre=$_REQUEST["nombre"];
echo "<h3>$nombre</h3>";
$suma=$_REQUEST["n1"]+$_REQUEST["n2"];
$promedio=$suma/2;

echo "Suma: ".$suma."<br>";
echo "Promedio: ".$promedio."<br>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</body>
</html>