<?php

/********************************************************************************************
 * Objetivo: Arquivo responsavel pela manipulação de dados de estados, é aqui que fazemos todos os ajustes antes de mandar para o banco
 *  Obs(Este arquivo fará a ponte entre a View e a Model)
 * Autor: Jennifer
 * Data: 10/05/2022
 * Versão: 1.0
 *************************************************************************************/

require_once('./modulo/config.php');

// Função para solicitar os dados da model e encaminhar a lista de contatos para a View
function listarEstado()
{

    // import do arquivo que vai buscar os dados no Banco de dados
    require_once('model/bd/estado.php');

    // Chama a função que vai buscar os dados no Banco de dados
    $dados = selectAllEstados();

    if (!empty($dados))
        return $dados;
    else
        return false;
}

 ?>