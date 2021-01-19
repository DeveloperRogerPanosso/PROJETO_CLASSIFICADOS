<?php require_once "Pages/Parcials/header.php"; ?>
<?php require_once "verifica_sessao_login_usuario.php"; ?>
<?php
	require_once "autoload.php";

	use \App\ModelsDAO\AnunciosDao;

	$categoria = filter_input(INPUT_GET, "categoria", FILTER_SANITIZE_STRING);
	$valor = explode("-",filter_input(INPUT_GET, "preco", FILTER_SANITIZE_STRING));
	$estado = filter_input(INPUT_GET, "estado", FILTER_SANITIZE_STRING);

	if($categoria AND $valor AND $estado) {
		$anunciosdao = new AnunciosDao();
		$anuncio = $anunciosdao->getResultadoPesquisa($categoria, $valor, $estado);
	}else {
		header("Location: index.php");
		exit;
	}

?>
<div class="container">
	<div class="row">
		<div class="col-md-12 order-1 mt-4 mb-3">
			<h1 class="page-header font-weight-normal mb-3">Resultados da Pesquisa</h1>
			<div class="alert alert-primary fade show shadow-sm" role="alert">Segue abaixo os seguintes resultados de acordo com sua pesquisa !!</div>
			<hr class="my-2 bg-light">
			<div class="table-responsive-md">
				<table class="table table-striped table-hover table-md mb-0">
					<tbody>
						<?php
							if(!empty($anuncio)) {
									foreach ($anuncio as $pesquisa) {
								?>
									<tr>
										<td><img src="<?=$pesquisa->getPrimeiraImagem();?>" width="50" class="img-fluid shadow-sm" title="<?=$pesquisa->getTitulo();?>"></td>
										<td>
											<a href="produto.php?id=<?=$pesquisa->getId();?>"><?=$pesquisa->getTitulo();?></a>
											<div class="p-1"></div>
											<?=$pesquisa->getIdCategoria();?>
										</td>
										<td>R$<?=str_replace(".",",",$pesquisa->getValor());?></td>
									</tr>
								<?php
									}
							}else {
								?>
								<div class="alert alert-warning fade show shadow-sm" role="alert">
									Não há anuncios encontrados de acordo com sua pesquisa !!
								</div>
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