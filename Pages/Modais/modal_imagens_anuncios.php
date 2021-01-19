<div class="modal fade" id="ImagemAnuncio<?=$infoAnuncio->getId();?>" role="dialog">
											<div class="modal-dialog shadow-sm modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header bg-light">
														<h5 class="modal-title mb-0">Imagens Referentes(<?=$infoAnuncio->getTitulo();?>)</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
													</div>
													<div class="modal-body">
														<div class="carousel slide" id="CarouselImagem<?=$infoAnuncio->getId();?>" data-ride="carousel">
															<ol class="carousel-indicators">
																<li data-target="#CarouselImagem<?=$infoAnuncio->getId();?>" data-slide-to="0" class="active bg-primary"></li>
																<li data-target="#CarouselImagem<?=$infoAnuncio->getId();?>" data-slide-to="1" class="bg-primary"></li>
																<li data-target="#CarouselImagem<?=$infoAnuncio->getId();?>" data-slide-to="2" class="bg-primary"></li>
															</ol>
															<div class="carousel-inner">
																<div class="carousel-item active">
																	<img src="<?=$infoAnuncio->getPrimeiraImagem();?>" class="img-fluid" alt="<?=$infoAnuncio->getTitulo();?>"/>
																</div>
																<div class="carousel-item">
																	<img src="<?=$infoAnuncio->getSegundaImagem();?>"  class="img-fluid" alt="<?=$infoAnuncio->getTitulo();?>"/>
																</div>
																<div class="carousel-item">
																	<img src="<?=$infoAnuncio->getTerceiraImagem();?>" class="img-fluid" alt="<?=$infoAnuncio->getTitulo();?>"/>
																</div>
															</div>
															<a href="#CarouselImagem<?=$infoAnuncio->getId();?>" class="carousel-control-prev" role="button" data-slide="prev">
																<span class="carousel-control-prev-icon"></span>
																<span class="sr-only">Anterior</span>
															</a>
															<a href="#CarouselImagem<?=$infoAnuncio->getId();?>" class="carousel-control-next" role="button" data-slide="next">
																<span class="carousel-control-next-icon"></span>
																<span class="sr-only">Próximo</span>
															</a>
														</div>
													</div>
													<div class="modal-footer bg-light">
														<button type="button" class="btn btn-danger btn-md shadow-sm mb-0" data-dismiss="modal">Fechar</button>
													</div>
												</div>
											</div>
										</div>