<?php require_once "Pages/Parcials/header.php"; ?>
<?php require_once "verifica_sessao_login_usuario.php"; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 order-1 mt-4">
			<h1 class="page-header font-weight-normal mb-3">Meus Anúncios</h1>
			<a class="text-primary" href="adicionar_anuncio.php">
				<button type="button" class="btn btn-primary btn-md shadow-sm mb-3">Adicionar Anúncio</button>
			</a>
			<a class="text-primary" href="#" data-toggle="modal" data-target="#TotalAnuncios">
				<button type="button" class="btn btn-primary btn-md shadow-sm mb-3">Total de Anúncios</button>
			</a>
			<?php require_once "Pages/Modais/modal_total_anuncios.php"; ?>
			<div class="alert alert-primary fade show shadow-sm" role="alert">Segue abaixo os principais anuncios adicionados !!</div>
			<?php require_once "require_sessions.php"; ?>
			<hr class="my-2 bg-light">
			<div class="table-responsive-md">
				<table class="table table-striped table-hover table-md text-center">
					<caption class="text-primary">Listagem de Anúncios</caption>
					<thead class="thead-dark text-center">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Imagem</th>
							<th scope="col">Video_Demonstração</th>
							<th scope="col">Categoria</th>
							<th scope="col">Titulo</th>
							<th scope="col">Descrição</th>
							<th scope="col">Valor</th>
							<th scope="col">Estado</th>
							<th scope="col">Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require_once "autoload.php";

							use \App\ModelsDAO\AnunciosDao;

							$anunciosdao = new AnunciosDao();
							$anuncio = $anunciosdao->getMeusAnuncios($_SESSION["clogin"]);
							if(isset($anuncio) AND !empty($anuncio)) {
								foreach ($anuncio as $infoAnuncio) {
								//print_r($infoAnuncio);
						?>
								<tr>
									<td><?=$infoAnuncio->getId();?></td>
									<td>
										<a class="text-primary mb-0" href="#" data-toggle="modal" data-target="#ImagemAnuncio<?=$infoAnuncio->getId();?>">Visualizar Imagem</a>
										<?php require "Pages/Modais/modal_imagens_anuncios.php"; ?>
									</td>
									<td>
										<?php if($infoAnuncio->getVideoDemonstracao() == "Format/Images/Midias"): ?>
											<p>Não há demonstrações referentes ao anuncio !!</p>
										<?php else: ?>
											<a class="text-primary mb-0" href="#" data-toggle="modal" data-target="#VideoDemonstracao<?=$infoAnuncio->getId();?>">Visualizar Demonstração</a>
											<?php require "Pages/Modais/modal_videos_demonstracoes.php"; ?>
										<?php endif;?>
									</td>
									<td><?=$infoAnuncio->getIdCategoria();?></td>
									<td><?=$infoAnuncio->getTitulo();?></td>
									<td>
										<a class="text-primary mb-0" href="#" data-toggle="modal" data-target="#DescricaoAnuncio<?=$infoAnuncio->getId();?>">Visualizar Descrição</a>
										<?php require "Pages/Modais/modal_descricoes_anuncios.php"; ?>
									</td>
									<td>R$ <?=str_replace(".",",",$infoAnuncio->getValor());?></td>
									<td><?=$infoAnuncio->getEstado();?></td>
									<td>
										<a class="text-success" href="update_anuncio.php?id=<?=$infoAnuncio->getId();?>">Editar Anúncio</a> -
										<a class="text-danger" href="delete_anuncio.php?id=<?=$infoAnuncio->getId();?>" onclick="return confirm('Tem certeza de que deseja excluir este anúncio ?')">Excluir Anúncio</a>
									</td>
								</tr>
						<?php
								}
							}else {
						?>
							<div class="alert alert-warning fade show shadow-sm" role="alert">Não há anuncios cadastrados em sua conta no momento !!</div>
						<?php
							}
						?>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
</div>
<?php require_once "Pages/Parcials/footer.php"; ?>
