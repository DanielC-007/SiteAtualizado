<?php
include_once('config.php');

$dados = mysqli_query($conexao, "select * from postagens;");

if(isset($_POST['btn'])){
    if(!empty($_POST['Ti']) && !empty($_POST['desc'])){
        $titulo = $_POST['Ti'];
        $desc = $_POST['desc'];

        mysqli_query($conexao, "insert into postagens values (DEFAULT, '$titulo', '$desc');");
        header("location: index.php");
    }
    else{
        echo "preencha todos os campos";
    }
}

if(isset($_POST['l'])){
    mysqli_query($conexao, "truncate table postagens;");
    header("location: index.php");
}

if(isset($_POST['e'])){
    $id = $_POST['e'];
    mysqli_query($conexao, "DELETE FROM postagens WHERE idpost = '$id';");
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
        <h1>Noticiário</h1>
        
    </header>
<style>
        *{
            overflow-x: hidden;
        }
        body {
            background-color: #252525;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        header {
            width: 100%;
            background-color: #222;
            padding: 20px;
            display: flex;
        }

        header * {
            display: flex;
        }

        main{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px;
            flex-direction: column;
        }
        
        form {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"] {
            width: 99%;
            padding: 8px;
            margin-bottom: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
        }
        
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #555;
        }
        
        .noticia {
            margin-bottom: 20px;
            display: flex;
            padding: 10px;
            background-color: #333;
            border-radius: 5px;
            justify-content: center;
            align-items: center;
            width: 75%;
        }
        
        .conteudo {
            width: 80%;
            padding: 10px;
        }
        
        h1 {
            font-size: 24px;
            margin-top: 0;
            margin-bottom: 10px;
        }
        
        hr {
            border: none;
            border-top: 1px solid #555;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        
        button[name="e"] {
            padding: 5px 10px;
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        button[name="e"]:hover {
            background-color: #A00;
        }
    </style>
    <form method="POST">
        <label for="">Titulo</label>
        <input type="text" name="Ti" id="Ti">
        <label for="">Descrição</label>
        <input type="text" name="desc" id="desc">
        <input type="submit" name="btn" id="btn" value="Enviar">
    </form>
    <main>
        <?php
        while($dado = mysqli_fetch_assoc($dados)){
            echo "<div class=\"noticia\"><div class=\"conteudo\"><h1>".$dado['titulo']."</h1>"." ".$dado['conteudo']."</div><form method=\"POST\">
            <button type=\"submit\" name=\"e\" id=\"e\" class=\"excluir\"value=".$dado['idpost'].">Excluir</button>
        </form></div>";
        }
    ?>
    <form method="POST">
            <input type="submit" name="l" id="l" class="e" value="Limpar Tudo">
        </form>
    </main>
</body>
</html>