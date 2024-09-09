<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Número Primo</title>
</head>
<body>

<h1>Verificar si un Número es Primo</h1>
<form method="post">
    <label for="numero">Ingresa un número:</label>
    <input type="number" id="numero" name="numero" required>
    <input type="submit" value="Verificar">
</form>

<p>

<?php

function esPrimo($numero) {
    if ($numero <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return false;
        }
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroIngresado = intval($_POST['numero']);
    if (esPrimo($numeroIngresado)) {
        echo "$numeroIngresado es un número primo.";
    } else {
        echo "$numeroIngresado no es un número primo.";
    }
}
?>


<!-- /////////////////////////////////////////////////// -->


<h1>Verificar si un Número es Par o Impar</h1>
<form method="post">
    <label for="num">Ingresa un número:</label>
    <input type="number" id="num" name="num" required>
    <input type="submit" value="Verificar">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $num = $_POST["num"];

    if (($num % 2) == 0) {
        echo "$num Es un numero par.";
    } else {
        echo "$num Es un numero impar.";
    }
}

?>




<!-- /////////////////////////////////////////////////// -->
<?php
// Definimos una matriz de 3x3
$matriz = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

// Imprimimos la matriz
echo "<h1>Matriz 3x3</h1>";
echo "<table border='1'>";

for ($i = 0; $i < count($matriz); $i++) {
    echo "<tr>";
    for ($j = 0; $j < count($matriz[$i]); $j++) {
        echo "<td>" . $matriz[$i][$j] . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>

</p> 

</body>
</html>