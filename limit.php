<?php
		$pg = 1;
		if(isset($_GET["p"]) AND !empty($_GET["p"])) {
			$pg = addslashes($_GET["p"]);
		}else {
			$pg = 1;
		}
		$p = ($pg - 1) * 2;
?>