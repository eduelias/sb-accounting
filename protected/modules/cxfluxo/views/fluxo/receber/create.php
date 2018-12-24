<h1><?=$this->titulo?></h1>
<?php
$this->renderPartial('_form',
		array(
				'model' => $model,
				'origem' => $origem,
				'destino' => $destino,
				'buttons' => 'create'
		));
?>
