<?php
/* @var $this UserController */
/* @var $model User */
/*
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administrar',
);
*/
echo BsHtml::breadcrumbs(array(
    'Usuarios'=>array('index'),
	'Administrar',
));
/*
$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Agregar Usuario', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Usuarios</h1>

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
        array('label' => 'Listar Usuarios', 'url'=>array('index')),
        array('label' => 'Agregar Usuario','url' => array('create'))
    ), 
    array('style' => 'min-width:250px; display:inline-flex; vertical-align: top; float:right; margin-left: 10px')
);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'firstname',
		'lastname',
		'email',
		'phone1',
		/*
		'lang',
		'country',
		'city',
		'address',
		'institution',
		'url',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
$this->endWidget();
?>
