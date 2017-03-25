<?php
	session_start();
	include_once 'funcoes.php';
	unset($_SESSION["usuario"]);
	unset($_SESSION["numPerguntas"]);
	
	if(!empty($_POST["nome"]) and !empty($_POST["email"])){			
		verificaCadastro();
	}
?>
<!DOCTYPE>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quiz</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script>
(function() {

  //seleciona o elemento video pelo ID "video"
  var video = document.getElementById("video");
  
  //Verifica se o navegador possui suporte para dar play no video
  video.addEventListener( "canplay", function() {
    //Chama o método play
    video.play();
  });
  
})();
</script>
</head>

<body>
  
  <div class="content">
  	<form action="registrar.php" method="POST">    
		<h1>Registre-se para jogar</h1>
		<hr />
		<p><?php if(@$_GET["jog"] == true){ echo "Você já jogou";} ?></p>
		<p>Nome</p>
		<p><input type="text" name="nome" id="nome"></p>
		<p>Email</p>
		<p><input type="email" name="email" id="email"></p>	
		<p></p>		
		<br/>
		<p><input class="botao" type="submit" value="Jogar" /></p>
  	</form>    
</div>
  <video id="video" class="video" muted loop autoplay>
    <source src="video/background.mp4" type="video/mp4">    
  </video>  
</body>
</html>
