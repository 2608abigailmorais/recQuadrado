<!DOCTYPE html>
<?php 
    require_once "classe/quadrado.class.php";
    require_once  "conf/Conexao.php";
    $title = "Quadrados";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 1;


?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head> 
<body>
    <form method="post" action="processa.php">
        <h3>Calculos de um Quadrado:</h3><br>
        <input type="hidden" name="id" id="id" size="25" value="0">
        Valor dos Lados:<input type="text" name="lado" id="lado" size="25" value=""><br><br>
        Cor:<input type="color" name="cor" id="cor" size="25" value=""><br><br>
        <button name="processa" id="processa" value="salvar" type="submit"  class="btn btn-outline-info">Salvar</button>
    <br><br>


    <p> Pesquisar por:</p><br>
        <form method="post" action="">
                <input type="radio" name="tipo" value="1" class="form-check-input" <?php if ($tipo == "1") echo "checked" ?>>Lado<br>
                <input type="radio" name="tipo" value="2" class="form-check-input" <?php if ($tipo == "2") echo "checked" ?>>Cor<br>
    </form>

    <table class="table table-hover">
            <tr><td><b>ID</b></td>
                <td><b>Lado</b></td>
                <td><b>Cor</b></td>
                <td><b>Editar</b></td>
                <td><b>Excluir</b></td>
            </tr>

<?php  

    $quad = new Quadrado(0, 0, "");
    $quad->listarQuadrado();
        foreach ($quad->listarQuadrado() as $linha) {
    ?>
        <tr>
            <th scope="row"><?php echo $linha['id'];?></th>
            <th scope="row"><?php echo $linha['lado'];?></th>
            <td scope="row"><?php echo $linha['cor'];?></td>
            <td><a href='cad.php?processa=editar&id=<?php echo $linha['id'];?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a></td>
            <td><?php echo " <a href='processa.php?processa=excluir&id={$linha['id']}')>";?><td><?php echo " <a href='processa.php?processa=excluir&id={$linha['id']}')>";?><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
    </svg></a></td>
    </td>
        </tr>
            <?php } ?> 
    </body>
    </html>