<?php

/********************************************************************************************
 * Objetivo: Arquivo responsavel por manipular os dados dentro do banco de dados (insert, update, select e delete)
 * Autor: Jennifer
 * Data: 11/03/2022
 * Versão: 1.0
 *************************************************************************************/

// import do arquivo que estabelece a conexão com o banco de dados 
require_once('conexaoMysql.php');

// Função para realizar o insert no banco de dados
function insertContato($dadosContato)
{
    // Abrindo a conexão com o Banco de dados
    $conexao = conectarMysql();

    // Montagem do script SQL para enviar para o banco de dados
    $sql = "insert into tblcontatos 
                (nome, 
                telefone, 
                celular, 
                email, 
                observacao)
            values
            ('".$dadosContato['nome']."',
			'".$dadosContato['telefone']."', 
			'".$dadosContato['celular']."', 
			'".$dadosContato['email']."',
            '".$dadosContato['obs']."');";

    // Executando o Script no Banco de dados ( passando como parâmetros, o próprio banco de dados e o script que será executado)0
    mysqli_query($conexao, $sql);
}

// Função para realizar o update no banco de dados
function updateContato()
{
}

// Função para excluir no banco de dados
function deleteContato()
{
}

// Função para listar todos os contatos do banco de dados
function selectAllContato()
{
}
