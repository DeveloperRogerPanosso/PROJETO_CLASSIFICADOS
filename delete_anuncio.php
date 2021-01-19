<?php
		session_start();
		
		require_once "verifica_sessao_login_usuario.php";
		require_once "autoload.php";

		use \App\ModelsDAO\AnunciosDao;

		$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

		if($id == true) {
			$anunciosdao = new AnunciosDao();
			$anunciosdao->deleteAnuncio($id);
		}else {
			header("Location: meus_anuncios.php");
			exit;
		}
?>