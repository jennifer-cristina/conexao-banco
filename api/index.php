<?php

/*****************************************************************************
 *  Objetivo: Arquivo principal da API que irá receber a URL requisitada
 *  e redirecionar para as APIs(router)
 *  Data: 19/05/2022
 *  Autor: Jennifer Cristina
 *  Versão: 1.0
 *****************************************************************************/

// Permite ativar quais endereços de sites que poderão fazer requisições na API
header('Access-Control-Allow-Origin: *');

// Permite ativar os metódos do protocolo HTTP que irão requisitar a API
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

// Permite ativar o Content-Type das requisições (Formato de dados que será utilizado (JSON, XML, FORM/DATA, etc.))
header('Access-Control-Allow-Header: Content-Type');

// Permite liberar quais Content-Type serão utilizados na API
header('Content-Type: application/json');

// Recebe a url digitada na requisição
$urlHTTP = (string) $_GET['url'];

// Converte a url requisitada em um array para dividir as opções de busca, que é separa 
$url = explode('/', $urlHTTP);

// Verifica qual API será encaminhada a requisição (contatos, estados, etc)
switch (strtoupper($url[0])) {
    case 'CONTATOS':

        require_once('contatosAPI/index.php');
        break;

    case 'ESTADOS':
        require_once('estadosAPI/index.php');
        break;
}
