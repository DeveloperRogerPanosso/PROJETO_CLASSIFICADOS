<form name="form" method="POST" enctype="multipart/form-data">
	<input type="file" name="video" id="video" required>
	<button type="submit">Enviar</button>
</form>

<?php
	echo "<pre>";
	print_r($_FILES["video"]);
?>