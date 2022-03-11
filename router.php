<?php

/******************************************************************************
 * Objetivo: Arquivo de rota, para segmentar as ações encaminhadas pela View
 *      (dados de um form, listagem de dados, ação de excluir ou atualizar).
 *      Este Arquivo será responsável por encaminhar as solicitações para a
 *      Controller.
 * Autor: Jennifer
 * Data: 04/03/2022
 * Versão: 1.0
 ******************************************************************************/

$action = (string) null;
$component = (string) null;

// Validação para verificar se a requisição é um POST de um formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Recebendo dados via URL para saber quem está solicitando e qual ação será realizada
    $component = strtoupper($_GET['component']);
    $action = strtoupper($_GET['action']);

    // Estrutura condicional para validar quem esta solicitando algo para o Router
    switch ($component) {
        case 'CONTATOS':
            // Import da controller Contatos
            require_once('controller/controllerContatos.php');

            if($action == 'INSERIR')
                inserirContato($_POST);

            break;
    }
}
