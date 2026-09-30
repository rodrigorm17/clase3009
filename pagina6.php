<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Definir una constante en PHP</h1>
    <?php
    /*Definiciòn de una constante */
        define("IGV",0.18);
    /*Variables de calculo */
    $subtotal=150.00;
    $montoIGV=$subtotal*IGV;
    $total=$subtotal+$montoIGV;
    
    /* Impresion de resultados */
    echo "Subtotal: S/. ".$subtotal."<br>";
    echo "Monto de IGV (18%): S/. ".$montoIGV."<br>";
    echo "Total a pagar: S/. ".$total;
    ?>
</body>
</html>