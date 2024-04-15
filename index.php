<?php
   session_start();

   ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Acssar o Chat</h1>


    <?php
        $dados = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(!empty($dados['acessar'])){
            $_SESSION['usuario'] = $dados['usuario'];
            header('Location:chat.php');
        }

    ?>
    <form action="" method="post">
        <label for="">Nome</label>
        <input type="text" name="usuario" id="usuario" placeholder="Digite seu nome">
        <br>
        <br>
        <input type="submit" name="acessar" value="Acessar">
        <br>
        <br>
    </form>
</body>

</html>