<?php
/* @var $this RoleController */
/* @var $model Role */

echo BsHtml::breadcrumbs(array(
    'Roles'=>array('index'),
	'Administrar',
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#role-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Roles</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$this->beginWidget('bootstrap.widgets.BsPanel');

echo BsHtml::stackedPills(array(
        array('label' => 'Operaciones','url' => '#','active' => true),
        array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Agregar Rol', 'url'=>array('create')),
    ), 
    array('style' => 'min-width:250px; display:inline-flex; vertical-align: top; float:right; margin-left: 10px')
);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'role-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'archetype',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
$this->endWidget();
?>
