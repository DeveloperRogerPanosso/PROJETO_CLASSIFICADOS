<ul class="pagination">
	<?php
		for ($i=0; $i < $totalPaginas; $i++) { 
	?>
		<li class="page-item"><a class="page-link" href="?p=<?=($i+1);?>"><?=($i+1);?></a></li>
	<?php
		}
	?>
</ul>