<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo '<?php $dialog = $this->beginWidget(\'application.widgets.SComps.SDiag\', array(\'id\'=>\'diag'.$this->modelClass.'\'));?>'."\r\n"; ?>
<?php echo '<?php $this->endWidget(); ?>' ?>

<div class="form">

<?php $ajax = ($this->enable_ajax_validation) ? 'true' : 'false'; ?>

<?php echo '<?php '; ?>
$form = $this->beginWidget('GxActiveForm', array(
	'id' => '<?php echo $this->class2id($this->modelClass); ?>-form',
	'enableAjaxValidation' => <?php echo $ajax; ?>,
));
<?php echo '?>'; ?>
	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php foreach ($this->tableSchema->columns as $column): ?>
<?php if (!$column->autoIncrement): ?>
		<div class="row">
		<?php echo "<?php echo " . $this->generateActiveLabel($this->modelClass, $column) . "; ?>\n"; ?>
		<?php echo "<?php " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
		</div><!-- row -->
<?php endif; ?>
<?php endforeach; ?>
<?php foreach ($this->getRelations($this->modelClass) as $relation): ?>
<?php if ($relation[1] == GxActiveRecord::HAS_MANY || $relation[1] == GxActiveRecord::MANY_MANY): ?>
	<fieldset>
		<legend><?php echo $this->pluralize($this->class2name($relation[3])); ?></legend>
		<div class='cbox'>
		<?php echo '<?php ' . $this->generateActiveRelationField($this->modelClass, $relation) . "; ?>\n"; ?>
		</div>
	</fieldset>
<?php endif; ?>
<?php endforeach; ?>


<?php echo "<?php
echo GxHtml::submitButton(\"Salvar\");
\$this->endWidget();
?>\n"; ?>
</div><!-- form -->