<div class="modal fade" id="EsqueciMinhaSenha" role="dialog">
	<div class="modal-dialog shadow-sm modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title mb-0">Atualizar Senha</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="alert alert-primary fade show shadow-sm text-center" role="alert">
					Informe seu endereço de e-mail cadastrado realizando atualização de senha !!
				</div>
				<hr class="my-2 bg-light">
				<form name="updateSenha" class="needs-validation" novalidate method="POST" action="update_senha_usuario.php">
					<div class="form-group">
						<label for="email" class="form-label font-weight-normal">E-Mail</label>
						<input type="email" name="email" class="form-control" autocomplete="off" placeholder=" exemplo@hotmail.com.. " id="email" required/>
						<div class="valid-feedback">Tudo Certo.</div>
						<div class="invalid-feedback">por favor informe seu e-mail.</div>
					</div>
					<div class="form-group">
						<label for="senha" class="form-label font-weight-normal">Nova Senha</label>
						<input type="password" name="nova_senha" class="form-control" autocomplete="off" placeholder=" Nova Senha.. " id="nova_senha" required/>
						<div class="valid-feedback">Tudo Certo.</div>
						<div class="invalid-feedback">por favor informe sua nova senha.</div>
					</div>
				</div>
				<div class="modal-footer bg-light">
					<button type="submit" class="btn btn-success btn-md shadow-sm mb-0">Atualizar</button>
					<button type="button" class="btn btn-danger btn-md shadow-sm mb-0" data-dismiss="modal">Fechar</button>
				</div>
			</form>
		</div>
	</div>
</div>