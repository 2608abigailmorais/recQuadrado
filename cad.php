<!DOCTYPE html>
<?php
    include_once "processa.php";
    $processa = isset($_GET['processa']) ? $_GET['processa'] : "";
    $dados;
    if ($processa == 'editar'){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $dados = buscarDados($id);
}
    $title = "Cadastro";
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?php echo $title ?></title>
</head>
<body>
    <br>

        <h3>Insira os dados</h3>
            <form method="post" action="processa.php">
                
            <p>ID:</p>
                <input readonly  type="text" name="id" id="id" value="<?php if ($processa == "editar") echo $dados['id']; else echo 0; ?>"><br>

            <p>Lado:</p>
                <input name="lado" id="lado" type="text" required="true" value="<?php if ($processa == "editar") echo $dados['lado']; ?>"><br>         
            
            <p>Cor:</p>
                <input name="cor" id="cor" type="color" required="true" value="<?php if ($processa == "editar") echo $dados['cor']; ?>"><br>

            <button name="processa" value="salvar" id="processa" type="submit">Salvar</button>
            </form>
</body>
</html>