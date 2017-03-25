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
  	<form action="index.php">
    	<h1>Sua Nota: 70%</h1>
    
   
    
    <input class="botao" type="submit" value="Tentar Novamente" />
    
  	</form>
    
    <h1>Ranking</h1>
    <hr />
    <p>1º - Janai Levi</p>
    <p>2º - Gustavo Dominguete</p>
    <p>3º - Júlio</p>
    <p>4º - Gleisson</p>
    <p>5º - Matheus </p>
    
</div>

  <video id="video" class="video" muted loop autoplay>
    <source src="video/background.mp4" type="video/mp4">
    
  </video>
  
</body>
</html>
