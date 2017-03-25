<?php 	
	
	echo $_SESSION["numPerguntas"];

	include_once 'funcoes.php';	
	$jogadores = buscaRanking();
?>
<!DOCTYPE>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quiz</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
</head>
<body>
  <div class="content">
    	   <h3>Ranking</h3>
		   <?php
				for($i=0;$i<count($jogadores);$i++){		   
		   ?>		   
			   <p class="option"><?=$jogadores[$i]["total"]?> - <?=$jogadores[$i]["email"]?></p>			
			<?php
				}
			?>
		   <input class="botao" type="submit" value="In&iacute;cio" id="inicio" onclick="document.location='registrar.php'" />
  	</form>
	<div id="resposta">&nbsp;</div>
    <br/>
  </div>
  <video id="video" class="video" muted loop autoplay>
    <source src="video/background.mp4" type="video/mp4">    
  </video>  
</body>
</html>
