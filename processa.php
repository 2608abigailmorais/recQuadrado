<?php
    $id = isset($_POST['id']) ? $_POST['id'] : 0;   
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
    $lado = isset($_POST['lado']) ? $_POST['lado'] : 1;
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once("classe/quadrado.class.php");

    $processa = isset($_GET['processa']) ? $_GET['processa'] : "";
    if ($processa == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        
        $quadrado = new Quadrado("", "", "");
        $resultado = $quadrado->excluir($id);
        header("location:index.php");
    }
   
    $processa = isset($_POST['processa']) ? $_POST['processa'] : "";
    if ($processa == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        if ($id == 0){
            $quadrado = new Quadrado("", $_POST['lado'], $_POST['cor']);                  
            $resultado = $quadrado->insere();
            header("location:index.php");
        }else {    
        $quadrado = new Quadrado($_POST['id'], $_POST['lado'], $_POST['cor']);
        $resultado = $quadrado->editar();
        }
        header("location:index.php");   
}

//Consultar dados
    function buscarDados($id){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM quadrado WHERE id = $id");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id'] = $linha['id'];
            $dados['lado'] = $linha['lado'];
            $dados['cor'] = $linha['cor'];

        }
        return $dados;
    }



?>