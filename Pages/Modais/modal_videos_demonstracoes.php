<div class="modal fade" id="VideoDemonstracao<?=$infoAnuncio->getId();?>" role="dialog">
	<div class="modal-dialog shadow-sm modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title mb-0">Video de Demonstração(<?=$infoAnuncio->getTitulo();?>)</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<video width="600" class="shadow-sm mb-0 rounded" controls preload>
								<source src="<?=$infoAnuncio->getVideoDemonstracao();?>" type="video/mp4">
							</video>
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