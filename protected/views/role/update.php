<?php
/* @var $this RoleController */
/* @var $model Role */

echo BsHtml::breadcrumbs(array(
    'Roles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modificar',
));
?>

<h1>Modificar Rol <?php //echo $model->id; ?></h1>

<?php 
$this->beginWidget('bootstrap.widgets.BsPanel');

echo BsHtml::stackedPills(array(
        array('label' => 'Operaciones','url' => '#','active' => true),
        array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Agregar Rol', 'url'=>array('create')),
	array('label'=>'Detalle Rol', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Roles', 'url'=>array('admin')),
    ), 
    array('style' => 'min-width:250px; display:inline-flex; vertical-align: top; float:right; margin-left: 10px')
);

echo $this->renderPartial('_form', array('model'=>$model)); 
$this->endWidget();
?>