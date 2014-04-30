<?php
/* @var $this RoleController */
/* @var $model Role */

echo BsHtml::breadcrumbs(array(
    'Roles'=>array('index'),
	$model->name,
));
?>

<h1>Detalle Rol #<?php echo $model->id; ?></h1>

<?php 
$this->beginWidget('bootstrap.widgets.BsPanel');

echo BsHtml::stackedPills(array(
        array('label' => 'Operaciones','url' => '#','active' => true),
        array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Agregar Rol', 'url'=>array('create')),
	array('label'=>'Modificar Rol', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Rol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Roles', 'url'=>array('admin')),
    ), 
    array('style' => 'min-width:250px; display:inline-flex; vertical-align: top; float:right; margin-left: 10px')
);


$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'archetype',
	),
)); 
$this->endWidget();
?>
