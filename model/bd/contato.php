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

    // Executando o Script no Banco de dados ( passando como parâmetros, o próprio banco de dados e o script que será executado)
        // Validação para verificar se o script está correto 
    if (mysqli_query($conexao, $sql)){

        // Validação para verificar se uma linha foi acrescentada no DB
        if(mysqli_affected_rows($conexao))
            return true;
        else
            return false;
    }else 
        return false;
}

// Função para realizar o update no banco de dados
function updateContato(){
}

// Função para excluir no banco de dados
function deleteContato(){
}

// Função para listar todos os contatos do banco de dados
function selectAllContato(){
    
    // Abre a conexão com o Banco de dados
    $conexao = conectarMysql();

    // script para listar todos os dados do Banco de dados 
    $sql = "select * from tblcontatos";

    // Executa o script no Banco de dados e guarda o retorno dos dados, se houver
    // Obs: mysqli_query, ele retornará os dados em formato de lista do banco, precisamos converter para um formato de array de dados, para pode manipular, editar, etc.
    $result = mysqli_query($conexao, $sql);

    // Valida se o Banco de dados retornou os registros
    if($result){

        // mysqli_fecth_assoc() - permite converter os dados do Banco de dados em um array para manipulação no PHP
        // Nesta repetição estamos: convertendo os dados do Banco de dados em um array ($rsDados), 
        // além de o próprio while conseguir gerenciar a qtde de vezes que deverá ser feita a repetição
        $cont = 0;
        while($rsDados = mysqli_fetch_assoc($result)){

            // Criação de um array com os dados do Banco de dados
            $arrayDados[$cont] = array (
                "nome"      =>  $rsDados['nome'],
                "telefone"  =>  $rsDados['telefone'],
                "celular"   =>  $rsDados['celular'],
                "email"     =>  $rsDados['email'],
                "obs"       =>  $rsDados['observacao']
            );
            $cont++;
        }

        return $arrayDados;
    }
}
