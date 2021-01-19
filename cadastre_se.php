<?php require_once "Pages/Parcials/header.php"; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 order-1 mt-4">
			<h1 class="page-header font-weight-normal mb-3">Cadastre-se</h1>
			<div class="alert alert-primary fade show shadow-sm" role="alert">Preencha os campos abaixo realizando seu cadastro !!</div>
			<?php require_once "require_sessions.php"; ?>
			<hr class="my-2 bg-light">
			<form name="cadastroUsuario" class="needs-validation" novalidate method="POST" action="insert_cadastro_usuario.php">
				<div class="form-group">
					<label for="nome" class="form-label font-weight-normal">Nome</label>
					<input type="text" name="nome" autofocus class="form-control" autocomplete="off" placeholder=" Nome.. " id="nome" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe seu nome.</div>
				</div>
				<div class="form-group">
					<label for="email" class="form-label font-weight-normal">E-Mail</label>
					<input type="email" name="email" class="form-control" autocomplete="off" placeholder=" exemplo@hotmail.com.. " id="email" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe seu e-mail.</div>
				</div>
				<div class="form-group">
					<label for="senha" class="form-label font-weight-normal">Senha</label>
					<input type="password" name="senha" class="form-control" autocomplete="off" placeholder=" Senha.. " id="senha" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe sua senha.</div>
				</div>
				<div class="form-group">
					<label for="telefone" class="form-label font-weight-normal">Telefone</label>
					<input type="tel" name="telefone" class="form-control" autocomplete="off" placeholder=" (00) 0000-0000 " id="telefone" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe seu telefone ou celular.</div>
				</div>
				<div class="form-group mb-2">
					<button type="submit" class="btn btn-success btn-md shadow-sm mb-0">Cadastrar</button>
					<button type="reset" class="btn btn-danger btn-md shadow-sm mb-0">Resetar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require_once "Pages/Parcials/footer.php"; ?>