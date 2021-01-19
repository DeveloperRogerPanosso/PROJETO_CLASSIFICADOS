<?php
		if(isset($_FILES["segunda_imagem"]) AND !empty($_FILES["segunda_imagem"])) {
			$imagem = $_FILES["segunda_imagem"];
			
			if(isset($_FILES["segunda_imagem"]["tmp_name"]) AND !empty($_FILES["segunda_imagem"]["tmp_name"])) {
				$extencoes = array("image/jpeg", "image/png");
				if(in_array($_FILES["segunda_imagem"]["type"], $extencoes)) {
					move_uploaded_file($_FILES["segunda_imagem"]["tmp_name"], "Format/Images/Anuncios/".$_FILES["segunda_imagem"]["name"]);

					list($largura_original, $altura_original) = getimagesize("Format/Images/Anuncios/".$_FILES["segunda_imagem"]["name"]);
					$ratio = $largura_original/$altura_original;
					
					$largura = 500;
					$altura = 500;

					if($largura/$altura > $ratio) {
						$largura = $altura*$ratio;
					}else {
						$altura = $largura/$ratio;
					}
					echo $largura;
					echo $altura;

					$novaImagem = imagecreatetruecolor($largura, $altura);
					if($_FILES["segunda_imagem"]["type"] == "image/jpeg") {
						$origi = imagecreatefromjpeg("Format/Images/Anuncios/".$_FILES["segunda_imagem"]["name"]);
						imagecopyresampled($novaImagem, $origi, 0, 0, 0, 0, $largura, $altura, $largura_original, $altura_original);
						imagejpeg($novaImagem, "Format/Images/Anuncios/".$_FILES["segunda_imagem"]["name"], 80);
					}elseif($_FILES["segunda_imagem"]["type"] == "image/png") {
						$origi = imagecreatefrompng("Format/Images/Anuncios/".$_FILES["segunda_imagem"]["name"]);
						imagecopyresampled($novaImagem, $origi, 0, 0, 0, 0, $largura, $altura, $largura_original, $altura_original);
						imagepng($novaImagem, "Format/Images/Anuncios/".$_FILES["segunda_imagem"]["name"]);
					}
				}
			}
		}
?>