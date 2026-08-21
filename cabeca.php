<?php

$cadeiras = array(
    array(true, true, false, true, true),
    array(false, false, true, true, false),
    array(true, false, true, false, true),
    array(true, true, true, false, false)
);
$sugestoes = [];
$mensagem= "";
if (isset($_POST['fileira']) && isset($_POST['assento'])) {

    $fileira = (int) $_POST['fileira'];
    $assento = (int) $_POST['assento'];

    
    if (isset($cadeiras[$fileira][$assento])) {

        if ($cadeiras[$fileira][$assento] == true) {
            $mensagem = "O assento Fileira $fileira, Assento $assento está LIVRE!";
        } else {
            $mensagem = "O assento Fileira $fileira, Assento $assento está OCUPADO.";}
        } else {
    $mensagem = "Assento inválido! Verifique a fileira e o número digitados.";
}
    } 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Verificação</title>
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ossos.css">
</head>
<body>

    <div class="container-cinema">

            <h1>Resultado</h1>

            <p class="resultado"> <?php echo $mensagem; ?> </p>

            <h2>Mapa do Cinema</h2>
            <div class="mapa">
                <?php foreach ($cadeiras as $numFileira => $listaAssentos): ?>
                    <div class="fileira">
                        <?php foreach ($listaAssentos as $numAssento => $livre): ?>
                            <div class="assento <?php echo $livre ? 'livre' : 'ocupado'; ?>">
                                <?php echo "$numFileira-$numAssento"; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <br>
            <a href="carne.html"> Verificar outro assento</a>
    </div>

</body>
</html>