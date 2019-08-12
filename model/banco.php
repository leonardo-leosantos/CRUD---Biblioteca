<?php

require_once("../init.php");
class Banco{

    protected $mysqli;

    public function __construct(){
        try {
            $this->conexao();
        } catch (Exception $e) {
            Echo "Erro:".$e->getMessage();
        }
        
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function login($email,$senha){
        $stmt = $this->mysqli->prepare("SELECT email FROM usuario WHERE email=? and senha=?");
        $stmt->bind_param("ss",$email,$senha);
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;
        $stmt->bind_result($email);
        if ($rows>0) {
            $result = $stmt->fetch();
            session_start();
            $_SESSION['email'] = $result->email;
            return true;
        } else {
            $stmt->close();
            return false;
        }
           
    }
    

    public function setUsuario($nome,$sobrenome,$login,$senha,$admin){
        $stmt = $this->mysqli->prepare("INSERT INTO usuario (`nome`, `sobrenome`, `email`, `senha`, `admin`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",$nome,$sobrenome,$login,$senha,$admin);
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }
    }

    public function setLivro($nome,$autor,$quantidade,$preco,$data){
        $stmt = $this->mysqli->prepare("INSERT INTO livros (`nome`, `autor`, `quantidade`, `preco`, `data`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",$nome,$autor,$quantidade,$preco,$data);
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function getLivro(){
        $array = array();
        $result = $this->mysqli->query("SELECT * FROM livros");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;

    }

    public function deleteLivro($id){
        if($this->mysqli->query("DELETE FROM `livros` WHERE `nome` = '".$id."';")== TRUE){
            return true;
        }else{
            return false;
        }

    }
    public function pesquisaLivro($id){
        $result = $this->mysqli->query("SELECT * FROM livros WHERE nome='$id'");
        return $result->fetch_array(MYSQLI_ASSOC);

    }
    public function updateLivro($nome,$autor,$quantidade,$preco,$flag,$data,$id){
        $stmt = $this->mysqli->prepare("UPDATE `livros` SET `nome` = ?, `autor`=?, `quantidade`=?, `preco`=?, `flag`=?,`data` = ? WHERE `nome` = ?");
        $stmt->bind_param("sssssss",$nome,$autor,$quantidade,$preco,$flag,$data,$id);
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }
}
?>
