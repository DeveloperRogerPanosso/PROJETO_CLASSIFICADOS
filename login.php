<?php require_once "Pages/Parcials/header.php"; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 order-1 mt-4 mb-3">
			<h1 class="page-header font-weight-normal mb-3">Login</h1>
			<div class="alert alert-primary fade show shadow-sm" role="alert">Informe seu e-mail e senha cadastrados realizando o login !!</div>
			<?php require_once "require_sessions.php"; ?>
			<hr class="my-2 bg-light">
			<form name="login" class="needs-validation" novalidate method="POST" action="valida_login_usuario.php">
				<div class="form-group">
					<label for="email" class="form-label font-weight-normal">E-Mail</label>
					<input type="email" name="email" autofocus class="form-control" autocomplete="off" placeholder=" exemplo@hotmail.com.. " id="email" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe seu e-mail.</div>
				</div>
				<div class="form-group">
					<label for="senha" class="form-label font-weight-normal">Senha</label>
					<input type="password" name="senha" class="form-control" autocomplete="off" placeholder=" Senha.. " id="senha" required/>
					<div class="valid-feedback">Tudo Certo.</div>
					<div class="invalid-feedback">Por favor informe sua senha.</div>
				</div>
				<div class="form-group mb-2">
					<button type="submit" class="btn btn-success btn-md shadow-sm mb-0">Logar</button>
				</div>
			</form>
			<a class="text-primary mb-0" href="#" data-toggle="modal" data-target="#EsqueciMinhaSenha">Esqueci minha Senha ?</a>
		</div>
	</div>
</div>
<?php require_once "Pages/Parcials/footer.php"; ?>
<?php require_once "Pages/Modais/modal_esqueci_senha.php"; ?>