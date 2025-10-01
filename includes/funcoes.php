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

function logout()
{
    unset($_SESSION['user']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);
}

function is_logado(){
    if(empty($_SESSION['user'])){
        return false;
    } else {
        return true;
    }
}

function is_admin(){
    $t= $_SESSION['tipo'] ?? null;
    if(is_null($t)) {
        return false;
    } else {
        if($t == 'admin') {
            return true;
        } else {
            return false;
        }
    }
   }

function is_editor(){
    $t= $_SESSION['tipo'] ?? null;
    if(is_null($t)) {
        return false;
    } else {
        if($t == 'editor') {
            return true;
        } else {
            return false;
        }
    }
}
