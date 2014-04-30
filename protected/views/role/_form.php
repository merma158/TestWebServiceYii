<?php
/* @var $this RoleController */
/* @var $model Role */
/* @var $form CActiveForm */

$widthLabel = "100px";

$this->beginWidget('bootstrap.widgets.BsPanel');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name',array('style'=>"width:$widthLabel")); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'archetype',array('style'=>"width:$widthLabel")); ?>
		<?php echo $form->textField($model,'archetype',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'archetype'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Insertar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php $this->endWidget(); ?>