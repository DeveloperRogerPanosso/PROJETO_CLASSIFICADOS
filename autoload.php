<?php
		/*
			define autoload realizando requisicoes de arquivos(classes) através de seus supostos
			diretorios de acordo com namespace definido
		*/
			spl_autoload_register(function($classe) {
				$diretorioBase = __DIR__."/".str_replace("\\", "/", $classe).".php";
				if(file_exists($diretorioBase)) {
					require_once $diretorioBase;
					return true;
				}else {
					echo "Arquivo com implementação da classe não existente !!" . "<br>\n";
					return false;
				}
			})
?>