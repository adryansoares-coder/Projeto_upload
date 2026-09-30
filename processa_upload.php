<?php
$pastadestino = "upload/";

if (isset($FILES["arquivo"]) && $FILES["arquivo"]["error"] == 0) {
    $nomeArquivo = basename ($_FILES["arquivo"] ["name"]);
    $caminhoDestino = $pastadestino . $nomeArquivo;

    // Verifica se é uma imagem 
    $tipoArquivo = strolower(patchinfo($caminhoDestino, PATHINFO_EXTENSION));
    $tiposPermmitidos = ["jpg", "jpeg", "png", "gif"];

    if (in_array($tipoArquivo, $tiposPermitidos)) {
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $caminhoDestino)) {
            echo "Imagem enviada com sucesso!";
        } else {
            echo "Erro ao enviar a imagem.";
        }
    } else {
        echo "Tipo de arquivo não permitido. Apenas imagens são aceitas.";
    }
    ?>