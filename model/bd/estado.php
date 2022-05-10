<?php

/********************************************************************************************
 * Objetivo: Arquivo responsavel por manipular os dados dentro do banco de dados (select)
 * Autor: Jennifer
 * Data: 10/05/2022
 * Versão: 1.0
 *************************************************************************************/

// import do arquivo que estabelece a conexão com o banco de dados 
require_once('conexaoMysql.php');

// Função para listar todos os estados do banco de dados
function selectAllEstados()
{

    // Abre a conexão com o Banco de dados
    $conexao = conectarMysql();

    // script para listar todos os dados do Banco de dados de forma crescente
    $sql = "select * from tblEstados order by nome asc";

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
                "idEstado"        =>  $rsDados['idEstado'],
                "nome"      =>  $rsDados['nome'],
                "sigla"  =>  $rsDados['sigla'],
            );
            $cont++;
        }

        // Solicita o fechamento da conexão com o Banco de dados
        fecharConexaoMysql($conexao);

        return $arrayDados;
    }
}
 ?>