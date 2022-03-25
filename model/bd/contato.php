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
function insertContato($dadosContato){

    // Declaração de variável para utilizar no return desta função 
    $statusResposta = (bool) false;
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
            ('" . $dadosContato['nome'] . "',
			'" . $dadosContato['telefone'] . "', 
			'" . $dadosContato['celular'] . "', 
			'" . $dadosContato['email'] . "',
            '" . $dadosContato['obs'] . "');";

    // Executando o Script no Banco de dados ( passando como parâmetros, o próprio banco de dados e o script que será executado)
    // Validação para verificar se o script está correto 
    if (mysqli_query($conexao, $sql)) {

        // Validação para verificar se uma linha foi acrescentada no DB
        if (mysqli_affected_rows($conexao)) {

            $statusResposta = true;
        }
    }
    // Fechar conexão  
    fecharConexaoMysql($conexao);
    return $statusResposta;
}

// Função para realizar o update no banco de dados  
function updateContato(){

}

// Função para excluir no banco de dados
function deleteContato($id){

    // Declaração de variável para utilizar no return desta função 
    $statusResposta = (boolean) false;

    // Abre a conexão com o Banco de dados
    $conexao = conectarMysql();

    // Script para deletar um registro do banco de dados
    $sql = "delete from tblcontatos where idcontato=" . $id;

    // Validando se o script está correto, sem erro de sintaxe e executa no Banco de dados
    if (mysqli_query($conexao, $sql)) {

        // Valida se o banco de dados teve sucesso na execução do script
        if (mysqli_affected_rows($conexao))
            $statusResposta = true;
    }

    // Fecha a conexão com o banco de dados Mysql;
    fecharConexaoMysql($conexao);

    return $statusResposta;
}

// Função para listar todos os contatos do banco de dados
function selectAllContato(){

    // Abre a conexão com o Banco de dados
    $conexao = conectarMysql();

    // script para listar todos os dados do Banco de dados de forma descrescente
    $sql = "select * from tblcontatos order by idcontato desc";

    // Executa o script no Banco de dados e guarda o retorno dos dados, se houver
    // Obs: mysqli_query, ele retornará os dados em formato de lista do banco, precisamos converter para um formato de array de dados, para pode manipular, editar, etc.
    $result = mysqli_query($conexao, $sql);

    // Valida se o Banco de dados retornou os registros
    if ($result) {

        // mysqli_fecth_assoc() - permite converter os dados do Banco de dados em um array para manipulação no PHP
        // Nesta repetição estamos: convertendo os dados do Banco de dados em um array ($rsDados), 
        // além de o próprio while conseguir gerenciar a qtde de vezes que deverá ser feita a repetição
        $cont = 0;
        while ($rsDados = mysqli_fetch_assoc($result)) {

            // Criação de um array com os dados do Banco de dados
            $arrayDados[$cont] = array(
                "id"        =>  $rsDados['idcontato'],
                "nome"      =>  $rsDados['nome'],
                "telefone"  =>  $rsDados['telefone'],
                "celular"   =>  $rsDados['celular'],
                "email"     =>  $rsDados['email'],
                "obs"       =>  $rsDados['observacao']
            );
            $cont++;
        }

        // Solicita o fechamento da conexão com o Banco de dados
        fecharConexaoMysql($conexao);

        return $arrayDados;
    }
}
