<?php
		require_once "autoload.php";

		use \App\Models\Anuncios;
		use \App\ModelsDAO\AnunciosDao;

		$id_categoria = filter_input(INPUT_POST, "id_categoria", FILTER_SANITIZE_STRING);
		$titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_STRING);
		$descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRING);
		$valor = filter_input(INPUT_POST, "valor", FILTER_SANITIZE_STRING);
		$estado = filter_input(INPUT_POST, "estado", FILTER_SANITIZE_STRING);

		require_once "Upload/upload1.php";
		require_once "Upload/upload2.php";
		require_once "Upload/upload3.php";
		require_once "Upload/upload4.php";
		$enderecos_imagens = array(
			"primeira_imagem" => "Format/Images/Anuncios/".$_FILES["primeira_imagem"]["name"],
			"segunda_imagem" => "Format/Images/Anuncios/".$_FILES["segunda_imagem"]["name"],
			"terceira_imagem" => "Format/Images/Anuncios/".$_FILES["terceira_imagem"]["name"]
		);
		$endereco_video = "Format/Images/Midias/".$_FILES["video"]["name"];

		
		$anuncio = new Anuncios();
		$anuncio->setPrimeiraImagem($enderecos_imagens["primeira_imagem"]);
		$anuncio->setSegundaImagem($enderecos_imagens["segunda_imagem"]);
		$anuncio->setTerceiraImagem($enderecos_imagens["terceira_imagem"]);
		$anuncio->setVideoDemonstracao($endereco_video);
		$anuncio->setIdCategoria($id_categoria);
		$anuncio->setTitulo($titulo);
		$anuncio->setDescricao($descricao);
		$anuncio->setValor($valor);
		$anuncio->setEstado($estado);

		$anunciosdao = new AnunciosDao();
		$anunciosdao->insertAnuncio($anuncio);
?>