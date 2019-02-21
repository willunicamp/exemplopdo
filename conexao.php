<?php
 
class Conexao {
 
    private static $instancia;
 
    private function __construct() {
        //construtor
    }
 
    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            //Cria instancia de conexao, usando codificacao UTF-8
            self::$instancia = new PDO('mysql:host=localhost;dbname=games', 'will', 'cotil',
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            //Como vai lidar com erros? Quero excecoes na tela!
            self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //String vazia fica null com esse parametro. Serve para todos, nao so pra Oracle
            self::$instancia->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
 
        return self::$instancia;
    }
 
}
 
?>
