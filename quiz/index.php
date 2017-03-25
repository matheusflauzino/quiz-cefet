<?php
	  include_once 'funcoes.php';
	  if(empty($_SESSION["usuario"])){header("Location:registrar.php");}	  
	  $perguntas = buscaPerguntas();
	  $aleatorio = array_rand($perguntas);
	  $questao = $perguntas[$aleatorio]["cd_questao"];  	  
	  $q_cod = array(":cod_questao" => $questao);
	  $alternativas = buscaAlternativas($q_cod);  
	  $l_alternativa = array("0"=>"a","1"=>"b","2"=>"c","3"=>"d","4"=>"e","5"=>"f","6"=>"g");
?>
<!DOCTYPE>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quiz</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script>
/*
	(function() {
	  //seleciona o elemento video pelo ID "video"
	  var video = document.getElementById("video");  
	  //Verifica se o navegador possui suporte para dar play no video
	  video.addEventListener( "canplay", function() {
		//Chama o método play
		video.play();
	  });  
	})();
	*/
	$(document).ready(function(){			
		$('#validaPergunta').submit(function(){
					var dados = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "valida.php",
						data: dados,
						success: function(data)
						{
							$("#responder").hide();
							$("#resposta").append(data);
						}
					});				
					return false;
		});
	});
</script>
</head>
<body>
  <div class="content">
  	<form action="valida.php" method="post" id="validaPergunta">
			<input type="hidden" name="codquestao" value="<?=$questao?>">
    	   <h3><?=$alternativas[0]["ds_questao_pergunta"]?></h3>
		   <?php
				for($i=0;$i<count($alternativas);$i++){		   
		   ?>		   
			   <p class="option"><label><input type="radio" name="cd_alternativa" value="<?=$alternativas[$i]['cd_alternativa']?>" />
					<?=$l_alternativa[$i].")".$alternativas[$i]['ds_alternativa']?>
			   </label></p>			
			<?php
				}
			?>
		   <input class="botao" type="submit" value="Responder" id="responder" />
  	</form>
	<div id="resposta">&nbsp;</div>
    <br/>
  </div>
  <video id="video" class="video" muted loop autoplay>
    <source src="video/background.mp4" type="video/mp4">    
  </video>  
</body>
</html>
