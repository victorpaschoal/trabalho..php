<?php

function id_nao_recebido() {
    return !isset($_GET['id']); // ID 
}

function form_nao_enviado(){
    return $_SERVER['REQUEST_METHOD'] !== 'POST'; // vendo metodos POST
}

function form_em_branco() {
    return empty($_POST['login']) || empty($_POST['senha']); // vendo metodos POST
}

function form_em_branco_cadastro(){
    return empty($_POST['login_cadastro']) || empty($_POST['email_cadastro']) || empty($_POST['senha_cadastro']); // vendo metodos POST
}

function form_em_branco_tarefa(){
    return empty($_POST['cadastrar_tarefa']) || empty($_POST['cadastrar_descricao']); // vendo metodos POST
}

function editar_em_branco(){
    return empty($_POST['titulo']) || empty($_POST['descricao']); // vendo metodos POST
}

function validar_codigo(){ // validando os codigos passados
     if (!isset($_GET['codigo'])) {
        return;
    }

     $codigo = (int)$_GET['codigo'];

      switch ($codigo) { 

        case 0: // erro não especificado
            $msg = '<h3 class="alert alert-success" role="alert">Ocorreu um erro com sua requisição. Por favor, tente novamente.</h3>';

            break;

        case 1: // acesso não autorizado
            $msg = '<h3 class="alert alert-success" role="alert">Você não tem permissão para acessar a página requisitada.</h3>';

            break;

        case 2: // form não submetido
           $msg = "<h3 class='alert alert-warning' role='alert'>Por favor, preencha todos os campos do form.</h3>";
            break;

        case 3: // usuário ou senha inválidos
            $msg = '<h3 class="alert alert-warning">Usuário ou senha inválidos! Por favor, tente novamente.</h3>';
            break;

        case 4: // erro de SQL
           $msg = '<h3 class="alert alert-danger">Ocorreu um erro ao acessar o banco de dados. Por favor, contate o suporte ou tente novamente mais tarde.</h3>';

            break;
        case 5: // foi cadastrado o cliente
            $msg = "<h3 class='alert alert-success' role='alert'>Cadastro feito com sucesso</h3>";
            break;
         case 6: // tarefa com sucesso
            $msg = "<h3 class='alert alert-success' role='alert'>Tarefa cadastrada com sucesso</h3>";
            break;
         case 7: // form de edicao nao informado
            $msg = "<h3 class='alert alert-danger' role='alert'>Formulario de edicao nao enviado</h3>";
            break;
         case 8: // erro na preparacao consulta com banco de dados
            $msg = "<h3 class='alert alert-danger' role='alert'>Erro na preparação da consulta</h3>";
            break;
          case 9: // nenhum dado alterado do banco
            $msg = "<h3 class='alert alert-warning' role='alert'>Nenhum dado foi alterado</h3>";
            break;
           case 10: // Erro ao editar cliente
            $msg = "<h3 class='alert alert-danger' role='alert'>Erro ao editar cliente especificado. Verifique ID do cliente</h3>";
            break;
            case 11: // tarefa excluida com sucesso
            $msg = "<h3 class='alert  alert-success' role='alert'>Tarefa excluida com sucesso</h3>";
            break;
            case 12: // cliente editado com sucesso
            $msg = "<h3 class='alert alert-success' role='alert'>Cliente editado com sucesso</h3>";
            break;               
        default:
            $msg = "";
            break;
    }

    echo $msg;



}



?>