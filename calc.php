<?php

$peso = $_POST['peso'];
$altura = $_POST['altura'];

if(isset($peso) && isset($altura) && $peso > 0 && $altura > 0){
    $imc = $peso/($altura*$altura);
    $formated_imc = number_format($imc,2, '.', '');

    if($formated_imc < 18.5){
        $imc_scale = 'Abaixo do peso';
    } elseif($formated_imc >= 18.5 && $formated_imc < 24.9) {
        $imc_scale = 'Peso normal';
    } elseif($formated_imc >= 25 && $formated_imc < 29.9){
        $imc_scale = 'Sobrepeso';
    } elseif($formated_imc >= 30 && $formated_imc < 34.9){
        $imc_scale = 'Obesidade grau I';
    } elseif($formated_imc >= 35 && $formated_imc < 39.9){
        $imc_scale = 'Obesidade grau II';
    } elseif($formated_imc >= 40){
        $imc_scale = 'Obesidade grau III';
    }

} else {
    $mensagem = "Insira os dados ou verifique se são validos.";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora de IMC</title>
</head>
<body>
    <main>

<h1>Calculadora de IMC</h1><br>
    <form action="calc.php" method="post">
        <label for="peso">Insira seu peso: </label>
        <input type="number" name="peso" id="peso" value="<?php echo $peso; ?>" min="0" required><br><br>

        <label for="altura">Insira sua altura: </label>
        <input type="number" step="0.01" name="altura" id="altura" value="<?php echo $altura; ?>" min="0" required><br><br>

        <input type="submit" value="Enviar">
    </form>

    <img src="" alt="">

    <p><?php echo $mensagem; ?></p>
<hr>
<h2>IMC: <?php echo $formated_imc; ?></h2>
<h2>Classificação: <?php echo $imc_scale; ?></h2>

</main>
</body>
</html>
