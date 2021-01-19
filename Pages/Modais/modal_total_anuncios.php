<?php require_once "verifica_sessao_login_usuario.php"; ?>
<div class="modal fade" id="TotalAnuncios" role="dialog">
	<div class="modal-dialog shadow-sm modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title mb-0">Total de Anúncios</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md-12 order-1">
							<div class="alert alert-primary fade show shadow-sm text-center" role="alert">
								Segue abaixo o total de anúncios no momento em sua conta !!
							</div>
							<p class="font-weight-normal">
								Total de anúncios na conta de <?=$_SESSION["clogin"];?>: 
								<?php
									require_once "autoload.php";

									use \App\ModelsDAO\AnunciosDao;

									$anunciosdao = new AnunciosDao();
									$totalAnuncios = $anunciosdao->getCountMeusAnuncios($_SESSION["clogin"]);
								?>
									<span class="badge badge-primary badge-pill mr-1"><?=$totalAnuncios;?></span>
								<?php
								?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer bg-light">
				<button type="button" class="btn btn-danger btn-md shadow-sm mb-0" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>