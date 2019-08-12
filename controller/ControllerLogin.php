<?php
require_once "../model/usuario.php";

class Login {
    private $usuario;
    
    public function __construct(){
        $this->usuario = new Usuario();
        $this->usuario->setEmail($_POST['email']);
        $this->usuario->setSenha($_POST['senha']);
        $this->acessar();
    }

    private function acessar(){
        $resultado=$this->usuario->logar();
    
        if($resultado){
            header("location:../view/index.php");
        } 
        //else{
        //    echo "<h1>Usuário ou senha incorretos.</h1>";
        //}
    }
}
?>