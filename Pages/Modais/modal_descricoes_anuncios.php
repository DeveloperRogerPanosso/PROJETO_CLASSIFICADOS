<div class="modal fade" id="DescricaoAnuncio<?=$infoAnuncio->getId();?>" role="dialog">
	<div class="modal-dialog shadow-sm modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title mb-0">Descrição Referente</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="font-weight-normal text-center"><?=$infoAnuncio->getDescricao();?></p>
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