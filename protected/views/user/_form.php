<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

$widthLabel = "100px";

$this->beginWidget('bootstrap.widgets.BsPanel');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username',array('style'=>"width:$widthLabel")); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname',array('style'=>"width:$widthLabel")); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname',array('style'=>"width:$widthLabel")); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email',array('style'=>"width:$widthLabel")); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone1',array('style'=>"width:$widthLabel")); ?>
		<?php echo $form->textField($model,'phone1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'phone1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lang',array('style'=>"width:$widthLabel")); ?>
		<?php echo $form->textField($model,'lang',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'lang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country',array('style'=>"width:$widthLabel")); ?>
		<?php echo $form->textField($model,'country',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city',array('style'=>"width:$widthLabel")); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address',array('style'=>"width:$widthLabel")); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution',array('style'=>"width:$widthLabel")); ?>
		<?php echo $form->textField($model,'institution',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'institution'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url',array('style'=>"width:$widthLabel")); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Insertar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php $this->endWidget(); ?>