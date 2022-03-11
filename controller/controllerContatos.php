<?php

/********************************************************************************************
 * Objetivo: Arquivo responsavel pela manipulação de dados de contatos, é aqui que fazemos todos os ajustes antes de mandar para o banco
 *  Obs(Este arquivo fará a ponte entre a View e a Model)
 * Autor: Jennifer
 * Data: 04/03/2022
 * Versão: 1.0
 *************************************************************************************/

// Função para receber dados da View w caminhar para a model (inserir)
function inserirContato($dadosContato)
{
    // Validação para verificar se o objeto esta vazio
    if (!empty($dadosContato)) {
        // Validação de caixa vazia dos elementos nome, celular e email, pois são obrigatórios no banco de dados
        if (!empty($dadosContato['txtNome']) && !empty($dadosContato['txtCelular']) && !empty($dadosContato['txtEmail'])){

            // Criação do array de dados que será encaminhado a model para inserir no banco de dados, é importante criar este array
            // conforme as necessidades de manipulação do banco de dados
            // Observação: Criar as chaves conforme os nomes dos atributos do banco de dados
            $arrayDados = array (
                "nome"      => $dadosContato['txtNome'],
                "telefone"  => $dadosContato['txtTelefone'],
                "celular"   => $dadosContato['txtCelular'],
                "email"     => $dadosContato['txtEmail'],
                "obs"       => $dadosContato['txtObs']

            );

            require_once('./model/bd/contato.php');
            insertContato($arrayDados);
        }
    }
}

// Função para receber dados da View w caminhar para a model (atualizar)
function atualizarContato()
{
}

// Função para realizar a exclusão de um contato 
function excluirContato()
{
}

// Função para solicitar os dados da model e encaminhar a lista de contatos para a View
function listarContato()
{
}
