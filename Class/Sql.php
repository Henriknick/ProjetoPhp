<?php

class Sql extends PDO {
    
    //Atributos
    private $conn;
    
    //Metodo Contrutor
    function __construct() {
        $this->conn = new PDO("mysql:host=localhost;dbname=db_php7","root","");//CONECTA COM O BANCO
    }
    
    //Metodo prepara QUERY PARA CONSULTA
    private function setParams($statment, $parameters = array()){
        foreach ($parameters as $key => $value) {
            $this->setParam($statment,$key, $value);
        }
    }
    private function setParam($statment, $key, $value) {
        $statment->bindParam($key, $value);
    }
    public function query($rawQuery, $params = array()) {
        $stmt = $this->conn->prepare($rawQuery); //PREPARA A QUERY PARA CONSULTA
        $this->setParams($stmt,$params); //PREPARA ARRAY DA CONSULTA QUERY
        $stmt->execute(); //EXECUTA CONSULTA NO BANCO
        return $stmt;
    }
    
    //METODO SELECT NO BANCO USANDO QUERY ACIMA
    public function select($rawQuery, $params = array()):array
    {
        $stmt = $this->query($rawQuery,$params); //CHAMANDO O METODO QUERY
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
