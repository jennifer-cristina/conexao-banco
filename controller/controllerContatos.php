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
        if (!empty($dadosContato['txtNome']) && !empty($dadosContato['txtCelular']) && !empty($dadosContato['txtEmail'])) {

            // Criação do array de dados que será encaminhado a model para inserir no banco de dados, é importante criar este array
            // conforme as necessidades de manipulação do banco de dados
            // Observação: Criar as chaves conforme os nomes dos atributos do banco de dados
            $arrayDados = array(
                "nome"      => $dadosContato['txtNome'],
                "telefone"  => $dadosContato['txtTelefone'],
                "celular"   => $dadosContato['txtCelular'],
                "email"     => $dadosContato['txtEmail'],
                "obs"       => $dadosContato['txtObs']

            );

            // import do arquivo de modelagem para manipular o BD
            require_once('./model/bd/contato.php');
            // Chama a função que fará o insert no BD (esta função esta no model)
            if (insertContato($arrayDados))
                return true;
            else
                return array(
                    'idErro'  => 1,
                    'message' => 'Não foi possível inserir os dados no Banco de Dados'
                );
        } else
            return array(
                'idErro'  => 2,
                'message' => 'Existem campos obrigatórios que não foram inseridos'
            );
    }
}

// Função para receber dados da View w caminhar para a model (atualizar)
function atualizarContato()
{
}

// Função para realizar a exclusão de um contato 
function excluirContato($id)
{
    if($id != 0 && !empty($id) && is_numeric($id)){

        // import do arquivo de contato
        require_once('model/bd/contato.php');

        // Chama a função da model e valida se o retorno foi verdadeiro ou false
        if (deleteContato($id))
            return true;
        else
            return array ('idErro'  => 3,
                          'message' => 'O banco não pode excluir o registro' 
    );
    } else
            return array ('idErro'  => 4,
            'message' => 'Não é possível excluir um registro sem informar um id válido'
    ); 
}

// Função para solicitar os dados da model e encaminhar a lista de contatos para a View
function listarContato()
{

    // import do arquivo que vai buscar os dados no Banco de dados
    require_once('model/bd/contato.php');

    // Chama a função que vai buscar os dados no Banco de dados
    $dados = selectAllContato();

    if (!empty($dados))
        return $dados;
    else
        return false;
}
