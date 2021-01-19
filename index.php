<?php require_once "Pages/Parcials/header.php"; ?>
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 order-1 mt-4">
						<div class="jumbotron shadow-sm">
							<?php
								require_once "autoload.php";

								use \App\ModelsDAO\AnunciosDao;
								use \App\ModelsDAO\CategoriasDao;
								use \App\ModelsDAO\UsuariosDao;

								$anunciosdao = new AnunciosDao();
								$usuariosdao = new UsuariosDao();
								$total_anuncios = $anunciosdao->getCountTotalAnuncios();
								$total_usuarios = $usuariosdao->getCountTotalUsuarios();
							?>
							<h2 class="page-header font-weight-normal">Nós temos hoje <?=$total_anuncios;?> anúncios cadastrados.</h2>
							<hr class="my-2 bg-light">
							<p class="lead">E <?=$total_usuarios;?> usuários cadastrados</p>
							<button type="button" class="btn btn-primary shadow-sm btn-md mb-0" data-toggle="modal" data-target="#SaibaMais">Saiba Mais</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 order-1">
						<h4 class="page-header font-weight-normal">Pesquisa Avançada</h4>
						<hr class="my-2 bg-primary">
						<form name="pesquisa" method="GET" action="resultado_pesquisa.php">
							<div class="form-group">
								<label for="categoria" class="form-label font-weight-normal">Categoria</label>
								<select name="categoria" class="form-control" id="categoria">
									<option></option>
									<?php
										$categoriasdao = new CategoriasDao();
										$categorias = $categoriasdao->getCategoriasAll();
										foreach ($categorias as $categoria) {
									?>
										<option value="<?=$categoria->getId();?>"><?=$categoria->getNome();?></option>
									<?php
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="preco" class="form-label font-weight-normal">Preço</label>
								<select name="preco" class="form-control" id="preco">
									<option></option>
									<option value="10.00">R$10,00</option>
									<option value="20.00">R$20,00</option>
									<option value="30.00">R$30,00</option>
									<option value="40.00">R$40,00</option>
									<option value="50.00">R$50,00</option>
									<option value="60.00">R$60,00</option>
									<option value="70.00">R$70,00</option>
									<option value="80.00">R$80,00</option>
									<option value="90.00">R$90,00</option>
									<option value="100.00">R$100,00</option>
									<option value="0.00-50.00">R$0,00 - R$50,00</option>
									<option value="51.00-100.00">R$50,00 - R$100,00</option>
									<option value="100.00-200.00">R$100,00 - R$200,00</option>
									<option value="200.00-300.00">R$200,00 - R$300,00</option>
									<option value="300.00-400.00">R$300,00 - R$400,00</option>
									<option value="400.00-500.00">R$400,00 - R$500,00</option>
									<option value="500.00-600.00">R$500,00 - R$600,00</option>
									<option value="600.00-700.00">R$600,00 - R$700,00</option>
									<option value="700.00-800.00">R$700,00 - R$800,00</option>
									<option value="800.00-900.00">R$800,00 - R$900,00</option>
									<option value="1000.00-2000.00">R$1000,00 - R$2000,00</option>
									<option value="3000.00-4000.00">R$3000,00 - R$4000,00</option>
								</select>
							</div>
							<div class="form-group">
								<label for="estado" class="form-label font-weight-normal">Estado de Conservação</label>
								<select name="estado" class="form-control" id="estado">
									<option></option>
									<option value="Ruim">Ruim</option>
									<option value="Razoavel">Razoável</option>
									<option value="Bom">Bom</option>
									<option value="Otimo">Ótimo</option>
								</select>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-md shadow-sm mb-0">Pesquisar</button>
							</div>
						</form>
					</div>
					<div class="col-md-9 order-2">
						<h4 class="page-header font-weight-normal">Ultimos Anúncios</h4>
						<hr class="my-2 bg-primary">
						<div class="table-responsive-md">
							<table class="table table-striped table-hover table-md shadow-sm">
								<tbody>
									<?php
										require_once "limit.php";
										$totalPaginas = ($total_anuncios / 2);
										$ultimosAnuncios = $anunciosdao->getUltimosAnuncios($p);
										if(!empty($ultimosAnuncios)) {
											foreach ($ultimosAnuncios as $ultimoAnuncio) {
											?>
												<tr>
													<td><img src="<?=$ultimoAnuncio->getPrimeiraImagem();?>" width="50" class="img-fluid shadow-sm" title="<?=$ultimoAnuncio->getTitulo();?>"/></td>
													<td>
														<a class="text-primary" href="produto.php?id=<?=$ultimoAnuncio->getId();?>"><?=$ultimoAnuncio->getTitulo();?></a>
														<div class="p-1"></div>
														<?=$ultimoAnuncio->getIdCategoria();?>
													</td>
													<td>R$ <?=str_replace(".",",",$ultimoAnuncio->getValor());?></td>
												</tr>
											<?php
											}
										}else {
											?>
											<div class="alert alert-warning fade show shadow-sm" role="alert">
												Não há anúncios cadastrados no momento !!
											</div>
											<?php
										}
									?>
								</tbody>
							</table>
							<?php require_once "paginacao.php"; ?>
						</div>
					</div>
				</div>
				<div class="row bg-light">
					<div class="col-md-12 order-1 mt-4">
						<h2 class="page-header font-weight-normal text-center mb-4">Grandes Diversidades.</h2>
					</div>
				</div>
				<div class="row bg-light">
					<div class="col-md-3 order-1 mb-3">
						<div class="card shadow-sm mb-0">
							<div class="card-img-top">
								<img src="Format/Images/Anuncios/dc1.jpeg" class="img-fluid" alt="Diversidades" title="Diversidades"/>
							</div>
							<div class="card-body">
								<div class="card-title text-primary"><h5>literatura latina</h5></div>
								<div class="card-text">
									<p class="font-weight-normal">Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim, consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre citações.</p>
								</div>
							</div>
							<div class="card-footer">
								<button type="button" class="btn btn-outline-info btn-md shadow-sm mb-0">Saiba Mais</button>
							</div>
						</div>
					</div>
					<div class="col-md-3 order-2 mb-3">
						<div class="card shadow-sm mb-0">
							<div class="card-img-top">
								<img src="Format/Images/Anuncios/fone2.jpeg" class="img-fluid" alt="Diversidades" title="Diversidades"/>
							</div>
							<div class="card-body">
								<div class="card-title text-primary"><h5>literatura latina</h5></div>
								<div class="card-text">
									<p class="font-weight-normal">Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim, consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre citações.</p>
								</div>
							</div>
							<div class="card-footer">
								<button type="button" class="btn btn-outline-info btn-md shadow-sm mb-0">Saiba Mais</button>
							</div>
						</div>
					</div>
					<div class="col-md-3 order-3 mb-3">
						<div class="card shadow-sm mb-0">
							<div class="card-img-top">
								<img src="Format/Images/Anuncios/mouse3.jpeg" class="img-fluid" alt="Diversidades" title="Diversidades"/>
							</div>
							<div class="card-body">
								<div class="card-title text-primary"><h5>literatura latina</h5></div>
								<div class="card-text">
									<p class="font-weight-normal">Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim, consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre citações.</p>
								</div>
							</div>
							<div class="card-footer">
								<button type="button" class="btn btn-outline-info btn-md shadow-sm mb-0">Saiba Mais</button>
							</div>
						</div>
					</div>
					<div class="col-md-3 order-4 mb-3">
						<div class="card shadow-sm mb-0">
							<div class="card-img-top">
								<img src="Format/Images/Anuncios/mormai1.jpeg" class="img-fluid" alt="Diversidades" title="Diversidades"/>
							</div>
							<div class="card-body">
								<div class="card-title text-primary"><h5>literatura latina</h5></div>
								<div class="card-text">
									<p class="font-weight-normal">Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim, consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre citações.</p>
								</div>
							</div>
							<div class="card-footer">
								<button type="button" class="btn btn-outline-info btn-md shadow-sm mb-0">Saiba Mais</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php require_once "Pages/Parcials/footer.php"; ?>
<?php require_once "Pages/Modais/modal_saiba_mais.php"; ?>
