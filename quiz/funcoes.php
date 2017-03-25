<?php
session_start();
include_once 'conn.php';

function verificaCadastro(){
	$sql = "SELECT * FROM tbl_jogadores WHERE ds_email_jogador='".$_POST["email"]."'";
	$stmt = $GLOBALS['conn']->query($sql);	
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	if(count($rows) > 0){
		header("Location:registrar.php?jog=true");
	}	
	else{
		$jogador = array(":nome"=>$_POST["nome"],":email"=>$_POST["email"]);
		cadJogador($jogador );
	}	
	return $rows;
}


function buscaRanking(){	
	$sql = "SELECT count(*) as total,email FROM tbl_respostas_jogador where flg_acertou='C'  GROUP BY email order by total desc";
	$stmt = $GLOBALS['conn']->prepare($sql);		
	$result = $stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $rows;

}


function buscaPerguntas(){	
	if($_SESSION["numPerguntas"] <= 10){
		$sql = "SELECT * FROM tbl_questoes where cd_questao not in(select cd_questao from tbl_respostas_jogador where email='".$_SESSION["usuario"]."')";	
		$stmt = $GLOBALS['conn']->prepare($sql);		 
		$result = $stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if(count($rows) <= 0){
			header("Location:ranking.php");
		}
		else{
			return $rows;
		}
		
	}
	else{
		header("Location:ranking.php");
	}
}

function buscaAlternativas($questao = array()){		
	$sql = "SELECT a.cd_questao,a.cd_alternativa,a.ds_alternativa,a.x_correta,q.ds_questao_pergunta FROM 
			tbl_questoes_alternativas a
			inner join tbl_questoes q
			on a.cd_questao=q.cd_questao
			WHERE a.cd_questao=:cod_questao";
			
	$stmt = $GLOBALS['conn']->prepare($sql);		 
	$result = $stmt->execute($questao);
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
}

function validaResposta($questao = array()){		
	$sql = "SELECT * FROM tbl_questoes_alternativas WHERE cd_questao=:cod_questao and cd_alternativa=:cd_alternativa";			
	$stmt = $GLOBALS['conn']->prepare($sql);		 
	$result = $stmt->execute($questao);
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);	
	
	$_SESSION["numPerguntas"] = $_SESSION["numPerguntas"] + 1;
	$stmt = $GLOBALS['conn']->prepare("INSERT INTO tbl_respostas_jogador(email,cd_questao,cd_alternativa,flg_acertou) VALUES('".$_SESSION["usuario"]."',:cod_questao,:cd_alternativa,'".$rows[0]["x_correta"]."') ");		 
	$result = $stmt->execute($questao);
	
	return $rows;
}

function opcaoCorreta($questao){	
    $sql = "SELECT * FROM tbl_questoes_alternativas WHERE cd_questao=".$questao." and x_correta='C'";	
	$stmt = $GLOBALS['conn']->prepare($sql);		 
	$result = $stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $rows[0]["ds_alternativa"];
}

function cadJogador($jogador = array()){	
	
	$sql = "INSERT INTO tbl_jogadores(ds_nome_jogador,ds_email_jogador,vl_pontuacao,vl_quantidade_partidas) VALUES(:nome,:email,0,1)";
	$stmt = $GLOBALS['conn']->prepare($sql);		 
	$result = $stmt->execute($jogador);	
	
	//inicializando Controle do Jogador
	$_SESSION["usuario"] = $jogador[":email"];
	$_SESSION["numPerguntas"] = 0;
	
	header("Location:index.php");
	
}




