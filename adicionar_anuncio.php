<?php require_once "Pages/Parcials/header.php"; ?>
<?php require_once "verifica_sessao_login_usuario.php"; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 order-1 mt-4">
			<h1 class="page-header font-weight-normal mb-3">Meus Anúncios - Adicionar Anúncio</h1>
			<div class="alert alert-primary fade show shadow-sm" role="alert">Preencha os campos abaixo realizando adicionando o anúncio !!</div>
			<?php require_once "require_sessions.php"; ?>
			<hr class="my-2 bg-light">
			<small class="form-text text-muted">* Você deve selecionar três imagens referente a seu anúncio</small>
			<form name="addAnuncio" class="needs-validation" novalidate method="POST" enctype="multipart/form-data" action="insert_anuncio.php">
				<div class="form-group">
					<label for="primeira_imagem" class="form-label font-weight-normal">Primeira Imagem</label>
					<input type="file" name="primeira_imagem" class="form-control" id="primeira_imagem" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor selecione a primeira imagem referente ao produto.</div>
				</div>
				<div class="form-group">
					<label for="segunda_imagem" class="form-label font-weight-normal">Segunda Imagem</label>
					<input type="file" name="segunda_imagem" class="form-control" id="segunda_imagem" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor selecione a segunda imagem referente ao produto.</div>
				</div>
				<div class="form-group">
					<label for="terceira_imagem" class="form-label font-weight-normal">Terceira Imagem</label>
					<input type="file" name="terceira_imagem" class="form-control" id="terceira_imagem" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor selecione a terceira imagem referente ao produto.</div>
				</div>
				<small class="form-text text-muted">* Você pode optar por realizar uma demonstração de seu anuncio</small>
				<div class="form-group">
					<label for="video" class="form-label font-weight-normal">Video de demonstração</label>
					<input type="file" name="video" class="form-control" id="video"/>
				</div>
				<div class="card mb-0">
					<div class="card-header text-primary">Imagens dos Anúncio de <?=$_SESSION["clogin"];?></div>
					<div class="card-body">
						<?php
							require_once "autoload.php";

							use \App\ModelsDAO\AnunciosDao;

							$anunciosdao = new AnunciosDao();
							$imagemAnuncios = $anunciosdao->getImagensAnuncios($_SESSION["clogin"]);
							if(!empty($imagemAnuncios)) {
								foreach ($imagemAnuncios as $imagemAnuncio) {
								?>
									<img src="<?=$imagemAnuncio->getPrimeiraImagem();?>" width="100" class="img-fluid shadow-sm img-thumbnail mr-1 mb-2" title="<?=$imagemAnuncio->getTitulo();?>">
									<img src="<?=$imagemAnuncio->getSegundaImagem();?>" width="100" class="img-fluid shadow-sm img-thumbnail mr-1 mb-2" title="<?=$imagemAnuncio->getTitulo();?>">
									<img src="<?=$imagemAnuncio->getTerceiraImagem();?>" width="100" class="img-fluid shadow-sm img-thumbnail mr-1 mb-2" title="<?=$imagemAnuncio->getTitulo();?>">
									<strong>-</strong>
								<?php
								}
							}else {
								?>
								<div class="alert alert-warning fade show shadow-sm" role="alert">
									Não há imagens referentes a anúncios a serem exibidas em sua conta no momento !!
								</div>
								<?php
							}
						?>
					</div>
				</div>
				<small class="form-text text-muted">* Você deve informar os seguintes dados para realizar seu anúncio</small>
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
						<option value="<?=$infoCategoria->getId();?>"><?=$infoCategoria->getNome();?></option>
					<?php
						}
					?>
					</select>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor selecione a categoria do anúncio.</div>
				</div>
				<div class="form-group">
					<label for="titulo" class="form-label font-weight-normal">Titulo</label>
					<input type="text" name="titulo" class="form-control" autocomplete="off" placeholder=" Titulo.. " id="titulo" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe o titulo do anúncio.</div>
				</div>
				<div class="form-group">
					<label for="descricao" class="form-label font-weight-normal">Descrição</label>
					<textarea name="descricao" rows="4" class="form-control" autocomplete="off" placeholder=" Descrição.. " id="descricao" required></textarea>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe a descrição do anúncio.</div>
				</div>
				<div class="form-group">
					<label for="valor" class="form-label font-weight-normal">Valor</label>
					<input type="text" name="valor" class="form-control" autocomplete="off" placeholder=" 00,00.. " id="valor" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe o valor do produto a ser adicionado.</div>
				</div>
				<div class="form-group">
					<label for="estado" class="form-label font-weight-normal">Estado de Conservação</label>
					<select name="estado" class="form-control" id="estado" required>
						<option value="ruim">Ruim</option>
						<option value="razoavel">Razoável</option>
						<option value="bom">Bom</option>
						<option value="otimo">Ótimo</option>
					</select>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor selecione o estado de conservação do produto a ser adicionado.</div>
				</div>
				<div class="form-group mb-2">
					<button type="submit" class="btn btn-success btn-md shadow-sm mb-0">Adicionar</button>
					<button type="reset" class="btn btn-danger btn-md shadow-sm mb-0">Resetar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require_once "Pages/Parcials/footer.php"; ?>