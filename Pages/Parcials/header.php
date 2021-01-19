<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="author" content="Roger Panosso"/>
	<meta name="description" content="Classificados"/>
	<title>Classificados</title>
	<link rel="stylesheet" type="text/css" href="Format/bootstrap4.5/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="Format/bootstrap4.5/css/bootstrap-reboot.min.css"/>
	<link rel="stylesheet" type="text/css" href="Format/bootstrap4.5/css/style.css"/>
</head>
<body>
	<article>
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-static-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand mb-0 h1" href="index.php">
							<img src="Format/Images/classificados.svg" class="img-fluid shadow-sm mb-0 mr-1" width="32"/>
						Classificados</a>
					</div>
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#NavbarMenu">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="NavbarMenu">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
							<?php require_once "items_menu_usuario.php"; ?>
						</ul>
					</div>
				</div>
			</nav>
		</header>