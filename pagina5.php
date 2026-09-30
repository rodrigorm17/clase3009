<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables tipo String</title>
</head>
<body>
    <h1>Enunciado - pàgina 1</h1>
    <?php
/* Definir tres variables enteras. Luego definir un string que incorpore dichas variables y las
sustituya en tiempo de ejecucion.
Recordar que una variable se sustituye cuando el string está encerrado por comillas dobles:
$precio=90;
echo "La computadora tiene un precio de $precio";
*/

    $nota1 = 10;
    $nota2 = 7;
    $nota3 = 8;
    $suma = $nota1+$nota2+$nota3;
    $prom = ($suma)/3;
    echo "Juan aprobó la materia con las notas $nota1, $nota2 y $nota3";
    echo "<hr>";
    echo "Juan aprobó la materia con las notas ".$nota1."".$nota2."".$nota3;
    echo "<hr> SUMATORIA: ".$suma;
    echo "<hr> PROMEDIO: ".$prom;
    ?>
</body>
</html>