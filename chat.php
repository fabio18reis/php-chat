
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
    <h2>Chat</h2>
    <p> Bem vindo - <span id="nome-usuario"><?php echo $_SESSION['usuario']; ?></span></p>

    <label for="">Send mensage</label>
    <input type="text" name="mensagem" id="mensagem" placeholder="Digite a mensagem" value><br><br>
    <input type="button" onclick="enviar()" value="Enviar"><br><br>


    
    <span id="mensagem-chat"></span>





    <script>
        const mensagemchat = document.getElementById('mensagem-chat');

       const ws = new WebSocket('ws://10.110.103.68:8080')

       ws.onopen = (e) => {
            console.log('Conected');
       }

       ws.onmessage = (mensagemrecebida)=>{
       let resultado = JSON.parse(mensagemrecebida.data);
        mensagemchat.insertAdjacentHTML('beforeend', `${resultado.mensagem}<br>`);

       }


       const enviar = ()=>{
        let mensagem = document.getElementById("mensagem");
        let usuario = document.getElementById("nome-usuario").textContent;
        let dados = {
            mensagem: `${usuario}: ${mensagem.value}<br><br>`
        }

        ws.send(JSON.stringify(dados));

        mensagemchat.insertAdjacentHTML('beforeend', `${usuario}: ${mensagem.value}<br>`);
        mensagem.value = '';
       }
    </script>
</body>
</html>