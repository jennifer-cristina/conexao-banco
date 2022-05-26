<?php
/********************************************************************************************
 * Objetivo: Arquivo responsável em realizar uploads de arquivos
 * Autor: Jennifer
 * Data: 25/04/2022
 * Versão: 1.0
 *************************************************************************************/

 // Função para realizar upload de Imagens
function uploadFile($arrayFile){

    // import do arquivo de configurações do projeto
    require_once( SRC . 'modulo/config.php');

    $arquivo = $arrayFile;
    $sizeFile = (int) 0;
    $typeFile = (string) null;
    $nameFile = (string) null;
    $tempFile = (string) null;

    // Validação para identificar se existe um arquivo válido (Maior que 0 e que tenha uma extensão)
    if($arquivo['size'] > 0 && $arquivo['type'] !=""){

        // Recupera o tamanho do arquivo que é em bytes e converte para kilobytes ( /1024)
        $sizeFile = $arquivo['size']/1024;
        // Recupera o tipo do arquivo
        $typeFile = $arquivo['type'];
        // Recupera o nome do arquivo
        $nameFile = $arquivo['name'];
        // Recupera o caminho do diretório temporário em que esta tal
        $tempFile = $arquivo['tmp_name'];

        // Validação para permitir o upload apenas de arquivos de no máximo 5mb
        if($sizeFile <= MAX_FILE_UPLOAD){

            // Validação para permitir somente as extensões válidas
            if(in_array($typeFile, EXT_FILE_UPLOAD)){

                // Separa somente o nome do arquivo sem a sua extensão
                $nome = pathinfo($nameFile, PATHINFO_FILENAME);

                // Separa somente a entensão do arquivo sem o seu nome
                $extensao = pathinfo($nameFile, PATHINFO_EXTENSION);

                // Existem diversos algorítmos (bibliotecas) para criptografia de dados
                    // md5() gera 32 caracteres
                    // sha1() gera 61 caracteres
                    // hash() gera 256 caracteres

                // md5() gerando uma criptografia de dados
                // uniqid() gerando uma sequencia númerica diferente tendo como base as configurações da máquina
                // time() pega a hora, minuto e segundo que esta sendo feito o upload da foto 
                $nomeCripty = md5($nome.uniqid(time()));

                // Montamos novamente o nome do arquivo com a extensão 
                $foto = $nomeCripty.".".$extensao;

                // Movendo o arquivo da pasta temporária para a pasta "arquivo" local do projeto
                if (move_uploaded_file($tempFile, SRC.DIRETORIO_FILE_UPLOAD.$foto)){
                    return $foto;

                } else {
                     return array(
                    'idErro'  => 13,
                    'message' => 'Não foi possível mover o arquivo para o servidor'
                );
                }

            } else {
                return array(
                    'idErro'  => 12,
                    'message' => 'A extensão do arquivo selecionado não é permitida no upload'
                );
            }
                 
        } else {
            return array(
                'idErro'  => 10,
                'message' => 'Tamanho de arquivo inválido no upload'
            );
            
        }

    } else {
        return array(
            'idErro'  => 11,
            'message' => 'Não é possível realizar o upload sem um arquivo selecionado.'
        );
    }

}

?>