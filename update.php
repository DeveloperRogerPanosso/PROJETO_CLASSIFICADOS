<?php
		require_once "autoload.php";

		use \App\Models\Anuncios;
		use \App\ModelsDAO\AnunciosDao;

		$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
		$primeira_imagem = filter_input(INPUT_POST, "primeira_imagem", FILTER_SANITIZE_STRING);
		$segunda_imagem = filter_input(INPUT_POST, "segunda_imagem", FILTER_SANITIZE_STRING);
		$terceira_imagem = filter_input(INPUT_POST, "terceira_imagem", FILTER_SANITIZE_STRING);
		$video_demonstracao = filter_input(INPUT_POST, "video_demonstracao", FILTER_SANITIZE_STRING);
		$id_categoria = filter_input(INPUT_POST, "id_categoria", FILTER_SANITIZE_STRING);
		$titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_STRING);
		$descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRING);
		$valor = filter_input(INPUT_POST, "valor", FILTER_SANITIZE_STRING);
		$estado = filter_input(INPUT_POST, "estado", FILTER_SANITIZE_STRING);
		
		if($id AND $primeira_imagem AND $segunda_imagem AND $terceira_imagem AND $video_demonstracao AND $id_categoria AND $titulo AND $descricao AND $valor AND $estado) {
			$anuncio = new Anuncios();
			$anuncio->setId($id);
			$anuncio->setPrimeiraImagem($primeira_imagem);
			$anuncio->setSegundaImagem($segunda_imagem);
			$anuncio->setTerceiraImagem($terceira_imagem);
			$anuncio->setVideoDemonstracao($video_demonstracao);
			$anuncio->setIdCategoria($id_categoria);
			$anuncio->setTitulo($titulo);
			$anuncio->setDescricao($descricao);
			$anuncio->setValor($valor);
			$anuncio->setEstado($estado);

			$anunciosdao = new AnunciosDao();
			$anunciosdao->updateAnuncio($anuncio);
		}else {
			header("Location: meus_anuncios.php");
			exit;
		}
?>