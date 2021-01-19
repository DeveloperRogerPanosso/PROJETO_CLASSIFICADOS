<?php
		if(isset($_FILES["video"]) AND !empty($_FILES["video"])) {
			$veido = $_FILES["video"];
			
			if(isset($_FILES["video"]["tmp_name"]) AND !empty($_FILES["video"]["tmp_name"])) {
				$extencoes = array("video/mp4");
				if(in_array($_FILES["video"]["type"], $extencoes)) {
					move_uploaded_file($_FILES["video"]["tmp_name"], "Format/Images/Midias/".$_FILES["video"]["name"]);
				}
			}
		}
?>