<?php

class Usuario {
    //Atributos
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtCadastro;
    
    //METODOS ACESSORES
    function getIdusuario() {
        return $this->idusuario;
    }

    function getDeslogin() {
        return $this->deslogin;
    }

    function getDessenha() {
        return $this->dessenha;
    }

    function getDtCadastro() {
        return $this->dtCadastro;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setDeslogin($deslogin) {
        $this->deslogin = $deslogin;
    }

    function setDessenha($dessenha) {
        $this->dessenha = $dessenha;
    }

    function setDtCadastro($dtCadastro) {
        $this->dtCadastro = $dtCadastro;
    }

    public function userId($id) {
        $sql = new Sql();
        $result=$sql->select("SELECT * FROM db_usuarios WHERE idusuario=:ID",array(":ID"=>$id));
        if(count($result)>0){
            $row = $result[0];
             $this->setIdusuario($row['idusuario']);//SETANDO DADO DO BANCO NO OBJETO USUARIO
             $this->setDeslogin($row['deslogin']);
             $this->setDessenha($row['dessenha']);
             $this->setDtCadastro($row['dtCadastro']);
        }
    }
    
    public function __toString() {
        return json_encode(
            array(
            "idusuario"=> $this->getIdusuario(),
            "deslogin"=> $this->getDeslogin(),
            "dessenha"=> $this->getDessenha(),
            "dtcadastro"=> $this->getDtCadastro()
            )
        );
    }
}

