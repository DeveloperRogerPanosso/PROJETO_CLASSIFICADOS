<?php require_once "Pages/Parcials/header.php" ?>
<?php require_once "verifica_sessao_login_usuario.php"; ?>
<?php
	require_once "autoload.php";

	use \App\ModelsDAO\AnunciosDao;
	use \App\ModelsDAO\UsuariosDao;

	$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
	if($id == true) {
		$anunciosdao = new AnunciosDao();
		$infoAnuncio = $anunciosdao->getProdutoAnuncioId($id);
		$usuariosdao = new UsuariosDao();
		$infoUsuario = $usuariosdao->getUsuarioAnuncioId($infoAnuncio->getEmailUsuario());
	}else {
		header("Location: index.php");
		exit;
	}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 order-1 mt-4 mb-3">
			<div class="card shadow-sm mb-0">
				<div class="card-header bg-white">
					<div class="carousel slide" id="CarouselImages<?=$infoAnuncio->getId();?>" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#CarouselImages<?=$infoAnuncio->getId();?>" data-slide-to="0" class="active"></li>
							<li data-target="#CarouselImages<?=$infoAnuncio->getId();?>" data-slide-to="1"></li>
							<li data-target="#CarouselImages<?=$infoAnuncio->getId();?>" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="<?=$infoAnuncio->getPrimeiraImagem();?>" class="d-block img-fluid" alt="Primeira Imagem" title="<?=$infoAnuncio->getTitulo();?>"/>
							</div>
							<div class="carousel-item">
								<img src="<?=$infoAnuncio->getSegundaImagem();?>" class="d-block img-fluid" alt="Segunda Imagem" title="<?=$infoAnuncio->getTitulo();?>"/>
							</div>
							<div class="carousel-item">
								<img src="<?=$infoAnuncio->getTerceiraImagem();?>" class="d-block img-fluid" alt="Terceira Imagem" title="<?=$infoAnuncio->getTitulo();?>"/>
							</div>
						</div>
						<a class="carousel-control-prev" href="#CarouselImages<?=$infoAnuncio->getId();?>" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon"></span>
							<span class="sr-only">Anterior</span>
						</a>
						<a class="carousel-control-next" href="#CarouselImages<?=$infoAnuncio->getId();?>" role="button" data-slide="next">
							<span class="carousel-control-next-icon"></span>
							<span class="sr-only">Próximo</span>
						</a>
					</div>
				</div>
				<div class="card-body bg-light">
					<div class="card-title text-primary"><?=$infoAnuncio->getTitulo();?> - Categoria: <?=$infoAnuncio->getIdCategoria();?></div>
					<div class="card-text">
						<p class="font-weight-normal"><?=$infoAnuncio->getDescricao();?></p>
						<p class="font-weight-normal"><a href="#" data-toggle="modal" data-target="#DemonstracaoProduto<?=$infoAnuncio->getId();?>">Visualizar Demonstração</a></p>
						<?php require "Pages/Modais/modal_demonstracao_produto.php"; ?>
						<p class="font-weight-normal text-success">Valor: R$<?=str_replace(".",",",$infoAnuncio->getValor());?> - Estado: <?=$infoAnuncio->getEstado();?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8 order-2 mt-3 mb-3">
			<h2 class="page-header font-weight-normal">Dados do Usuário</h2>
			<hr class="my-2 bg-primary">
			<p class="font-weight-normal">Publicado por: <?=$infoUsuario->getNome(); ?></p>
			<p class="font-weight-normal">E-Mail para Contato: <?=$infoUsuario->getEmail();?></p>
			<p class="font-weight-normal">Telefone para Contato: <?=$infoUsuario->getTelefone();?></p>
			<div class="alert alert-primary fade show shadow-sm" role="alert">Envie uma mensagem para o usuário !!</div>
			<?php require_once "require_sessions.php"; ?>
			<form name="mensagem" class="needs-validation" novalidate method="POST" action="insert_mensagem.php?usuario=<?=$infoAnuncio->getEmailUsuario();?>&titulo=<?=$infoAnuncio->getTitulo();?>">
				<div class="form-group">
					<label for="nome" class="form-label font-weight-normal">Nome</label>
					<input type="text" name="nome" class="form-control" autocomplete="off" placeholder=" Nome.. " id="nome" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe seu nome para contato.</div>
				</div>
				<div class="form-group">
					<label for="email" class="form-label font-weight-normal">E-Mail</label>
					<input type="email" name="email" class="form-control" autocomplete="off" placeholder=" exemplo@hotmail.com.. " id="email" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe seu e-mail para contato.</div>
				</div>
				<div class="form-group">
					<label for="telefone" class="form-label font-weight-normal">Telefone</label>
					<input type="tel" name="telefone" class="form-control" autocomplete="off" placeholder=" (00) 0000-0000 " id="telefone" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe seu telefone para contato.</div>
				</div>
				<div class="form-group">
					<label for="mensagem" class="form-label font-weight-normal">Mensagem</label>
					<textarea name="mensagem" rows="4" class="form-control" autocomplete="off" placeholder=" Escreva sua Mensagem.. " id="mensagem" required></textarea>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe sua mensagem para contato.</div>
				</div>
				<div class="form-group mb-2">
					<button type="submit" class="btn btn-success btn-md shadow-sm mb-0 mt-0">Enviar</button>
					<button type="reset" class="btn btn-danger btn-md shadow-sm mb-0 mt-0">Resetar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require_once "Pages/Parcials/footer.php"; ?>