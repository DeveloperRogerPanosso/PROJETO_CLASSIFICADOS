<?php
		require_once "autoload.php";

		use \App\ModelsDAO\AnunciosDao;

		$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

		if($id == true) {
			$anunciosdao = new AnunciosDao();
			$infoAnuncio = $anunciosdao->getAnuncioId($id);
		}else {
			header("Location: meus_anuncios.php");
			exit;
		}
?>
<?php require_once "Pages/Parcials/header.php"; ?>
<?php require_once "verifica_sessao_login_usuario.php"; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 order-1 mt-4">
			<h1 class="page-header font-weight-normal mb-3">Meus Anúncios - Editar Anúncio</h1>
			<div class="alert alert-primary fade show shadow-sm" role="alert">Atualize os campos necessários abaixo realizando atualização do anúncio!!</div>
			<?php require_once "require_sessions.php"; ?>
			<hr class="my-2 bg-light">
			<form name="updateAnúncio" class="needs-validation" novalidate method="POST" enctype="multipart/form-data" action="update.php">
				<div class="form-group">
					<label for="primeira_imagem" class="form-label font-weight-normal">Primeira Imagem</label>
					<input type="hidden" name="id" class="form-control" id="id" value="<?=$infoAnuncio->getId();?>"/>
					<input type="text" name="primeira_imagem" class="form-control" id="primeira_imagem" value="<?=$infoAnuncio->getPrimeiraImagem();?>">
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor selecione a primeira imagem referente ao produto.</div>
				</div>
				<div class="form-group">
					<label for="segunda_imagem" class="form-label font-weight-normal">Segunda Imagem</label>
					<input type="text" name="segunda_imagem" class="form-control" id="segunda_imagem" value="<?=$infoAnuncio->getSegundaImagem();?>">
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor selecione a segunda imagem referente ao produto.</div>
				</div>
				<div class="form-group">
					<label for="terceira_imagem" class="form-label font-weight-normal">Terceira Imagem</label>
					<input type="text" name="terceira_imagem" class="form-control" id="terceira_imagem" value="<?=$infoAnuncio->getTerceiraImagem();?>">
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor selecione a terceira imagem referente ao produto.</div>
				</div>
				<div class="form-group">
					<label for="video_demonstracao" class="form-label font-weight-normal">Video de Demonstração</label>
					<input type="text" name="video_demonstracao" class="form-control" id="video_demonstracao" value="<?=$infoAnuncio->getVideoDemonstracao();?>">
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor selecione a terceira imagem referente ao produto.</div>
				</div>
				<div class="form-group">
					<label for="id_categoria" class="form-label font-weight-normal">Categoria</label>
					<select name="id_categoria" class="form-control" id="id_categoria" required>
					<?php
						require_once "autoload.php";

						use \App\ModelsDAO\CategoriasDao;

						$categoriasdao = new CategoriasDao();
						$categorias = $categoriasdao->getCategoriasAll();
						foreach ($categorias as $infoCategoria) {
					?>
						<option value="<?=$infoCategoria->getId();?>" <?=($infoAnuncio->getIdCategoria() == $infoCategoria->getId())?"selected=selected":"";?>><?=$infoCategoria->getNome();?></option>
					<?php
						}
					?>
					</select>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor selecione a categoria do anúncio.</div>
				</div>
				<div class="form-group">
					<label for="titulo" class="form-label font-weight-normal">Titulo</label>
					<input type="text" name="titulo" class="form-control" id="titulo" value="<?=$infoAnuncio->getTitulo();?>"/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe o titulo do anúncio.</div>
				</div>
				<div class="form-group">
					<label for="descricao" class="form-label font-weight-normal">Descrição</label>
					<textarea name="descricao" rows="4" class="form-control" id="descricao"><?=$infoAnuncio->getDescricao();?></textarea>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe a descrição do anúncio.</div>
				</div>
				<div class="form-group">
					<label for="valor" class="form-label font-weight-normal">Valor</label>
					<input type="text" name="valor" class="form-control" id="valor" value="<?=$infoAnuncio->getValor();?>"/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe o valor do produto a ser adicionado.</div>
				</div>
				<div class="form-group">
					<label for="estado" class="form-label font-weight-normal">Estado de Conservação</label>
					<select name="estado" class="form-control" id="estado" required>
						<option value="ruim" <?php echo ($infoAnuncio->getEstado() == "Ruim")?"selected=selected":"";?>>Ruim</option>
						<option value="razoavel" <?php echo ($infoAnuncio->getEstado() == "Razoavel")?"selected=selected":"";?>>Razoável</option>
						<option value="bom" <?php echo($infoAnuncio->getEstado() == "Bom")?"selected=selected":"";?>>Bom</option>
						<option value="otimo" <?php echo ($infoAnuncio->getEstado() == "Otimo")?"selected=selected":"";?>>Ótimo</option>
					</select>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor selecione o estado de conservação do produto a ser adicionado.</div>
				</div>
				<div class="form-group mb-2">
					<button type="submit" class="btn btn-success btn-md shadow-sm mb-0">Atualizar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require_once "Pages/Parcials/footer.php"; ?>