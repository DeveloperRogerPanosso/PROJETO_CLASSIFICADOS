<?php
		namespace App\Models;

		require_once "verifica_sessao_login_usuario.php";

		use \App\Models\Sessions;

		class Email {

			public function enviaMensagemEmail($usuario, $titulo, $nome, $email, $telefone, $mensagem) {
				$para_enviar = $usuario;
				$assunto_enviar = $titulo;
				$mensagem_enviar = "";
				$remetente = "From: {$_SESSION['clogin']}"."\r\n"."X-Mailer: PHP/".phpversion()."\r\n";
				//mail($para_enviar, $assunto_enviar, $mensagem_enviar, $remetente);
				Sessions::envioMensagem();
				header("Location: produto.php");
				return true;
			}
		}
?>