<?php
//iniciar variables
$n1=0; $n2=0; $suma=0; $promedio=0; $nombre="";

if(isset($_REQUEST["btnCalcular"])){
    //entrada
    $nombre=$_REQUEST["nombre"];
    $n1=$_REQUEST["n1"];
    $n2=$_REQUEST["n2"];
    //proceso
    $suma=$n1+$n2;
    $promedio=$suma/2;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Suma de dos números</title>
    <style>
        .Textofondo{
            background-color: #ccffff;
        }
    </style>
</head>
<body>
    <form method="post" action="script_isset.php">
        <table>
            <tr>
                <td colspan="2">Cálculo de la Suma y el promedio de dos números</td>
            </tr>
            <tr>
                <td><label>Nombre</label></td>
                <td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
            </tr>
            <tr>
                <td><label>Nota 1</label></td>
                <td><input type="text" name="n1" value="<?php echo $n1;?>"></td>
            </tr>
            <tr>
                <td><label>Nota 2</label></td>
                <td><input type="text" name="n2" value="<?php echo $n2;?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Calcular" name="btnCalcular"></td>
            </tr>
            <tr>
                <td><label>Suma</label></td>
                <td><input type="text" class="Textofondo" name="suma" value="<?php echo $suma;?>" disabled></td>
            </tr>
            <tr>
                <td><label>Promedio</label></td>
                <td><input type="text" class="Textofondo" name="promedio" value="<?php echo $promedio;?>" disabled></td>
            </tr>
        </table>
    </form>
</body>
</html>