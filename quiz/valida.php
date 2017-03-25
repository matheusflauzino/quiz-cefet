<?php
	require_once 'funcoes.php';
	$questao = array(
						":cod_questao"=>$_POST["codquestao"],
						":cd_alternativa"=>$_POST["cd_alternativa"]
				);

	$resposta = validaResposta($questao);


	if(empty($resposta[0]["x_correta"])){
		echo "<h3>Resposta incorreta! A op&ccedil;&atilde;o correta seria: <span style='color:red'>".opcaoCorreta($_POST["codquestao"])."</span></h3>";	
	}
	else{
		echo "<h3>Parab&eacute;ns Voc&ecirc; acertou!</h3>";
	}
?>

<input class="botao" type="submit" value="Pr&oacute;xima" onclick="document.location='index.php'" />
