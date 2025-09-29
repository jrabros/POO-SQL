<?php
function thumb($arq)
{
    $caminho = "fotos/$arq";
    if (is_null($arq) || !file_exists($caminho)) {
        return "fotos/indisponivel.png";
    } else {
        return $caminho;
    }
}

function voltar()
{
    return "<a href='index.php'> <span class='material-icons'>arrow_back</span> </a>";
}

function msg_sucesso($msg)
{
    $resp = "<div class='sucesso'><span class = 'material-icons'>check_circle</span>$msg</div>";
    return $resp;
}

function msg_aviso($msg)
{
    $resp = "<div class='aviso'><span class = 'material-icons'>info</span>$msg</div>";
    return $resp;
}

function msg_erro($msg)
{
    $resp = "<div class='erro'><span class = 'material-icons'>error</span>$msg</div>";
    return $resp;
}
