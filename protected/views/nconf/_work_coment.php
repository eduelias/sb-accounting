<div class='container'>
		<div class='titulo'>
			De: <?php echo $cm->autor->nome; ?> em: <?php echo $cm->data; ?>
		</div>
		
		<div class='body'>
			<?php echo $cm->comentario; ?>
		</div>
	</div>